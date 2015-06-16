<?php
class FluidCache_Calendarize_Calendar_partial_Month_f64e1388d1dd1d43bda8f282f05a059671d49844 extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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

$output0 .= '

<table class="table table-bordered">
	<thead>
		<tr>
			<td colspan="7">
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments1 = array();
// Rendering Boolean node
$arguments1['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.monthPid', $renderingContext));
$arguments1['then'] = NULL;
$arguments1['else'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$output3 = '';

$output3 .= '
					';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\IfDateUpperViewHelper
$arguments4 = array();
$arguments4['base'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateLimitBrowserPrev', $renderingContext);
$arguments4['check'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments4['then'] = NULL;
$arguments4['else'] = NULL;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
$output6 = '';

$output6 .= '
						';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments7 = array();
$arguments7['modification'] = '-1 month';
$arguments7['dateTime'] = NULL;
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments9 = array();
$arguments9['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments9['keepQuotes'] = false;
$arguments9['encoding'] = NULL;
$arguments9['doubleEncode'] = true;
$renderChildrenClosure10 = function() use ($renderingContext, $self) {
return NULL;
};
$value11 = ($arguments9['value'] !== NULL ? $arguments9['value'] : $renderChildrenClosure10());
return (!is_string($value11) ? $value11 : htmlspecialchars($value11, ($arguments9['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments9['encoding'] !== NULL ? $arguments9['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments9['doubleEncode']));
};
$viewHelper12 = $self->getViewHelper('$viewHelper12', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper');
$viewHelper12->setArguments($arguments7);
$viewHelper12->setRenderingContext($renderingContext);
$viewHelper12->setRenderChildrenClosure($renderChildrenClosure8);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper

$output6 .= $viewHelper12->initializeArgumentsAndRender();

$output6 .= '
						';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Link\MonthViewHelper
$arguments13 = array();
$arguments13['pageUid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.monthPid', $renderingContext);
$arguments13['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
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
$viewHelper15 = $self->getViewHelper('$viewHelper15', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Link\MonthViewHelper');
$viewHelper15->setArguments($arguments13);
$viewHelper15->setRenderingContext($renderingContext);
$viewHelper15->setRenderChildrenClosure($renderChildrenClosure14);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Link\MonthViewHelper

$output6 .= $viewHelper15->initializeArgumentsAndRender();

$output6 .= '
						';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments16 = array();
$arguments16['modification'] = '+1 month';
$arguments16['dateTime'] = NULL;
$renderChildrenClosure17 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments18 = array();
$arguments18['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments18['keepQuotes'] = false;
$arguments18['encoding'] = NULL;
$arguments18['doubleEncode'] = true;
$renderChildrenClosure19 = function() use ($renderingContext, $self) {
return NULL;
};
$value20 = ($arguments18['value'] !== NULL ? $arguments18['value'] : $renderChildrenClosure19());
return (!is_string($value20) ? $value20 : htmlspecialchars($value20, ($arguments18['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments18['encoding'] !== NULL ? $arguments18['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments18['doubleEncode']));
};
$viewHelper21 = $self->getViewHelper('$viewHelper21', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper');
$viewHelper21->setArguments($arguments16);
$viewHelper21->setRenderingContext($renderingContext);
$viewHelper21->setRenderChildrenClosure($renderChildrenClosure17);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper

$output6 .= $viewHelper21->initializeArgumentsAndRender();

$output6 .= '
					';
return $output6;
};
$viewHelper22 = $self->getViewHelper('$viewHelper22', $renderingContext, 'HDNET\Calendarize\ViewHelpers\IfDateUpperViewHelper');
$viewHelper22->setArguments($arguments4);
$viewHelper22->setRenderingContext($renderingContext);
$viewHelper22->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\IfDateUpperViewHelper

$output3 .= $viewHelper22->initializeArgumentsAndRender();

$output3 .= '
				';
return $output3;
};
$viewHelper23 = $self->getViewHelper('$viewHelper23', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper23->setArguments($arguments1);
$viewHelper23->setRenderingContext($renderingContext);
$viewHelper23->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper23->initializeArgumentsAndRender();

$output0 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments24 = array();
$arguments24['format'] = 'F Y';
$arguments24['date'] = NULL;
$renderChildrenClosure25 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments24, $renderChildrenClosure25, $renderingContext);

$output0 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments26 = array();
// Rendering Boolean node
$arguments26['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.monthPid', $renderingContext));
$arguments26['then'] = NULL;
$arguments26['else'] = NULL;
$renderChildrenClosure27 = function() use ($renderingContext, $self) {
$output28 = '';

$output28 .= '
					';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper
$arguments29 = array();
$arguments29['base'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateLimitBrowserNext', $renderingContext);
$arguments29['check'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments29['then'] = NULL;
$arguments29['else'] = NULL;
$renderChildrenClosure30 = function() use ($renderingContext, $self) {
$output31 = '';

$output31 .= '
						';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments32 = array();
$arguments32['modification'] = '+1 month';
$arguments32['dateTime'] = NULL;
$renderChildrenClosure33 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments34 = array();
$arguments34['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments34['keepQuotes'] = false;
$arguments34['encoding'] = NULL;
$arguments34['doubleEncode'] = true;
$renderChildrenClosure35 = function() use ($renderingContext, $self) {
return NULL;
};
$value36 = ($arguments34['value'] !== NULL ? $arguments34['value'] : $renderChildrenClosure35());
return (!is_string($value36) ? $value36 : htmlspecialchars($value36, ($arguments34['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments34['encoding'] !== NULL ? $arguments34['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments34['doubleEncode']));
};
$viewHelper37 = $self->getViewHelper('$viewHelper37', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper');
$viewHelper37->setArguments($arguments32);
$viewHelper37->setRenderingContext($renderingContext);
$viewHelper37->setRenderChildrenClosure($renderChildrenClosure33);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper

$output31 .= $viewHelper37->initializeArgumentsAndRender();

$output31 .= '
						';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Link\MonthViewHelper
$arguments38 = array();
$arguments38['pageUid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.monthPid', $renderingContext);
$arguments38['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments38['additionalAttributes'] = NULL;
$arguments38['data'] = NULL;
$arguments38['class'] = NULL;
$arguments38['dir'] = NULL;
$arguments38['id'] = NULL;
$arguments38['lang'] = NULL;
$arguments38['style'] = NULL;
$arguments38['title'] = NULL;
$arguments38['accesskey'] = NULL;
$arguments38['tabindex'] = NULL;
$arguments38['onclick'] = NULL;
$arguments38['target'] = NULL;
$arguments38['rel'] = NULL;
$renderChildrenClosure39 = function() use ($renderingContext, $self) {
return '
							&gt;
						';
};
$viewHelper40 = $self->getViewHelper('$viewHelper40', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Link\MonthViewHelper');
$viewHelper40->setArguments($arguments38);
$viewHelper40->setRenderingContext($renderingContext);
$viewHelper40->setRenderChildrenClosure($renderChildrenClosure39);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Link\MonthViewHelper

$output31 .= $viewHelper40->initializeArgumentsAndRender();

$output31 .= '
						';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments41 = array();
$arguments41['modification'] = '-1 month';
$arguments41['dateTime'] = NULL;
$renderChildrenClosure42 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments43 = array();
$arguments43['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments43['keepQuotes'] = false;
$arguments43['encoding'] = NULL;
$arguments43['doubleEncode'] = true;
$renderChildrenClosure44 = function() use ($renderingContext, $self) {
return NULL;
};
$value45 = ($arguments43['value'] !== NULL ? $arguments43['value'] : $renderChildrenClosure44());
return (!is_string($value45) ? $value45 : htmlspecialchars($value45, ($arguments43['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments43['encoding'] !== NULL ? $arguments43['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments43['doubleEncode']));
};
$viewHelper46 = $self->getViewHelper('$viewHelper46', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper');
$viewHelper46->setArguments($arguments41);
$viewHelper46->setRenderingContext($renderingContext);
$viewHelper46->setRenderChildrenClosure($renderChildrenClosure42);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper

$output31 .= $viewHelper46->initializeArgumentsAndRender();

$output31 .= '
					';
return $output31;
};
$viewHelper47 = $self->getViewHelper('$viewHelper47', $renderingContext, 'HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper');
$viewHelper47->setArguments($arguments29);
$viewHelper47->setRenderingContext($renderingContext);
$viewHelper47->setRenderChildrenClosure($renderChildrenClosure30);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper

$output28 .= $viewHelper47->initializeArgumentsAndRender();

$output28 .= '
				';
return $output28;
};
$viewHelper48 = $self->getViewHelper('$viewHelper48', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper48->setArguments($arguments26);
$viewHelper48->setRenderingContext($renderingContext);
$viewHelper48->setRenderChildrenClosure($renderChildrenClosure27);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper48->initializeArgumentsAndRender();

$output0 .= '
			</td>
		</tr>
	</thead>
	<tbody>
		';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Loop\WeeksInMonthViewHelper
$arguments49 = array();
$arguments49['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments49['iteration'] = 'week';
$arguments49['weekStartsAt'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.weekStart', $renderingContext);
$renderChildrenClosure50 = function() use ($renderingContext, $self) {
$output51 = '';

$output51 .= '
			<tr>
				';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Loop\DaysInWeekViewHelper
$arguments52 = array();
$arguments52['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'week.calendar.date', $renderingContext);
$arguments52['iteration'] = 'day';
$arguments52['weekStartsAt'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.weekStart', $renderingContext);
$renderChildrenClosure53 = function() use ($renderingContext, $self) {
$output54 = '';

$output54 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments55 = array();
// Rendering Boolean node
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\IndexOnDayViewHelper
$arguments56 = array();
$arguments56['indices'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'indices', $renderingContext);
$arguments56['day'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'day.calendar.date', $renderingContext);
$arguments56['index'] = NULL;
$renderChildrenClosure57 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper58 = $self->getViewHelper('$viewHelper58', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\IndexOnDayViewHelper');
$viewHelper58->setArguments($arguments56);
$viewHelper58->setRenderingContext($renderingContext);
$viewHelper58->setRenderChildrenClosure($renderChildrenClosure57);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\IndexOnDayViewHelper
$arguments55['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean($viewHelper58->initializeArgumentsAndRender());
$arguments55['then'] = NULL;
$arguments55['else'] = NULL;
$renderChildrenClosure59 = function() use ($renderingContext, $self) {
$output60 = '';

$output60 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments61 = array();
$renderChildrenClosure62 = function() use ($renderingContext, $self) {
$output63 = '';

$output63 .= '
							<td class="hasEvents">
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
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments67 = array();
$renderChildrenClosure68 = function() use ($renderingContext, $self) {
$output69 = '';

$output69 .= '
										';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Link\DayViewHelper
$arguments70 = array();
$arguments70['pageUid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dayPid', $renderingContext);
$arguments70['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'day.calendar.date', $renderingContext);
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
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments73 = array();
$arguments73['format'] = 'd';
$arguments73['date'] = NULL;
$renderChildrenClosure74 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'day.calendar.date', $renderingContext);
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

$output66 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments67, $renderChildrenClosure68, $renderingContext);

$output66 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments76 = array();
$renderChildrenClosure77 = function() use ($renderingContext, $self) {
$output78 = '';

$output78 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments79 = array();
$arguments79['format'] = 'd';
$arguments79['date'] = NULL;
$renderChildrenClosure80 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'day.calendar.date', $renderingContext);
};

$output78 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments79, $renderChildrenClosure80, $renderingContext);

$output78 .= '
									';
return $output78;
};

$output66 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments76, $renderChildrenClosure77, $renderingContext);

$output66 .= '
								';
return $output66;
};
$arguments64['__thenClosure'] = function() use ($renderingContext, $self) {
$output81 = '';

$output81 .= '
										';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Link\DayViewHelper
$arguments82 = array();
$arguments82['pageUid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dayPid', $renderingContext);
$arguments82['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'day.calendar.date', $renderingContext);
$arguments82['additionalAttributes'] = NULL;
$arguments82['data'] = NULL;
$arguments82['class'] = NULL;
$arguments82['dir'] = NULL;
$arguments82['id'] = NULL;
$arguments82['lang'] = NULL;
$arguments82['style'] = NULL;
$arguments82['title'] = NULL;
$arguments82['accesskey'] = NULL;
$arguments82['tabindex'] = NULL;
$arguments82['onclick'] = NULL;
$arguments82['target'] = NULL;
$arguments82['rel'] = NULL;
$renderChildrenClosure83 = function() use ($renderingContext, $self) {
$output84 = '';

$output84 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments85 = array();
$arguments85['format'] = 'd';
$arguments85['date'] = NULL;
$renderChildrenClosure86 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'day.calendar.date', $renderingContext);
};

$output84 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments85, $renderChildrenClosure86, $renderingContext);

$output84 .= '
										';
return $output84;
};
$viewHelper87 = $self->getViewHelper('$viewHelper87', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Link\DayViewHelper');
$viewHelper87->setArguments($arguments82);
$viewHelper87->setRenderingContext($renderingContext);
$viewHelper87->setRenderChildrenClosure($renderChildrenClosure83);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Link\DayViewHelper

$output81 .= $viewHelper87->initializeArgumentsAndRender();

$output81 .= '
									';
return $output81;
};
$arguments64['__elseClosure'] = function() use ($renderingContext, $self) {
$output88 = '';

$output88 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments89 = array();
$arguments89['format'] = 'd';
$arguments89['date'] = NULL;
$renderChildrenClosure90 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'day.calendar.date', $renderingContext);
};

$output88 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments89, $renderChildrenClosure90, $renderingContext);

$output88 .= '
									';
return $output88;
};
$viewHelper91 = $self->getViewHelper('$viewHelper91', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper91->setArguments($arguments64);
$viewHelper91->setRenderingContext($renderingContext);
$viewHelper91->setRenderChildrenClosure($renderChildrenClosure65);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output63 .= $viewHelper91->initializeArgumentsAndRender();

$output63 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments92 = array();
// Rendering Boolean node
$arguments92['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.detailPid', $renderingContext));
$arguments92['then'] = NULL;
$arguments92['else'] = NULL;
$renderChildrenClosure93 = function() use ($renderingContext, $self) {
$output94 = '';

$output94 .= '
									<ul class="events">
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments95 = array();
$arguments95['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'indices', $renderingContext);
$arguments95['as'] = 'index';
$arguments95['key'] = '';
$arguments95['reverse'] = false;
$arguments95['iteration'] = NULL;
$renderChildrenClosure96 = function() use ($renderingContext, $self) {
$output97 = '';

$output97 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments98 = array();
// Rendering Boolean node
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\IndexOnDayViewHelper
$arguments99 = array();
$arguments99['index'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index', $renderingContext);
$arguments99['day'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'day.calendar.date', $renderingContext);
$arguments99['indices'] = array (
);
$renderChildrenClosure100 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper101 = $self->getViewHelper('$viewHelper101', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\IndexOnDayViewHelper');
$viewHelper101->setArguments($arguments99);
$viewHelper101->setRenderingContext($renderingContext);
$viewHelper101->setRenderChildrenClosure($renderChildrenClosure100);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\IndexOnDayViewHelper
$arguments98['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean($viewHelper101->initializeArgumentsAndRender());
$arguments98['then'] = NULL;
$arguments98['else'] = NULL;
$renderChildrenClosure102 = function() use ($renderingContext, $self) {
$output103 = '';

$output103 .= '
												<li>
													';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Link\IndexViewHelper
$arguments104 = array();
$arguments104['index'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index', $renderingContext);
$arguments104['pageUid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.detailPid', $renderingContext);
$arguments104['additionalAttributes'] = NULL;
$arguments104['data'] = NULL;
$arguments104['class'] = NULL;
$arguments104['dir'] = NULL;
$arguments104['id'] = NULL;
$arguments104['lang'] = NULL;
$arguments104['style'] = NULL;
$arguments104['title'] = NULL;
$arguments104['accesskey'] = NULL;
$arguments104['tabindex'] = NULL;
$arguments104['onclick'] = NULL;
$arguments104['target'] = NULL;
$arguments104['rel'] = NULL;
$renderChildrenClosure105 = function() use ($renderingContext, $self) {
$output106 = '';

$output106 .= '
														';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments107 = array();
$output108 = '';

$output108 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index.configuration.partialIdentifier', $renderingContext);

$output108 .= '/Title';
$arguments107['partial'] = $output108;
// Rendering Array
$array109 = array();
$array109['index'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index', $renderingContext);
$arguments107['arguments'] = $array109;
$arguments107['section'] = NULL;
$arguments107['optional'] = false;
$renderChildrenClosure110 = function() use ($renderingContext, $self) {
return NULL;
};

$output106 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments107, $renderChildrenClosure110, $renderingContext);

$output106 .= '
													';
return $output106;
};
$viewHelper111 = $self->getViewHelper('$viewHelper111', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Link\IndexViewHelper');
$viewHelper111->setArguments($arguments104);
$viewHelper111->setRenderingContext($renderingContext);
$viewHelper111->setRenderChildrenClosure($renderChildrenClosure105);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Link\IndexViewHelper

$output103 .= $viewHelper111->initializeArgumentsAndRender();

$output103 .= '
												</li>
											';
return $output103;
};
$viewHelper112 = $self->getViewHelper('$viewHelper112', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper112->setArguments($arguments98);
$viewHelper112->setRenderingContext($renderingContext);
$viewHelper112->setRenderChildrenClosure($renderChildrenClosure102);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output97 .= $viewHelper112->initializeArgumentsAndRender();

$output97 .= '
										';
return $output97;
};

$output94 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments95, $renderChildrenClosure96, $renderingContext);

$output94 .= '
									</ul>
								';
return $output94;
};
$viewHelper113 = $self->getViewHelper('$viewHelper113', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper113->setArguments($arguments92);
$viewHelper113->setRenderingContext($renderingContext);
$viewHelper113->setRenderChildrenClosure($renderChildrenClosure93);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output63 .= $viewHelper113->initializeArgumentsAndRender();

$output63 .= '
							</td>
						';
return $output63;
};

$output60 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments61, $renderChildrenClosure62, $renderingContext);

$output60 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments114 = array();
$renderChildrenClosure115 = function() use ($renderingContext, $self) {
$output116 = '';

$output116 .= '
							<td>
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments117 = array();
$arguments117['format'] = 'd';
$arguments117['date'] = NULL;
$renderChildrenClosure118 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'day.calendar.date', $renderingContext);
};

$output116 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments117, $renderChildrenClosure118, $renderingContext);

$output116 .= '
							</td>
						';
return $output116;
};

$output60 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments114, $renderChildrenClosure115, $renderingContext);

$output60 .= '
					';
return $output60;
};
$arguments55['__thenClosure'] = function() use ($renderingContext, $self) {
$output119 = '';

$output119 .= '
							<td class="hasEvents">
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments120 = array();
// Rendering Boolean node
$arguments120['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dayPid', $renderingContext));
$arguments120['then'] = NULL;
$arguments120['else'] = NULL;
$renderChildrenClosure121 = function() use ($renderingContext, $self) {
$output122 = '';

$output122 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments123 = array();
$renderChildrenClosure124 = function() use ($renderingContext, $self) {
$output125 = '';

$output125 .= '
										';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Link\DayViewHelper
$arguments126 = array();
$arguments126['pageUid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dayPid', $renderingContext);
$arguments126['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'day.calendar.date', $renderingContext);
$arguments126['additionalAttributes'] = NULL;
$arguments126['data'] = NULL;
$arguments126['class'] = NULL;
$arguments126['dir'] = NULL;
$arguments126['id'] = NULL;
$arguments126['lang'] = NULL;
$arguments126['style'] = NULL;
$arguments126['title'] = NULL;
$arguments126['accesskey'] = NULL;
$arguments126['tabindex'] = NULL;
$arguments126['onclick'] = NULL;
$arguments126['target'] = NULL;
$arguments126['rel'] = NULL;
$renderChildrenClosure127 = function() use ($renderingContext, $self) {
$output128 = '';

$output128 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments129 = array();
$arguments129['format'] = 'd';
$arguments129['date'] = NULL;
$renderChildrenClosure130 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'day.calendar.date', $renderingContext);
};

$output128 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments129, $renderChildrenClosure130, $renderingContext);

$output128 .= '
										';
return $output128;
};
$viewHelper131 = $self->getViewHelper('$viewHelper131', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Link\DayViewHelper');
$viewHelper131->setArguments($arguments126);
$viewHelper131->setRenderingContext($renderingContext);
$viewHelper131->setRenderChildrenClosure($renderChildrenClosure127);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Link\DayViewHelper

$output125 .= $viewHelper131->initializeArgumentsAndRender();

$output125 .= '
									';
return $output125;
};

$output122 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments123, $renderChildrenClosure124, $renderingContext);

$output122 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments132 = array();
$renderChildrenClosure133 = function() use ($renderingContext, $self) {
$output134 = '';

$output134 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments135 = array();
$arguments135['format'] = 'd';
$arguments135['date'] = NULL;
$renderChildrenClosure136 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'day.calendar.date', $renderingContext);
};

$output134 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments135, $renderChildrenClosure136, $renderingContext);

$output134 .= '
									';
return $output134;
};

$output122 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments132, $renderChildrenClosure133, $renderingContext);

$output122 .= '
								';
return $output122;
};
$arguments120['__thenClosure'] = function() use ($renderingContext, $self) {
$output137 = '';

$output137 .= '
										';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Link\DayViewHelper
$arguments138 = array();
$arguments138['pageUid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dayPid', $renderingContext);
$arguments138['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'day.calendar.date', $renderingContext);
$arguments138['additionalAttributes'] = NULL;
$arguments138['data'] = NULL;
$arguments138['class'] = NULL;
$arguments138['dir'] = NULL;
$arguments138['id'] = NULL;
$arguments138['lang'] = NULL;
$arguments138['style'] = NULL;
$arguments138['title'] = NULL;
$arguments138['accesskey'] = NULL;
$arguments138['tabindex'] = NULL;
$arguments138['onclick'] = NULL;
$arguments138['target'] = NULL;
$arguments138['rel'] = NULL;
$renderChildrenClosure139 = function() use ($renderingContext, $self) {
$output140 = '';

$output140 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments141 = array();
$arguments141['format'] = 'd';
$arguments141['date'] = NULL;
$renderChildrenClosure142 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'day.calendar.date', $renderingContext);
};

$output140 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments141, $renderChildrenClosure142, $renderingContext);

$output140 .= '
										';
return $output140;
};
$viewHelper143 = $self->getViewHelper('$viewHelper143', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Link\DayViewHelper');
$viewHelper143->setArguments($arguments138);
$viewHelper143->setRenderingContext($renderingContext);
$viewHelper143->setRenderChildrenClosure($renderChildrenClosure139);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Link\DayViewHelper

$output137 .= $viewHelper143->initializeArgumentsAndRender();

$output137 .= '
									';
return $output137;
};
$arguments120['__elseClosure'] = function() use ($renderingContext, $self) {
$output144 = '';

$output144 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments145 = array();
$arguments145['format'] = 'd';
$arguments145['date'] = NULL;
$renderChildrenClosure146 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'day.calendar.date', $renderingContext);
};

$output144 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments145, $renderChildrenClosure146, $renderingContext);

$output144 .= '
									';
return $output144;
};
$viewHelper147 = $self->getViewHelper('$viewHelper147', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper147->setArguments($arguments120);
$viewHelper147->setRenderingContext($renderingContext);
$viewHelper147->setRenderChildrenClosure($renderChildrenClosure121);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output119 .= $viewHelper147->initializeArgumentsAndRender();

$output119 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments148 = array();
// Rendering Boolean node
$arguments148['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.detailPid', $renderingContext));
$arguments148['then'] = NULL;
$arguments148['else'] = NULL;
$renderChildrenClosure149 = function() use ($renderingContext, $self) {
$output150 = '';

$output150 .= '
									<ul class="events">
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments151 = array();
$arguments151['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'indices', $renderingContext);
$arguments151['as'] = 'index';
$arguments151['key'] = '';
$arguments151['reverse'] = false;
$arguments151['iteration'] = NULL;
$renderChildrenClosure152 = function() use ($renderingContext, $self) {
$output153 = '';

$output153 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments154 = array();
// Rendering Boolean node
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\IndexOnDayViewHelper
$arguments155 = array();
$arguments155['index'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index', $renderingContext);
$arguments155['day'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'day.calendar.date', $renderingContext);
$arguments155['indices'] = array (
);
$renderChildrenClosure156 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper157 = $self->getViewHelper('$viewHelper157', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\IndexOnDayViewHelper');
$viewHelper157->setArguments($arguments155);
$viewHelper157->setRenderingContext($renderingContext);
$viewHelper157->setRenderChildrenClosure($renderChildrenClosure156);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\IndexOnDayViewHelper
$arguments154['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean($viewHelper157->initializeArgumentsAndRender());
$arguments154['then'] = NULL;
$arguments154['else'] = NULL;
$renderChildrenClosure158 = function() use ($renderingContext, $self) {
$output159 = '';

$output159 .= '
												<li>
													';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Link\IndexViewHelper
$arguments160 = array();
$arguments160['index'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index', $renderingContext);
$arguments160['pageUid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.detailPid', $renderingContext);
$arguments160['additionalAttributes'] = NULL;
$arguments160['data'] = NULL;
$arguments160['class'] = NULL;
$arguments160['dir'] = NULL;
$arguments160['id'] = NULL;
$arguments160['lang'] = NULL;
$arguments160['style'] = NULL;
$arguments160['title'] = NULL;
$arguments160['accesskey'] = NULL;
$arguments160['tabindex'] = NULL;
$arguments160['onclick'] = NULL;
$arguments160['target'] = NULL;
$arguments160['rel'] = NULL;
$renderChildrenClosure161 = function() use ($renderingContext, $self) {
$output162 = '';

$output162 .= '
														';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments163 = array();
$output164 = '';

$output164 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index.configuration.partialIdentifier', $renderingContext);

$output164 .= '/Title';
$arguments163['partial'] = $output164;
// Rendering Array
$array165 = array();
$array165['index'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'index', $renderingContext);
$arguments163['arguments'] = $array165;
$arguments163['section'] = NULL;
$arguments163['optional'] = false;
$renderChildrenClosure166 = function() use ($renderingContext, $self) {
return NULL;
};

$output162 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments163, $renderChildrenClosure166, $renderingContext);

$output162 .= '
													';
return $output162;
};
$viewHelper167 = $self->getViewHelper('$viewHelper167', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Link\IndexViewHelper');
$viewHelper167->setArguments($arguments160);
$viewHelper167->setRenderingContext($renderingContext);
$viewHelper167->setRenderChildrenClosure($renderChildrenClosure161);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Link\IndexViewHelper

$output159 .= $viewHelper167->initializeArgumentsAndRender();

$output159 .= '
												</li>
											';
return $output159;
};
$viewHelper168 = $self->getViewHelper('$viewHelper168', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper168->setArguments($arguments154);
$viewHelper168->setRenderingContext($renderingContext);
$viewHelper168->setRenderChildrenClosure($renderChildrenClosure158);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output153 .= $viewHelper168->initializeArgumentsAndRender();

$output153 .= '
										';
return $output153;
};

$output150 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments151, $renderChildrenClosure152, $renderingContext);

$output150 .= '
									</ul>
								';
return $output150;
};
$viewHelper169 = $self->getViewHelper('$viewHelper169', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper169->setArguments($arguments148);
$viewHelper169->setRenderingContext($renderingContext);
$viewHelper169->setRenderChildrenClosure($renderChildrenClosure149);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output119 .= $viewHelper169->initializeArgumentsAndRender();

$output119 .= '
							</td>
						';
return $output119;
};
$arguments55['__elseClosure'] = function() use ($renderingContext, $self) {
$output170 = '';

$output170 .= '
							<td>
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments171 = array();
$arguments171['format'] = 'd';
$arguments171['date'] = NULL;
$renderChildrenClosure172 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'day.calendar.date', $renderingContext);
};

$output170 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments171, $renderChildrenClosure172, $renderingContext);

$output170 .= '
							</td>
						';
return $output170;
};
$viewHelper173 = $self->getViewHelper('$viewHelper173', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper173->setArguments($arguments55);
$viewHelper173->setRenderingContext($renderingContext);
$viewHelper173->setRenderChildrenClosure($renderChildrenClosure59);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output54 .= $viewHelper173->initializeArgumentsAndRender();

$output54 .= '
				';
return $output54;
};
$viewHelper174 = $self->getViewHelper('$viewHelper174', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Loop\DaysInWeekViewHelper');
$viewHelper174->setArguments($arguments52);
$viewHelper174->setRenderingContext($renderingContext);
$viewHelper174->setRenderChildrenClosure($renderChildrenClosure53);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Loop\DaysInWeekViewHelper

$output51 .= $viewHelper174->initializeArgumentsAndRender();

$output51 .= '
			</tr>
		';
return $output51;
};
$viewHelper175 = $self->getViewHelper('$viewHelper175', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Loop\WeeksInMonthViewHelper');
$viewHelper175->setArguments($arguments49);
$viewHelper175->setRenderingContext($renderingContext);
$viewHelper175->setRenderChildrenClosure($renderChildrenClosure50);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Loop\WeeksInMonthViewHelper

$output0 .= $viewHelper175->initializeArgumentsAndRender();

$output0 .= '
	</tbody>
</table>';

return $output0;
}


}
#1434487043    48306     