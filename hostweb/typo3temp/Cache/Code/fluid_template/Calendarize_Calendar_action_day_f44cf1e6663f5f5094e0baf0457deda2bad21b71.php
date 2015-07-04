<?php
class FluidCache_Calendarize_Calendar_action_day_f44cf1e6663f5f5094e0baf0457deda2bad21b71 extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
$arguments1['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dayPid', $renderingContext));
$arguments1['then'] = NULL;
$arguments1['else'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$output3 = '';

$output3 .= '
		<div class="browser">

			';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\IfDateUpperViewHelper
$arguments4 = array();
$arguments4['base'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateLimitBrowserPrev', $renderingContext);
$arguments4['check'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'previous', $renderingContext);
$arguments4['then'] = NULL;
$arguments4['else'] = NULL;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
$output6 = '';

$output6 .= '
				';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Link\DayViewHelper
$arguments7 = array();
$arguments7['pageUid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dayPid', $renderingContext);
$arguments7['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'previous', $renderingContext);
$arguments7['additionalAttributes'] = NULL;
$arguments7['data'] = NULL;
$arguments7['class'] = NULL;
$arguments7['dir'] = NULL;
$arguments7['id'] = NULL;
$arguments7['lang'] = NULL;
$arguments7['style'] = NULL;
$arguments7['title'] = NULL;
$arguments7['accesskey'] = NULL;
$arguments7['tabindex'] = NULL;
$arguments7['onclick'] = NULL;
$arguments7['target'] = NULL;
$arguments7['rel'] = NULL;
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
$output9 = '';

$output9 .= '
					&lt; ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments10 = array();
$arguments10['format'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateFormat', $renderingContext);
$arguments10['date'] = NULL;
$renderChildrenClosure11 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'previous', $renderingContext);
};

$output9 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments10, $renderChildrenClosure11, $renderingContext);

$output9 .= '
				';
return $output9;
};
$viewHelper12 = $self->getViewHelper('$viewHelper12', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Link\DayViewHelper');
$viewHelper12->setArguments($arguments7);
$viewHelper12->setRenderingContext($renderingContext);
$viewHelper12->setRenderChildrenClosure($renderChildrenClosure8);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Link\DayViewHelper

$output6 .= $viewHelper12->initializeArgumentsAndRender();

$output6 .= '
			';
return $output6;
};
$viewHelper13 = $self->getViewHelper('$viewHelper13', $renderingContext, 'HDNET\Calendarize\ViewHelpers\IfDateUpperViewHelper');
$viewHelper13->setArguments($arguments4);
$viewHelper13->setRenderingContext($renderingContext);
$viewHelper13->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\IfDateUpperViewHelper

$output3 .= $viewHelper13->initializeArgumentsAndRender();

$output3 .= '

			';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper
$arguments14 = array();
$arguments14['base'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateLimitBrowserNext', $renderingContext);
$arguments14['check'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'next', $renderingContext);
$arguments14['then'] = NULL;
$arguments14['else'] = NULL;
$renderChildrenClosure15 = function() use ($renderingContext, $self) {
$output16 = '';

$output16 .= '
				';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Link\DayViewHelper
$arguments17 = array();
$arguments17['pageUid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dayPid', $renderingContext);
$arguments17['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'next', $renderingContext);
$arguments17['additionalAttributes'] = NULL;
$arguments17['data'] = NULL;
$arguments17['class'] = NULL;
$arguments17['dir'] = NULL;
$arguments17['id'] = NULL;
$arguments17['lang'] = NULL;
$arguments17['style'] = NULL;
$arguments17['title'] = NULL;
$arguments17['accesskey'] = NULL;
$arguments17['tabindex'] = NULL;
$arguments17['onclick'] = NULL;
$arguments17['target'] = NULL;
$arguments17['rel'] = NULL;
$renderChildrenClosure18 = function() use ($renderingContext, $self) {
$output19 = '';

$output19 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments20 = array();
$arguments20['format'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateFormat', $renderingContext);
$arguments20['date'] = NULL;
$renderChildrenClosure21 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'next', $renderingContext);
};

$output19 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments20, $renderChildrenClosure21, $renderingContext);

$output19 .= ' &gt;
				';
return $output19;
};
$viewHelper22 = $self->getViewHelper('$viewHelper22', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Link\DayViewHelper');
$viewHelper22->setArguments($arguments17);
$viewHelper22->setRenderingContext($renderingContext);
$viewHelper22->setRenderChildrenClosure($renderChildrenClosure18);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Link\DayViewHelper

$output16 .= $viewHelper22->initializeArgumentsAndRender();

$output16 .= '
			';
return $output16;
};
$viewHelper23 = $self->getViewHelper('$viewHelper23', $renderingContext, 'HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper');
$viewHelper23->setArguments($arguments14);
$viewHelper23->setRenderingContext($renderingContext);
$viewHelper23->setRenderChildrenClosure($renderChildrenClosure15);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper

$output3 .= $viewHelper23->initializeArgumentsAndRender();

$output3 .= '

		</div>
	';
return $output3;
};
$viewHelper24 = $self->getViewHelper('$viewHelper24', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper24->setArguments($arguments1);
$viewHelper24->setRenderingContext($renderingContext);
$viewHelper24->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper24->initializeArgumentsAndRender();

$output0 .= '

	<h1>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments25 = array();
$arguments25['format'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateFormat', $renderingContext);
$arguments25['date'] = NULL;
$renderChildrenClosure26 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'today', $renderingContext);
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments25, $renderChildrenClosure26, $renderingContext);

$output0 .= '
	</h1>

	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments27 = array();
// Rendering Boolean node
$arguments27['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'indices', $renderingContext));
$arguments27['then'] = NULL;
$arguments27['else'] = NULL;
$renderChildrenClosure28 = function() use ($renderingContext, $self) {
$output29 = '';

$output29 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments30 = array();
$renderChildrenClosure31 = function() use ($renderingContext, $self) {
$output32 = '';

$output32 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments33 = array();
$arguments33['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'indices', $renderingContext);
$arguments33['as'] = 'index';
$arguments33['key'] = '';
$arguments33['reverse'] = false;
$arguments33['iteration'] = NULL;
$renderChildrenClosure34 = function() use ($renderingContext, $self) {
$output35 = '';

$output35 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments36 = array();
$output37 = '';

$output37 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index.configuration.partialIdentifier', $renderingContext);

$output37 .= '/ListItem';
$arguments36['partial'] = $output37;
// Rendering Array
$array38 = array();
$array38['index'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index', $renderingContext);
$arguments36['arguments'] = $array38;
$arguments36['section'] = NULL;
$arguments36['optional'] = false;
$renderChildrenClosure39 = function() use ($renderingContext, $self) {
return NULL;
};

$output35 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments36, $renderChildrenClosure39, $renderingContext);

$output35 .= '
			';
return $output35;
};

$output32 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments33, $renderChildrenClosure34, $renderingContext);

$output32 .= '
		';
return $output32;
};

$output29 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments30, $renderChildrenClosure31, $renderingContext);

$output29 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments40 = array();
$renderChildrenClosure41 = function() use ($renderingContext, $self) {
$output42 = '';

$output42 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments43 = array();
$arguments43['key'] = 'noEvents.day';
$arguments43['id'] = NULL;
$arguments43['default'] = NULL;
$arguments43['htmlEscape'] = NULL;
$arguments43['arguments'] = NULL;
$arguments43['extensionName'] = NULL;
$renderChildrenClosure44 = function() use ($renderingContext, $self) {
return NULL;
};

$output42 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments43, $renderChildrenClosure44, $renderingContext);

$output42 .= '
		';
return $output42;
};

$output29 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments40, $renderChildrenClosure41, $renderingContext);

$output29 .= '
	';
return $output29;
};
$arguments27['__thenClosure'] = function() use ($renderingContext, $self) {
$output45 = '';

$output45 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments46 = array();
$arguments46['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'indices', $renderingContext);
$arguments46['as'] = 'index';
$arguments46['key'] = '';
$arguments46['reverse'] = false;
$arguments46['iteration'] = NULL;
$renderChildrenClosure47 = function() use ($renderingContext, $self) {
$output48 = '';

$output48 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments49 = array();
$output50 = '';

$output50 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index.configuration.partialIdentifier', $renderingContext);

$output50 .= '/ListItem';
$arguments49['partial'] = $output50;
// Rendering Array
$array51 = array();
$array51['index'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index', $renderingContext);
$arguments49['arguments'] = $array51;
$arguments49['section'] = NULL;
$arguments49['optional'] = false;
$renderChildrenClosure52 = function() use ($renderingContext, $self) {
return NULL;
};

$output48 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments49, $renderChildrenClosure52, $renderingContext);

$output48 .= '
			';
return $output48;
};

$output45 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments46, $renderChildrenClosure47, $renderingContext);

$output45 .= '
		';
return $output45;
};
$arguments27['__elseClosure'] = function() use ($renderingContext, $self) {
$output53 = '';

$output53 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments54 = array();
$arguments54['key'] = 'noEvents.day';
$arguments54['id'] = NULL;
$arguments54['default'] = NULL;
$arguments54['htmlEscape'] = NULL;
$arguments54['arguments'] = NULL;
$arguments54['extensionName'] = NULL;
$renderChildrenClosure55 = function() use ($renderingContext, $self) {
return NULL;
};

$output53 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments54, $renderChildrenClosure55, $renderingContext);

$output53 .= '
		';
return $output53;
};
$viewHelper56 = $self->getViewHelper('$viewHelper56', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper56->setArguments($arguments27);
$viewHelper56->setRenderingContext($renderingContext);
$viewHelper56->setRenderChildrenClosure($renderChildrenClosure28);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper56->initializeArgumentsAndRender();

$output0 .= '

';

return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output57 = '';

$output57 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper
$arguments58 = array();
$arguments58['name'] = 'Default';
$renderChildrenClosure59 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper60 = $self->getViewHelper('$viewHelper60', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper60->setArguments($arguments58);
$viewHelper60->setRenderingContext($renderingContext);
$viewHelper60->setRenderChildrenClosure($renderChildrenClosure59);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper

$output57 .= $viewHelper60->initializeArgumentsAndRender();

$output57 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments61 = array();
$arguments61['name'] = 'Main';
$renderChildrenClosure62 = function() use ($renderingContext, $self) {
$output63 = '';

$output63 .= '

	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments64 = array();
// Rendering Boolean node
$arguments64['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dayPid', $renderingContext));
$arguments64['then'] = NULL;
$arguments64['else'] = NULL;
$renderChildrenClosure65 = function() use ($renderingContext, $self) {
$output66 = '';

$output66 .= '
		<div class="browser">

			';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\IfDateUpperViewHelper
$arguments67 = array();
$arguments67['base'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateLimitBrowserPrev', $renderingContext);
$arguments67['check'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'previous', $renderingContext);
$arguments67['then'] = NULL;
$arguments67['else'] = NULL;
$renderChildrenClosure68 = function() use ($renderingContext, $self) {
$output69 = '';

$output69 .= '
				';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Link\DayViewHelper
$arguments70 = array();
$arguments70['pageUid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dayPid', $renderingContext);
$arguments70['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'previous', $renderingContext);
$arguments70['additionalAttributes'] = NULL;
$arguments70['data'] = NULL;
$arguments70['class'] = NULL;
$arguments70['dir'] = NULL;
$arguments70['id'] = NULL;
$arguments70['lang'] = NULL;
$arguments70['style'] = NULL;
$arguments70['title'] = NULL;
$arguments70['accesskey'] = NULL;
$arguments70['tabindex'] = NULL;
$arguments70['onclick'] = NULL;
$arguments70['target'] = NULL;
$arguments70['rel'] = NULL;
$renderChildrenClosure71 = function() use ($renderingContext, $self) {
$output72 = '';

$output72 .= '
					&lt; ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments73 = array();
$arguments73['format'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateFormat', $renderingContext);
$arguments73['date'] = NULL;
$renderChildrenClosure74 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'previous', $renderingContext);
};

$output72 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments73, $renderChildrenClosure74, $renderingContext);

$output72 .= '
				';
return $output72;
};
$viewHelper75 = $self->getViewHelper('$viewHelper75', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Link\DayViewHelper');
$viewHelper75->setArguments($arguments70);
$viewHelper75->setRenderingContext($renderingContext);
$viewHelper75->setRenderChildrenClosure($renderChildrenClosure71);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Link\DayViewHelper

$output69 .= $viewHelper75->initializeArgumentsAndRender();

$output69 .= '
			';
return $output69;
};
$viewHelper76 = $self->getViewHelper('$viewHelper76', $renderingContext, 'HDNET\Calendarize\ViewHelpers\IfDateUpperViewHelper');
$viewHelper76->setArguments($arguments67);
$viewHelper76->setRenderingContext($renderingContext);
$viewHelper76->setRenderChildrenClosure($renderChildrenClosure68);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\IfDateUpperViewHelper

$output66 .= $viewHelper76->initializeArgumentsAndRender();

$output66 .= '

			';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper
$arguments77 = array();
$arguments77['base'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateLimitBrowserNext', $renderingContext);
$arguments77['check'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'next', $renderingContext);
$arguments77['then'] = NULL;
$arguments77['else'] = NULL;
$renderChildrenClosure78 = function() use ($renderingContext, $self) {
$output79 = '';

$output79 .= '
				';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Link\DayViewHelper
$arguments80 = array();
$arguments80['pageUid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dayPid', $renderingContext);
$arguments80['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'next', $renderingContext);
$arguments80['additionalAttributes'] = NULL;
$arguments80['data'] = NULL;
$arguments80['class'] = NULL;
$arguments80['dir'] = NULL;
$arguments80['id'] = NULL;
$arguments80['lang'] = NULL;
$arguments80['style'] = NULL;
$arguments80['title'] = NULL;
$arguments80['accesskey'] = NULL;
$arguments80['tabindex'] = NULL;
$arguments80['onclick'] = NULL;
$arguments80['target'] = NULL;
$arguments80['rel'] = NULL;
$renderChildrenClosure81 = function() use ($renderingContext, $self) {
$output82 = '';

$output82 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments83 = array();
$arguments83['format'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateFormat', $renderingContext);
$arguments83['date'] = NULL;
$renderChildrenClosure84 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'next', $renderingContext);
};

$output82 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments83, $renderChildrenClosure84, $renderingContext);

$output82 .= ' &gt;
				';
return $output82;
};
$viewHelper85 = $self->getViewHelper('$viewHelper85', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Link\DayViewHelper');
$viewHelper85->setArguments($arguments80);
$viewHelper85->setRenderingContext($renderingContext);
$viewHelper85->setRenderChildrenClosure($renderChildrenClosure81);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Link\DayViewHelper

$output79 .= $viewHelper85->initializeArgumentsAndRender();

$output79 .= '
			';
return $output79;
};
$viewHelper86 = $self->getViewHelper('$viewHelper86', $renderingContext, 'HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper');
$viewHelper86->setArguments($arguments77);
$viewHelper86->setRenderingContext($renderingContext);
$viewHelper86->setRenderChildrenClosure($renderChildrenClosure78);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper

$output66 .= $viewHelper86->initializeArgumentsAndRender();

$output66 .= '

		</div>
	';
return $output66;
};
$viewHelper87 = $self->getViewHelper('$viewHelper87', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper87->setArguments($arguments64);
$viewHelper87->setRenderingContext($renderingContext);
$viewHelper87->setRenderChildrenClosure($renderChildrenClosure65);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output63 .= $viewHelper87->initializeArgumentsAndRender();

$output63 .= '

	<h1>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments88 = array();
$arguments88['format'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateFormat', $renderingContext);
$arguments88['date'] = NULL;
$renderChildrenClosure89 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'today', $renderingContext);
};

$output63 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments88, $renderChildrenClosure89, $renderingContext);

$output63 .= '
	</h1>

	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments90 = array();
// Rendering Boolean node
$arguments90['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'indices', $renderingContext));
$arguments90['then'] = NULL;
$arguments90['else'] = NULL;
$renderChildrenClosure91 = function() use ($renderingContext, $self) {
$output92 = '';

$output92 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments93 = array();
$renderChildrenClosure94 = function() use ($renderingContext, $self) {
$output95 = '';

$output95 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments96 = array();
$arguments96['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'indices', $renderingContext);
$arguments96['as'] = 'index';
$arguments96['key'] = '';
$arguments96['reverse'] = false;
$arguments96['iteration'] = NULL;
$renderChildrenClosure97 = function() use ($renderingContext, $self) {
$output98 = '';

$output98 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments99 = array();
$output100 = '';

$output100 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index.configuration.partialIdentifier', $renderingContext);

$output100 .= '/ListItem';
$arguments99['partial'] = $output100;
// Rendering Array
$array101 = array();
$array101['index'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index', $renderingContext);
$arguments99['arguments'] = $array101;
$arguments99['section'] = NULL;
$arguments99['optional'] = false;
$renderChildrenClosure102 = function() use ($renderingContext, $self) {
return NULL;
};

$output98 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments99, $renderChildrenClosure102, $renderingContext);

$output98 .= '
			';
return $output98;
};

$output95 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments96, $renderChildrenClosure97, $renderingContext);

$output95 .= '
		';
return $output95;
};

$output92 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments93, $renderChildrenClosure94, $renderingContext);

$output92 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments103 = array();
$renderChildrenClosure104 = function() use ($renderingContext, $self) {
$output105 = '';

$output105 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments106 = array();
$arguments106['key'] = 'noEvents.day';
$arguments106['id'] = NULL;
$arguments106['default'] = NULL;
$arguments106['htmlEscape'] = NULL;
$arguments106['arguments'] = NULL;
$arguments106['extensionName'] = NULL;
$renderChildrenClosure107 = function() use ($renderingContext, $self) {
return NULL;
};

$output105 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments106, $renderChildrenClosure107, $renderingContext);

$output105 .= '
		';
return $output105;
};

$output92 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments103, $renderChildrenClosure104, $renderingContext);

$output92 .= '
	';
return $output92;
};
$arguments90['__thenClosure'] = function() use ($renderingContext, $self) {
$output108 = '';

$output108 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments109 = array();
$arguments109['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'indices', $renderingContext);
$arguments109['as'] = 'index';
$arguments109['key'] = '';
$arguments109['reverse'] = false;
$arguments109['iteration'] = NULL;
$renderChildrenClosure110 = function() use ($renderingContext, $self) {
$output111 = '';

$output111 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments112 = array();
$output113 = '';

$output113 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index.configuration.partialIdentifier', $renderingContext);

$output113 .= '/ListItem';
$arguments112['partial'] = $output113;
// Rendering Array
$array114 = array();
$array114['index'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index', $renderingContext);
$arguments112['arguments'] = $array114;
$arguments112['section'] = NULL;
$arguments112['optional'] = false;
$renderChildrenClosure115 = function() use ($renderingContext, $self) {
return NULL;
};

$output111 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments112, $renderChildrenClosure115, $renderingContext);

$output111 .= '
			';
return $output111;
};

$output108 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments109, $renderChildrenClosure110, $renderingContext);

$output108 .= '
		';
return $output108;
};
$arguments90['__elseClosure'] = function() use ($renderingContext, $self) {
$output116 = '';

$output116 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments117 = array();
$arguments117['key'] = 'noEvents.day';
$arguments117['id'] = NULL;
$arguments117['default'] = NULL;
$arguments117['htmlEscape'] = NULL;
$arguments117['arguments'] = NULL;
$arguments117['extensionName'] = NULL;
$renderChildrenClosure118 = function() use ($renderingContext, $self) {
return NULL;
};

$output116 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments117, $renderChildrenClosure118, $renderingContext);

$output116 .= '
		';
return $output116;
};
$viewHelper119 = $self->getViewHelper('$viewHelper119', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper119->setArguments($arguments90);
$viewHelper119->setRenderingContext($renderingContext);
$viewHelper119->setRenderChildrenClosure($renderChildrenClosure91);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output63 .= $viewHelper119->initializeArgumentsAndRender();

$output63 .= '

';
return $output63;
};

$output57 .= '';

return $output57;
}


}
#1435266037    31159     