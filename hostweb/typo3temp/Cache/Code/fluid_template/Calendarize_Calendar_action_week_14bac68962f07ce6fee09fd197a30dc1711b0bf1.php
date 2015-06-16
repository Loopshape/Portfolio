<?php
class FluidCache_Calendarize_Calendar_action_week_14bac68962f07ce6fee09fd197a30dc1711b0bf1 extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// @todo
	return new \TYPO3\CMS\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {

return 'Default';
}
public function hasLayout() {
return TRUE;
}

/**
 * section Main
 */
public function section_62bce9422ff2d14f69ab80a154510232fc8a9afd(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= '

	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments1 = array();
// Rendering Boolean node
$arguments1['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.weekPid', $renderingContext));
$arguments1['then'] = NULL;
$arguments1['else'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$output3 = '';

$output3 .= '
		<div class="browser">
			';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments4 = array();
$arguments4['modification'] = '-7 day';
$arguments4['dateTime'] = NULL;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments6 = array();
$arguments6['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
$arguments6['keepQuotes'] = false;
$arguments6['encoding'] = NULL;
$arguments6['doubleEncode'] = true;
$renderChildrenClosure7 = function() use ($renderingContext, $self) {
return NULL;
};
$value8 = ($arguments6['value'] !== NULL ? $arguments6['value'] : $renderChildrenClosure7());
return (!is_string($value8) ? $value8 : htmlspecialchars($value8, ($arguments6['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments6['encoding'] !== NULL ? $arguments6['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments6['doubleEncode']));
};
$viewHelper9 = $self->getViewHelper('$viewHelper9', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper');
$viewHelper9->setArguments($arguments4);
$viewHelper9->setRenderingContext($renderingContext);
$viewHelper9->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper

$output3 .= $viewHelper9->initializeArgumentsAndRender();

$output3 .= '
			';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\IfDateUpperViewHelper
$arguments10 = array();
$arguments10['base'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateLimitBrowserPrev', $renderingContext);
$arguments10['check'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
$arguments10['then'] = NULL;
$arguments10['else'] = NULL;
$renderChildrenClosure11 = function() use ($renderingContext, $self) {
$output12 = '';

$output12 .= '
				';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Link\WeekViewHelper
$arguments13 = array();
$arguments13['pageUid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.weekPid', $renderingContext);
$arguments13['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
$arguments13['additionalAttributes'] = NULL;
$arguments13['data'] = NULL;
$arguments13['class'] = NULL;
$arguments13['dir'] = NULL;
$arguments13['id'] = NULL;
$arguments13['lang'] = NULL;
$arguments13['style'] = NULL;
$arguments13['title'] = NULL;
$arguments13['accesskey'] = NULL;
$arguments13['tabindex'] = NULL;
$arguments13['onclick'] = NULL;
$arguments13['target'] = NULL;
$arguments13['rel'] = NULL;
$renderChildrenClosure14 = function() use ($renderingContext, $self) {
return '
					&lt;
				';
};
$viewHelper15 = $self->getViewHelper('$viewHelper15', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Link\WeekViewHelper');
$viewHelper15->setArguments($arguments13);
$viewHelper15->setRenderingContext($renderingContext);
$viewHelper15->setRenderChildrenClosure($renderChildrenClosure14);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Link\WeekViewHelper

$output12 .= $viewHelper15->initializeArgumentsAndRender();

$output12 .= '
			';
return $output12;
};
$viewHelper16 = $self->getViewHelper('$viewHelper16', $renderingContext, 'HDNET\Calendarize\ViewHelpers\IfDateUpperViewHelper');
$viewHelper16->setArguments($arguments10);
$viewHelper16->setRenderingContext($renderingContext);
$viewHelper16->setRenderChildrenClosure($renderChildrenClosure11);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\IfDateUpperViewHelper

$output3 .= $viewHelper16->initializeArgumentsAndRender();

$output3 .= '
			';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments17 = array();
$arguments17['modification'] = '+7 day';
$arguments17['dateTime'] = NULL;
$renderChildrenClosure18 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments19 = array();
$arguments19['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
$arguments19['keepQuotes'] = false;
$arguments19['encoding'] = NULL;
$arguments19['doubleEncode'] = true;
$renderChildrenClosure20 = function() use ($renderingContext, $self) {
return NULL;
};
$value21 = ($arguments19['value'] !== NULL ? $arguments19['value'] : $renderChildrenClosure20());
return (!is_string($value21) ? $value21 : htmlspecialchars($value21, ($arguments19['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments19['encoding'] !== NULL ? $arguments19['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments19['doubleEncode']));
};
$viewHelper22 = $self->getViewHelper('$viewHelper22', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper');
$viewHelper22->setArguments($arguments17);
$viewHelper22->setRenderingContext($renderingContext);
$viewHelper22->setRenderChildrenClosure($renderChildrenClosure18);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper

$output3 .= $viewHelper22->initializeArgumentsAndRender();

$output3 .= '

			';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments23 = array();
$arguments23['modification'] = '+7 day';
$arguments23['dateTime'] = NULL;
$renderChildrenClosure24 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments25 = array();
$arguments25['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
$arguments25['keepQuotes'] = false;
$arguments25['encoding'] = NULL;
$arguments25['doubleEncode'] = true;
$renderChildrenClosure26 = function() use ($renderingContext, $self) {
return NULL;
};
$value27 = ($arguments25['value'] !== NULL ? $arguments25['value'] : $renderChildrenClosure26());
return (!is_string($value27) ? $value27 : htmlspecialchars($value27, ($arguments25['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments25['encoding'] !== NULL ? $arguments25['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments25['doubleEncode']));
};
$viewHelper28 = $self->getViewHelper('$viewHelper28', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper');
$viewHelper28->setArguments($arguments23);
$viewHelper28->setRenderingContext($renderingContext);
$viewHelper28->setRenderChildrenClosure($renderChildrenClosure24);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper

$output3 .= $viewHelper28->initializeArgumentsAndRender();

$output3 .= '
			';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper
$arguments29 = array();
$arguments29['base'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateLimitBrowserNext', $renderingContext);
$arguments29['check'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
$arguments29['then'] = NULL;
$arguments29['else'] = NULL;
$renderChildrenClosure30 = function() use ($renderingContext, $self) {
$output31 = '';

$output31 .= '
				';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Link\WeekViewHelper
$arguments32 = array();
$arguments32['pageUid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.weekPid', $renderingContext);
$arguments32['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
$arguments32['additionalAttributes'] = NULL;
$arguments32['data'] = NULL;
$arguments32['class'] = NULL;
$arguments32['dir'] = NULL;
$arguments32['id'] = NULL;
$arguments32['lang'] = NULL;
$arguments32['style'] = NULL;
$arguments32['title'] = NULL;
$arguments32['accesskey'] = NULL;
$arguments32['tabindex'] = NULL;
$arguments32['onclick'] = NULL;
$arguments32['target'] = NULL;
$arguments32['rel'] = NULL;
$renderChildrenClosure33 = function() use ($renderingContext, $self) {
return '
					&gt;
				';
};
$viewHelper34 = $self->getViewHelper('$viewHelper34', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Link\WeekViewHelper');
$viewHelper34->setArguments($arguments32);
$viewHelper34->setRenderingContext($renderingContext);
$viewHelper34->setRenderChildrenClosure($renderChildrenClosure33);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Link\WeekViewHelper

$output31 .= $viewHelper34->initializeArgumentsAndRender();

$output31 .= '
			';
return $output31;
};
$viewHelper35 = $self->getViewHelper('$viewHelper35', $renderingContext, 'HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper');
$viewHelper35->setArguments($arguments29);
$viewHelper35->setRenderingContext($renderingContext);
$viewHelper35->setRenderChildrenClosure($renderChildrenClosure30);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper

$output3 .= $viewHelper35->initializeArgumentsAndRender();

$output3 .= '
			';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments36 = array();
$arguments36['modification'] = '-7 day';
$arguments36['dateTime'] = NULL;
$renderChildrenClosure37 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments38 = array();
$arguments38['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
$arguments38['keepQuotes'] = false;
$arguments38['encoding'] = NULL;
$arguments38['doubleEncode'] = true;
$renderChildrenClosure39 = function() use ($renderingContext, $self) {
return NULL;
};
$value40 = ($arguments38['value'] !== NULL ? $arguments38['value'] : $renderChildrenClosure39());
return (!is_string($value40) ? $value40 : htmlspecialchars($value40, ($arguments38['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments38['encoding'] !== NULL ? $arguments38['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments38['doubleEncode']));
};
$viewHelper41 = $self->getViewHelper('$viewHelper41', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper');
$viewHelper41->setArguments($arguments36);
$viewHelper41->setRenderingContext($renderingContext);
$viewHelper41->setRenderChildrenClosure($renderChildrenClosure37);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper

$output3 .= $viewHelper41->initializeArgumentsAndRender();

$output3 .= '
		</div>
	';
return $output3;
};
$viewHelper42 = $self->getViewHelper('$viewHelper42', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper42->setArguments($arguments1);
$viewHelper42->setRenderingContext($renderingContext);
$viewHelper42->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper42->initializeArgumentsAndRender();

$output0 .= '

	<h1>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments43 = array();
$arguments43['format'] = 'Y';
$arguments43['date'] = NULL;
$renderChildrenClosure44 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments43, $renderChildrenClosure44, $renderingContext);

$output0 .= ' week ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments45 = array();
$arguments45['format'] = 'W';
$arguments45['date'] = NULL;
$renderChildrenClosure46 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments45, $renderChildrenClosure46, $renderingContext);

$output0 .= '
	</h1>

	<div class="row">
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments47 = array();
// Rendering Array
$array48 = array();
$array48['0'] = 2;
$array48['1'] = 2;
$array48['2'] = 2;
$array48['3'] = 2;
$array48['4'] = 2;
$array48['5'] = 1;
$array48['6'] = 1;
$arguments47['each'] = $array48;
$arguments47['key'] = 'count';
$arguments47['as'] = 'cols';
$arguments47['reverse'] = false;
$arguments47['iteration'] = NULL;
$renderChildrenClosure49 = function() use ($renderingContext, $self) {
$output50 = '';

$output50 .= '
			<div class="col-md-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments51 = array();
$arguments51['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'cols', $renderingContext);
$arguments51['keepQuotes'] = false;
$arguments51['encoding'] = NULL;
$arguments51['doubleEncode'] = true;
$renderChildrenClosure52 = function() use ($renderingContext, $self) {
return NULL;
};
$value53 = ($arguments51['value'] !== NULL ? $arguments51['value'] : $renderChildrenClosure52());

$output50 .= (!is_string($value53) ? $value53 : htmlspecialchars($value53, ($arguments51['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments51['encoding'] !== NULL ? $arguments51['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments51['doubleEncode']));

$output50 .= '">
				';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments54 = array();
$arguments54['modification'] = '+1 day';
$arguments54['dateTime'] = NULL;
$renderChildrenClosure55 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments56 = array();
$arguments56['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
$arguments56['keepQuotes'] = false;
$arguments56['encoding'] = NULL;
$arguments56['doubleEncode'] = true;
$renderChildrenClosure57 = function() use ($renderingContext, $self) {
return NULL;
};
$value58 = ($arguments56['value'] !== NULL ? $arguments56['value'] : $renderChildrenClosure57());
return (!is_string($value58) ? $value58 : htmlspecialchars($value58, ($arguments56['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments56['encoding'] !== NULL ? $arguments56['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments56['doubleEncode']));
};
$viewHelper59 = $self->getViewHelper('$viewHelper59', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper');
$viewHelper59->setArguments($arguments54);
$viewHelper59->setRenderingContext($renderingContext);
$viewHelper59->setRenderChildrenClosure($renderChildrenClosure55);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper

$output50 .= $viewHelper59->initializeArgumentsAndRender();

$output50 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments60 = array();
$arguments60['format'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateFormat', $renderingContext);
$arguments60['date'] = NULL;
$renderChildrenClosure61 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
};

$output50 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments60, $renderChildrenClosure61, $renderingContext);

$output50 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments62 = array();
$arguments62['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'indices', $renderingContext);
$arguments62['as'] = 'index';
$arguments62['key'] = '';
$arguments62['reverse'] = false;
$arguments62['iteration'] = NULL;
$renderChildrenClosure63 = function() use ($renderingContext, $self) {
$output64 = '';

$output64 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments65 = array();
// Rendering Boolean node
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\IndexOnDayViewHelper
$arguments66 = array();
$arguments66['index'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index', $renderingContext);
$arguments66['day'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
$arguments66['indices'] = array (
);
$renderChildrenClosure67 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper68 = $self->getViewHelper('$viewHelper68', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\IndexOnDayViewHelper');
$viewHelper68->setArguments($arguments66);
$viewHelper68->setRenderingContext($renderingContext);
$viewHelper68->setRenderChildrenClosure($renderChildrenClosure67);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\IndexOnDayViewHelper
$arguments65['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean($viewHelper68->initializeArgumentsAndRender());
$arguments65['then'] = NULL;
$arguments65['else'] = NULL;
$renderChildrenClosure69 = function() use ($renderingContext, $self) {
$output70 = '';

$output70 .= '
						<li>
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments71 = array();
$output72 = '';

$output72 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index.configuration.partialIdentifier', $renderingContext);

$output72 .= '/Title';
$arguments71['partial'] = $output72;
// Rendering Array
$array73 = array();
$array73['index'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index', $renderingContext);
$arguments71['arguments'] = $array73;
$arguments71['section'] = NULL;
$arguments71['optional'] = false;
$renderChildrenClosure74 = function() use ($renderingContext, $self) {
return NULL;
};

$output70 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments71, $renderChildrenClosure74, $renderingContext);

$output70 .= '
						</li>
					';
return $output70;
};
$viewHelper75 = $self->getViewHelper('$viewHelper75', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper75->setArguments($arguments65);
$viewHelper75->setRenderingContext($renderingContext);
$viewHelper75->setRenderChildrenClosure($renderChildrenClosure69);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output64 .= $viewHelper75->initializeArgumentsAndRender();

$output64 .= '
				';
return $output64;
};

$output50 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments62, $renderChildrenClosure63, $renderingContext);

$output50 .= '
			</div>
		';
return $output50;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments47, $renderChildrenClosure49, $renderingContext);

$output0 .= '
	</div>


';

return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output76 = '';

$output76 .= '
';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper
$arguments77 = array();
$arguments77['name'] = 'Default';
$renderChildrenClosure78 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper79 = $self->getViewHelper('$viewHelper79', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper79->setArguments($arguments77);
$viewHelper79->setRenderingContext($renderingContext);
$viewHelper79->setRenderChildrenClosure($renderChildrenClosure78);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper

$output76 .= $viewHelper79->initializeArgumentsAndRender();

$output76 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments80 = array();
$arguments80['name'] = 'Main';
$renderChildrenClosure81 = function() use ($renderingContext, $self) {
$output82 = '';

$output82 .= '

	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments83 = array();
// Rendering Boolean node
$arguments83['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.weekPid', $renderingContext));
$arguments83['then'] = NULL;
$arguments83['else'] = NULL;
$renderChildrenClosure84 = function() use ($renderingContext, $self) {
$output85 = '';

$output85 .= '
		<div class="browser">
			';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments86 = array();
$arguments86['modification'] = '-7 day';
$arguments86['dateTime'] = NULL;
$renderChildrenClosure87 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments88 = array();
$arguments88['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
$arguments88['keepQuotes'] = false;
$arguments88['encoding'] = NULL;
$arguments88['doubleEncode'] = true;
$renderChildrenClosure89 = function() use ($renderingContext, $self) {
return NULL;
};
$value90 = ($arguments88['value'] !== NULL ? $arguments88['value'] : $renderChildrenClosure89());
return (!is_string($value90) ? $value90 : htmlspecialchars($value90, ($arguments88['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments88['encoding'] !== NULL ? $arguments88['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments88['doubleEncode']));
};
$viewHelper91 = $self->getViewHelper('$viewHelper91', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper');
$viewHelper91->setArguments($arguments86);
$viewHelper91->setRenderingContext($renderingContext);
$viewHelper91->setRenderChildrenClosure($renderChildrenClosure87);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper

$output85 .= $viewHelper91->initializeArgumentsAndRender();

$output85 .= '
			';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\IfDateUpperViewHelper
$arguments92 = array();
$arguments92['base'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateLimitBrowserPrev', $renderingContext);
$arguments92['check'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
$arguments92['then'] = NULL;
$arguments92['else'] = NULL;
$renderChildrenClosure93 = function() use ($renderingContext, $self) {
$output94 = '';

$output94 .= '
				';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Link\WeekViewHelper
$arguments95 = array();
$arguments95['pageUid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.weekPid', $renderingContext);
$arguments95['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
$arguments95['additionalAttributes'] = NULL;
$arguments95['data'] = NULL;
$arguments95['class'] = NULL;
$arguments95['dir'] = NULL;
$arguments95['id'] = NULL;
$arguments95['lang'] = NULL;
$arguments95['style'] = NULL;
$arguments95['title'] = NULL;
$arguments95['accesskey'] = NULL;
$arguments95['tabindex'] = NULL;
$arguments95['onclick'] = NULL;
$arguments95['target'] = NULL;
$arguments95['rel'] = NULL;
$renderChildrenClosure96 = function() use ($renderingContext, $self) {
return '
					&lt;
				';
};
$viewHelper97 = $self->getViewHelper('$viewHelper97', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Link\WeekViewHelper');
$viewHelper97->setArguments($arguments95);
$viewHelper97->setRenderingContext($renderingContext);
$viewHelper97->setRenderChildrenClosure($renderChildrenClosure96);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Link\WeekViewHelper

$output94 .= $viewHelper97->initializeArgumentsAndRender();

$output94 .= '
			';
return $output94;
};
$viewHelper98 = $self->getViewHelper('$viewHelper98', $renderingContext, 'HDNET\Calendarize\ViewHelpers\IfDateUpperViewHelper');
$viewHelper98->setArguments($arguments92);
$viewHelper98->setRenderingContext($renderingContext);
$viewHelper98->setRenderChildrenClosure($renderChildrenClosure93);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\IfDateUpperViewHelper

$output85 .= $viewHelper98->initializeArgumentsAndRender();

$output85 .= '
			';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments99 = array();
$arguments99['modification'] = '+7 day';
$arguments99['dateTime'] = NULL;
$renderChildrenClosure100 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments101 = array();
$arguments101['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
$arguments101['keepQuotes'] = false;
$arguments101['encoding'] = NULL;
$arguments101['doubleEncode'] = true;
$renderChildrenClosure102 = function() use ($renderingContext, $self) {
return NULL;
};
$value103 = ($arguments101['value'] !== NULL ? $arguments101['value'] : $renderChildrenClosure102());
return (!is_string($value103) ? $value103 : htmlspecialchars($value103, ($arguments101['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments101['encoding'] !== NULL ? $arguments101['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments101['doubleEncode']));
};
$viewHelper104 = $self->getViewHelper('$viewHelper104', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper');
$viewHelper104->setArguments($arguments99);
$viewHelper104->setRenderingContext($renderingContext);
$viewHelper104->setRenderChildrenClosure($renderChildrenClosure100);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper

$output85 .= $viewHelper104->initializeArgumentsAndRender();

$output85 .= '

			';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments105 = array();
$arguments105['modification'] = '+7 day';
$arguments105['dateTime'] = NULL;
$renderChildrenClosure106 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments107 = array();
$arguments107['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
$arguments107['keepQuotes'] = false;
$arguments107['encoding'] = NULL;
$arguments107['doubleEncode'] = true;
$renderChildrenClosure108 = function() use ($renderingContext, $self) {
return NULL;
};
$value109 = ($arguments107['value'] !== NULL ? $arguments107['value'] : $renderChildrenClosure108());
return (!is_string($value109) ? $value109 : htmlspecialchars($value109, ($arguments107['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments107['encoding'] !== NULL ? $arguments107['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments107['doubleEncode']));
};
$viewHelper110 = $self->getViewHelper('$viewHelper110', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper');
$viewHelper110->setArguments($arguments105);
$viewHelper110->setRenderingContext($renderingContext);
$viewHelper110->setRenderChildrenClosure($renderChildrenClosure106);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper

$output85 .= $viewHelper110->initializeArgumentsAndRender();

$output85 .= '
			';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper
$arguments111 = array();
$arguments111['base'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateLimitBrowserNext', $renderingContext);
$arguments111['check'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
$arguments111['then'] = NULL;
$arguments111['else'] = NULL;
$renderChildrenClosure112 = function() use ($renderingContext, $self) {
$output113 = '';

$output113 .= '
				';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Link\WeekViewHelper
$arguments114 = array();
$arguments114['pageUid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.weekPid', $renderingContext);
$arguments114['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
$arguments114['additionalAttributes'] = NULL;
$arguments114['data'] = NULL;
$arguments114['class'] = NULL;
$arguments114['dir'] = NULL;
$arguments114['id'] = NULL;
$arguments114['lang'] = NULL;
$arguments114['style'] = NULL;
$arguments114['title'] = NULL;
$arguments114['accesskey'] = NULL;
$arguments114['tabindex'] = NULL;
$arguments114['onclick'] = NULL;
$arguments114['target'] = NULL;
$arguments114['rel'] = NULL;
$renderChildrenClosure115 = function() use ($renderingContext, $self) {
return '
					&gt;
				';
};
$viewHelper116 = $self->getViewHelper('$viewHelper116', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Link\WeekViewHelper');
$viewHelper116->setArguments($arguments114);
$viewHelper116->setRenderingContext($renderingContext);
$viewHelper116->setRenderChildrenClosure($renderChildrenClosure115);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Link\WeekViewHelper

$output113 .= $viewHelper116->initializeArgumentsAndRender();

$output113 .= '
			';
return $output113;
};
$viewHelper117 = $self->getViewHelper('$viewHelper117', $renderingContext, 'HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper');
$viewHelper117->setArguments($arguments111);
$viewHelper117->setRenderingContext($renderingContext);
$viewHelper117->setRenderChildrenClosure($renderChildrenClosure112);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper

$output85 .= $viewHelper117->initializeArgumentsAndRender();

$output85 .= '
			';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments118 = array();
$arguments118['modification'] = '-7 day';
$arguments118['dateTime'] = NULL;
$renderChildrenClosure119 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments120 = array();
$arguments120['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
$arguments120['keepQuotes'] = false;
$arguments120['encoding'] = NULL;
$arguments120['doubleEncode'] = true;
$renderChildrenClosure121 = function() use ($renderingContext, $self) {
return NULL;
};
$value122 = ($arguments120['value'] !== NULL ? $arguments120['value'] : $renderChildrenClosure121());
return (!is_string($value122) ? $value122 : htmlspecialchars($value122, ($arguments120['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments120['encoding'] !== NULL ? $arguments120['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments120['doubleEncode']));
};
$viewHelper123 = $self->getViewHelper('$viewHelper123', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper');
$viewHelper123->setArguments($arguments118);
$viewHelper123->setRenderingContext($renderingContext);
$viewHelper123->setRenderChildrenClosure($renderChildrenClosure119);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper

$output85 .= $viewHelper123->initializeArgumentsAndRender();

$output85 .= '
		</div>
	';
return $output85;
};
$viewHelper124 = $self->getViewHelper('$viewHelper124', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper124->setArguments($arguments83);
$viewHelper124->setRenderingContext($renderingContext);
$viewHelper124->setRenderChildrenClosure($renderChildrenClosure84);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output82 .= $viewHelper124->initializeArgumentsAndRender();

$output82 .= '

	<h1>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments125 = array();
$arguments125['format'] = 'Y';
$arguments125['date'] = NULL;
$renderChildrenClosure126 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
};

$output82 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments125, $renderChildrenClosure126, $renderingContext);

$output82 .= ' week ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments127 = array();
$arguments127['format'] = 'W';
$arguments127['date'] = NULL;
$renderChildrenClosure128 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
};

$output82 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments127, $renderChildrenClosure128, $renderingContext);

$output82 .= '
	</h1>

	<div class="row">
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments129 = array();
// Rendering Array
$array130 = array();
$array130['0'] = 2;
$array130['1'] = 2;
$array130['2'] = 2;
$array130['3'] = 2;
$array130['4'] = 2;
$array130['5'] = 1;
$array130['6'] = 1;
$arguments129['each'] = $array130;
$arguments129['key'] = 'count';
$arguments129['as'] = 'cols';
$arguments129['reverse'] = false;
$arguments129['iteration'] = NULL;
$renderChildrenClosure131 = function() use ($renderingContext, $self) {
$output132 = '';

$output132 .= '
			<div class="col-md-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments133 = array();
$arguments133['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'cols', $renderingContext);
$arguments133['keepQuotes'] = false;
$arguments133['encoding'] = NULL;
$arguments133['doubleEncode'] = true;
$renderChildrenClosure134 = function() use ($renderingContext, $self) {
return NULL;
};
$value135 = ($arguments133['value'] !== NULL ? $arguments133['value'] : $renderChildrenClosure134());

$output132 .= (!is_string($value135) ? $value135 : htmlspecialchars($value135, ($arguments133['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments133['encoding'] !== NULL ? $arguments133['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments133['doubleEncode']));

$output132 .= '">
				';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments136 = array();
$arguments136['modification'] = '+1 day';
$arguments136['dateTime'] = NULL;
$renderChildrenClosure137 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments138 = array();
$arguments138['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
$arguments138['keepQuotes'] = false;
$arguments138['encoding'] = NULL;
$arguments138['doubleEncode'] = true;
$renderChildrenClosure139 = function() use ($renderingContext, $self) {
return NULL;
};
$value140 = ($arguments138['value'] !== NULL ? $arguments138['value'] : $renderChildrenClosure139());
return (!is_string($value140) ? $value140 : htmlspecialchars($value140, ($arguments138['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments138['encoding'] !== NULL ? $arguments138['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments138['doubleEncode']));
};
$viewHelper141 = $self->getViewHelper('$viewHelper141', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper');
$viewHelper141->setArguments($arguments136);
$viewHelper141->setRenderingContext($renderingContext);
$viewHelper141->setRenderChildrenClosure($renderChildrenClosure137);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper

$output132 .= $viewHelper141->initializeArgumentsAndRender();

$output132 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments142 = array();
$arguments142['format'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateFormat', $renderingContext);
$arguments142['date'] = NULL;
$renderChildrenClosure143 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
};

$output132 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments142, $renderChildrenClosure143, $renderingContext);

$output132 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments144 = array();
$arguments144['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'indices', $renderingContext);
$arguments144['as'] = 'index';
$arguments144['key'] = '';
$arguments144['reverse'] = false;
$arguments144['iteration'] = NULL;
$renderChildrenClosure145 = function() use ($renderingContext, $self) {
$output146 = '';

$output146 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments147 = array();
// Rendering Boolean node
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\IndexOnDayViewHelper
$arguments148 = array();
$arguments148['index'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index', $renderingContext);
$arguments148['day'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'firstDay', $renderingContext);
$arguments148['indices'] = array (
);
$renderChildrenClosure149 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper150 = $self->getViewHelper('$viewHelper150', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\IndexOnDayViewHelper');
$viewHelper150->setArguments($arguments148);
$viewHelper150->setRenderingContext($renderingContext);
$viewHelper150->setRenderChildrenClosure($renderChildrenClosure149);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\IndexOnDayViewHelper
$arguments147['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean($viewHelper150->initializeArgumentsAndRender());
$arguments147['then'] = NULL;
$arguments147['else'] = NULL;
$renderChildrenClosure151 = function() use ($renderingContext, $self) {
$output152 = '';

$output152 .= '
						<li>
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments153 = array();
$output154 = '';

$output154 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index.configuration.partialIdentifier', $renderingContext);

$output154 .= '/Title';
$arguments153['partial'] = $output154;
// Rendering Array
$array155 = array();
$array155['index'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index', $renderingContext);
$arguments153['arguments'] = $array155;
$arguments153['section'] = NULL;
$arguments153['optional'] = false;
$renderChildrenClosure156 = function() use ($renderingContext, $self) {
return NULL;
};

$output152 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments153, $renderChildrenClosure156, $renderingContext);

$output152 .= '
						</li>
					';
return $output152;
};
$viewHelper157 = $self->getViewHelper('$viewHelper157', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper157->setArguments($arguments147);
$viewHelper157->setRenderingContext($renderingContext);
$viewHelper157->setRenderChildrenClosure($renderChildrenClosure151);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output146 .= $viewHelper157->initializeArgumentsAndRender();

$output146 .= '
				';
return $output146;
};

$output132 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments144, $renderChildrenClosure145, $renderingContext);

$output132 .= '
			</div>
		';
return $output132;
};

$output82 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments129, $renderChildrenClosure131, $renderingContext);

$output82 .= '
	</div>


';
return $output82;
};

$output76 .= '';

return $output76;
}


}
#1434487077    44326     