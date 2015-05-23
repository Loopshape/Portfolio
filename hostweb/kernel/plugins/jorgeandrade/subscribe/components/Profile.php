<?php namespace JorgeAndrade\Subscribe\Components;

use Cms\Classes\ComponentBase;
use Str;
use URL;
use JorgeAndrade\Subscribe\Models\Subscriber as Subs;

class Profile extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Profile Component',
            'description' => 'Form for update the existing subscriber'
        ];
    }

    public function defineProperties()
    {
        return [
            'geo' => [
                'title'       => 'Geolocation',
                'description' => 'Enable or disable geolocation',
                'type' => 'dropdown',
                'default'     => 'enabled'
            ],
            'thanksMessage' => [
                'title'       => 'Correct Message',
                'description' => 'Correct message thrown',
                'type' => 'string',
                'default'     => 'Data has been updated'
            ],
            'errorMessage' => [
                'title'       => 'Error Message',
                'description' => 'Message for error thrown',
                'type' => 'string',
                'default'     => 'Error has thrown on save'
            ]
        ];
    }

    public function getGeoOptions()
    {
        return ['enabled'=>'Enabled', 'disabled'=>'Disabled'];
    }

    public function onRun()
    {
        $code = $this->param('code');
        
        try{

            $subscriber = Subs::whereCode($code)->whereStatus(1)->firstOrFail();
            
            if ($this->property('geo') === 'enabled') {
                $this->addJs('/plugins/jorgeandrade/subscribe/assets/javascript/subscribe-scripts.js');
            }else{
                $this->addJs('/plugins/jorgeandrade/subscribe/assets/javascript/subscribe-scripts-no-geo.js');
            }

            $this->page['code'] = $code;
            $this->page['subscriber'] = $subscriber;

        }
        catch (\Exception $e){

            return \Redirect::to('/');

        }
    }

    public function onUpdateSubscriber()
    {

        $code = post('code');
        try{

            $subscriber = Subs::whereCode($code)->whereStatus(1)->firstOrFail();
            // $subscriber->email = post('email');
            $subscriber->name = post('name');
            $subscriber->surname = post('surname');
            $subscriber->country = post('country');
            $subscriber->latitude = post('latitude');
            $subscriber->longitude = post('longitude');
            $subscriber->save();

            $this->page['result'] = $this->property('thanksMessage');
        }
        catch (\Exception $e){

            $this->page['result'] = $this->property('errorMessage');

        }
        
    }

    public function onRemoveSubscriber()
    {
        $email = post('email');
        $code = post('code');
        
        try{

            $subscriber = Subs::whereCode($code)->whereEmail($email)->whereStatus(1)->firstOrFail();
            $subscriber->status = 0;
            $subscriber->code = null;
            $subscriber->save();
            \Mail::send('jorgeandrade.subscribe::mail.unsubscribe', [], function($message) use ($email) {
                $message->to($email, 'Bye old Subscriber');
            });

            $this->page['result'] = $this->property('thanksMessage');

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e){

            $this->page['result'] = "Email not found!";

        } catch (\Exception $e){
            $this->page['result'] = $this->property('errorMessage');
        }
        
    }

}