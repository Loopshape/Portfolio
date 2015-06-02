<?php
class FluidCache_Standalone_partial_Action_Tool_ImportantActions_CreateAdministrator_78d3507fd3473a71c61bc93c7403151139bf7f8b extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// @todo
	return new \TYPO3\CMS\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {

return NULL;
}
public function hasLayout() {
return FALSE;
}

/**
 * Main Render function
 */
public function render(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= '<h4>Create backend administrator user</h4>
<p>
	You should use this function only if there are no admin users in the database, for instance if this is a blank database.
	After you\'ve created the user, log in and add the rest of the user information, like email and real name.
</p>
<form method="post">
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments1 = array();
$arguments1['partial'] = 'Action/Common/HiddenFormFields';
$arguments1['arguments'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), '_all', $renderingContext);
$arguments1['section'] = NULL;
$arguments1['optional'] = false;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments1, $renderChildrenClosure2, $renderingContext);

$output0 .= '
	<fieldset>
		<ol>
			<li>
				<label for="t3-install-username">Username:</label>
				<input
					id="t3-install-username"
					class="t3-install-form-input-text"
					type="text"
					name="install[values][newUserUsername]"
				/>
			</li>
			<li>
				<label for="t3-install-password">Password:</label>
				<input
					id="t3-install-password"
					class="t3-install-form-input-text t3-install-form-password-strength"
					type="password"
					name="install[values][newUserPassword]"
				/>
			</li>
			<li>
				<label for="t3-install-password-repeat">Repeat password:</label>
				<input
					id="t3-install-password-repeat"
					class="t3-install-form-input-text"
					type="password"
					name="install[values][newUserPasswordCheck]"
				/>
			</li>
		</ol>
	</fieldset>
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments3 = array();
$arguments3['partial'] = 'Action/Common/SubmitButton';
// Rendering Array
$array4 = array();
$array4['name'] = 'createAdministrator';
$array4['text'] = 'Create administrator';
$arguments3['arguments'] = $array4;
$arguments3['section'] = NULL;
$arguments3['optional'] = false;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments3, $renderChildrenClosure5, $renderingContext);

$output0 .= '
</form>';

return $output0;
}


}
#1433271547    3022      