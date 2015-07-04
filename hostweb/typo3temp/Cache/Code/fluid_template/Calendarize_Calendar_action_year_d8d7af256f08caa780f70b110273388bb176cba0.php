<?php
class FluidCache_Calendarize_Calendar_action_year_d8d7af256f08caa780f70b110273388bb176cba0 extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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

	<table class="table table-bordered">
		<thead>
			<tr>
				<td colspan="4">

					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments1 = array();
// Rendering Boolean node
$arguments1['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.yearPid', $renderingContext));
$arguments1['then'] = NULL;
$arguments1['else'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$output3 = '';

$output3 .= '
						';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments4 = array();
$arguments4['modification'] = '-1 year';
$arguments4['dateTime'] = NULL;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments6 = array();
$arguments6['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
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
$arguments10['check'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments10['then'] = NULL;
$arguments10['else'] = NULL;
$renderChildrenClosure11 = function() use ($renderingContext, $self) {
$output12 = '';

$output12 .= '
							';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Link\YearViewHelper
$arguments13 = array();
$arguments13['pageUid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.yearPid', $renderingContext);
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
$viewHelper15 = $self->getViewHelper('$viewHelper15', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Link\YearViewHelper');
$viewHelper15->setArguments($arguments13);
$viewHelper15->setRenderingContext($renderingContext);
$viewHelper15->setRenderChildrenClosure($renderChildrenClosure14);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Link\YearViewHelper

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
$arguments17['modification'] = '+1 year';
$arguments17['dateTime'] = NULL;
$renderChildrenClosure18 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments19 = array();
$arguments19['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
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
$arguments24['format'] = 'Y';
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
$arguments26['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.yearPid', $renderingContext));
$arguments26['then'] = NULL;
$arguments26['else'] = NULL;
$renderChildrenClosure27 = function() use ($renderingContext, $self) {
$output28 = '';

$output28 .= '
						';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments29 = array();
$arguments29['modification'] = '+1 year';
$arguments29['dateTime'] = NULL;
$renderChildrenClosure30 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments31 = array();
$arguments31['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments31['keepQuotes'] = false;
$arguments31['encoding'] = NULL;
$arguments31['doubleEncode'] = true;
$renderChildrenClosure32 = function() use ($renderingContext, $self) {
return NULL;
};
$value33 = ($arguments31['value'] !== NULL ? $arguments31['value'] : $renderChildrenClosure32());
return (!is_string($value33) ? $value33 : htmlspecialchars($value33, ($arguments31['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments31['encoding'] !== NULL ? $arguments31['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments31['doubleEncode']));
};
$viewHelper34 = $self->getViewHelper('$viewHelper34', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper');
$viewHelper34->setArguments($arguments29);
$viewHelper34->setRenderingContext($renderingContext);
$viewHelper34->setRenderChildrenClosure($renderChildrenClosure30);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper

$output28 .= $viewHelper34->initializeArgumentsAndRender();

$output28 .= '
						';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper
$arguments35 = array();
$arguments35['base'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateLimitBrowserNext', $renderingContext);
$arguments35['check'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments35['then'] = NULL;
$arguments35['else'] = NULL;
$renderChildrenClosure36 = function() use ($renderingContext, $self) {
$output37 = '';

$output37 .= '
							';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Link\YearViewHelper
$arguments38 = array();
$arguments38['pageUid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.yearPid', $renderingContext);
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
$viewHelper40 = $self->getViewHelper('$viewHelper40', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Link\YearViewHelper');
$viewHelper40->setArguments($arguments38);
$viewHelper40->setRenderingContext($renderingContext);
$viewHelper40->setRenderChildrenClosure($renderChildrenClosure39);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Link\YearViewHelper

$output37 .= $viewHelper40->initializeArgumentsAndRender();

$output37 .= '
						';
return $output37;
};
$viewHelper41 = $self->getViewHelper('$viewHelper41', $renderingContext, 'HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper');
$viewHelper41->setArguments($arguments35);
$viewHelper41->setRenderingContext($renderingContext);
$viewHelper41->setRenderChildrenClosure($renderChildrenClosure36);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper

$output28 .= $viewHelper41->initializeArgumentsAndRender();

$output28 .= '
						';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments42 = array();
$arguments42['modification'] = '-1 year';
$arguments42['dateTime'] = NULL;
$renderChildrenClosure43 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments44 = array();
$arguments44['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments44['keepQuotes'] = false;
$arguments44['encoding'] = NULL;
$arguments44['doubleEncode'] = true;
$renderChildrenClosure45 = function() use ($renderingContext, $self) {
return NULL;
};
$value46 = ($arguments44['value'] !== NULL ? $arguments44['value'] : $renderChildrenClosure45());
return (!is_string($value46) ? $value46 : htmlspecialchars($value46, ($arguments44['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments44['encoding'] !== NULL ? $arguments44['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments44['doubleEncode']));
};
$viewHelper47 = $self->getViewHelper('$viewHelper47', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper');
$viewHelper47->setArguments($arguments42);
$viewHelper47->setRenderingContext($renderingContext);
$viewHelper47->setRenderChildrenClosure($renderChildrenClosure43);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper

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
			<tr>
				';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Loop\MonthsInYearViewHelper
$arguments49 = array();
$arguments49['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments49['iteration'] = 'year';
$renderChildrenClosure50 = function() use ($renderingContext, $self) {
$output51 = '';

$output51 .= '
					<td>

						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CommentViewHelper
$arguments52 = array();
$renderChildrenClosure53 = function() use ($renderingContext, $self) {
$output54 = '';

$output54 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments55 = array();
$arguments55['partial'] = 'Month';
// Rendering Array
$array56 = array();
$array56['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'year.calendar.date', $renderingContext);
$arguments55['arguments'] = $array56;
$arguments55['section'] = NULL;
$arguments55['optional'] = false;
$renderChildrenClosure57 = function() use ($renderingContext, $self) {
return NULL;
};

$output54 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments55, $renderChildrenClosure57, $renderingContext);

$output54 .= '
						';
return $output54;
};

$output51 .= '';

$output51 .= '

						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments58 = array();
$arguments58['partial'] = 'Month';
// Rendering Array
$array59 = array();
$array59['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'year.calendar.date', $renderingContext);
$arguments58['arguments'] = $array59;
$arguments58['section'] = NULL;
$arguments58['optional'] = false;
$renderChildrenClosure60 = function() use ($renderingContext, $self) {
return NULL;
};

$output51 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments58, $renderChildrenClosure60, $renderingContext);

$output51 .= '

					</td>

					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments61 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments62 = array();
$arguments62['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'year.calendar.break4', $renderingContext);
$arguments62['keepQuotes'] = false;
$arguments62['encoding'] = NULL;
$arguments62['doubleEncode'] = true;
$renderChildrenClosure63 = function() use ($renderingContext, $self) {
return NULL;
};
$value64 = ($arguments62['value'] !== NULL ? $arguments62['value'] : $renderChildrenClosure63());
$arguments61['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', (!is_string($value64) ? $value64 : htmlspecialchars($value64, ($arguments62['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments62['encoding'] !== NULL ? $arguments62['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments62['doubleEncode'])), 0);
$arguments61['then'] = '</tr><tr>';
$arguments61['else'] = NULL;
$renderChildrenClosure65 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper66 = $self->getViewHelper('$viewHelper66', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper66->setArguments($arguments61);
$viewHelper66->setRenderingContext($renderingContext);
$viewHelper66->setRenderChildrenClosure($renderChildrenClosure65);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output51 .= $viewHelper66->initializeArgumentsAndRender();

$output51 .= '
				';
return $output51;
};
$viewHelper67 = $self->getViewHelper('$viewHelper67', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Loop\MonthsInYearViewHelper');
$viewHelper67->setArguments($arguments49);
$viewHelper67->setRenderingContext($renderingContext);
$viewHelper67->setRenderChildrenClosure($renderChildrenClosure50);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Loop\MonthsInYearViewHelper

$output0 .= $viewHelper67->initializeArgumentsAndRender();

$output0 .= '
			</tr>
		</tbody>
	</table>
';

return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output68 = '';

$output68 .= '
';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper
$arguments69 = array();
$arguments69['name'] = 'Default';
$renderChildrenClosure70 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper71 = $self->getViewHelper('$viewHelper71', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper71->setArguments($arguments69);
$viewHelper71->setRenderingContext($renderingContext);
$viewHelper71->setRenderChildrenClosure($renderChildrenClosure70);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper

$output68 .= $viewHelper71->initializeArgumentsAndRender();

$output68 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments72 = array();
$arguments72['name'] = 'Main';
$renderChildrenClosure73 = function() use ($renderingContext, $self) {
$output74 = '';

$output74 .= '

	<table class="table table-bordered">
		<thead>
			<tr>
				<td colspan="4">

					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments75 = array();
// Rendering Boolean node
$arguments75['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.yearPid', $renderingContext));
$arguments75['then'] = NULL;
$arguments75['else'] = NULL;
$renderChildrenClosure76 = function() use ($renderingContext, $self) {
$output77 = '';

$output77 .= '
						';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments78 = array();
$arguments78['modification'] = '-1 year';
$arguments78['dateTime'] = NULL;
$renderChildrenClosure79 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments80 = array();
$arguments80['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments80['keepQuotes'] = false;
$arguments80['encoding'] = NULL;
$arguments80['doubleEncode'] = true;
$renderChildrenClosure81 = function() use ($renderingContext, $self) {
return NULL;
};
$value82 = ($arguments80['value'] !== NULL ? $arguments80['value'] : $renderChildrenClosure81());
return (!is_string($value82) ? $value82 : htmlspecialchars($value82, ($arguments80['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments80['encoding'] !== NULL ? $arguments80['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments80['doubleEncode']));
};
$viewHelper83 = $self->getViewHelper('$viewHelper83', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper');
$viewHelper83->setArguments($arguments78);
$viewHelper83->setRenderingContext($renderingContext);
$viewHelper83->setRenderChildrenClosure($renderChildrenClosure79);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper

$output77 .= $viewHelper83->initializeArgumentsAndRender();

$output77 .= '
						';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\IfDateUpperViewHelper
$arguments84 = array();
$arguments84['base'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateLimitBrowserPrev', $renderingContext);
$arguments84['check'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments84['then'] = NULL;
$arguments84['else'] = NULL;
$renderChildrenClosure85 = function() use ($renderingContext, $self) {
$output86 = '';

$output86 .= '
							';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Link\YearViewHelper
$arguments87 = array();
$arguments87['pageUid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.yearPid', $renderingContext);
$arguments87['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments87['additionalAttributes'] = NULL;
$arguments87['data'] = NULL;
$arguments87['class'] = NULL;
$arguments87['dir'] = NULL;
$arguments87['id'] = NULL;
$arguments87['lang'] = NULL;
$arguments87['style'] = NULL;
$arguments87['title'] = NULL;
$arguments87['accesskey'] = NULL;
$arguments87['tabindex'] = NULL;
$arguments87['onclick'] = NULL;
$arguments87['target'] = NULL;
$arguments87['rel'] = NULL;
$renderChildrenClosure88 = function() use ($renderingContext, $self) {
return '
								&lt;
							';
};
$viewHelper89 = $self->getViewHelper('$viewHelper89', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Link\YearViewHelper');
$viewHelper89->setArguments($arguments87);
$viewHelper89->setRenderingContext($renderingContext);
$viewHelper89->setRenderChildrenClosure($renderChildrenClosure88);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Link\YearViewHelper

$output86 .= $viewHelper89->initializeArgumentsAndRender();

$output86 .= '
						';
return $output86;
};
$viewHelper90 = $self->getViewHelper('$viewHelper90', $renderingContext, 'HDNET\Calendarize\ViewHelpers\IfDateUpperViewHelper');
$viewHelper90->setArguments($arguments84);
$viewHelper90->setRenderingContext($renderingContext);
$viewHelper90->setRenderChildrenClosure($renderChildrenClosure85);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\IfDateUpperViewHelper

$output77 .= $viewHelper90->initializeArgumentsAndRender();

$output77 .= '
						';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments91 = array();
$arguments91['modification'] = '+1 year';
$arguments91['dateTime'] = NULL;
$renderChildrenClosure92 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments93 = array();
$arguments93['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments93['keepQuotes'] = false;
$arguments93['encoding'] = NULL;
$arguments93['doubleEncode'] = true;
$renderChildrenClosure94 = function() use ($renderingContext, $self) {
return NULL;
};
$value95 = ($arguments93['value'] !== NULL ? $arguments93['value'] : $renderChildrenClosure94());
return (!is_string($value95) ? $value95 : htmlspecialchars($value95, ($arguments93['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments93['encoding'] !== NULL ? $arguments93['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments93['doubleEncode']));
};
$viewHelper96 = $self->getViewHelper('$viewHelper96', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper');
$viewHelper96->setArguments($arguments91);
$viewHelper96->setRenderingContext($renderingContext);
$viewHelper96->setRenderChildrenClosure($renderChildrenClosure92);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper

$output77 .= $viewHelper96->initializeArgumentsAndRender();

$output77 .= '
					';
return $output77;
};
$viewHelper97 = $self->getViewHelper('$viewHelper97', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper97->setArguments($arguments75);
$viewHelper97->setRenderingContext($renderingContext);
$viewHelper97->setRenderChildrenClosure($renderChildrenClosure76);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output74 .= $viewHelper97->initializeArgumentsAndRender();

$output74 .= '

					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments98 = array();
$arguments98['format'] = 'Y';
$arguments98['date'] = NULL;
$renderChildrenClosure99 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
};

$output74 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments98, $renderChildrenClosure99, $renderingContext);

$output74 .= '

					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments100 = array();
// Rendering Boolean node
$arguments100['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.yearPid', $renderingContext));
$arguments100['then'] = NULL;
$arguments100['else'] = NULL;
$renderChildrenClosure101 = function() use ($renderingContext, $self) {
$output102 = '';

$output102 .= '
						';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments103 = array();
$arguments103['modification'] = '+1 year';
$arguments103['dateTime'] = NULL;
$renderChildrenClosure104 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments105 = array();
$arguments105['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments105['keepQuotes'] = false;
$arguments105['encoding'] = NULL;
$arguments105['doubleEncode'] = true;
$renderChildrenClosure106 = function() use ($renderingContext, $self) {
return NULL;
};
$value107 = ($arguments105['value'] !== NULL ? $arguments105['value'] : $renderChildrenClosure106());
return (!is_string($value107) ? $value107 : htmlspecialchars($value107, ($arguments105['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments105['encoding'] !== NULL ? $arguments105['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments105['doubleEncode']));
};
$viewHelper108 = $self->getViewHelper('$viewHelper108', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper');
$viewHelper108->setArguments($arguments103);
$viewHelper108->setRenderingContext($renderingContext);
$viewHelper108->setRenderChildrenClosure($renderChildrenClosure104);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper

$output102 .= $viewHelper108->initializeArgumentsAndRender();

$output102 .= '
						';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper
$arguments109 = array();
$arguments109['base'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.dateLimitBrowserNext', $renderingContext);
$arguments109['check'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments109['then'] = NULL;
$arguments109['else'] = NULL;
$renderChildrenClosure110 = function() use ($renderingContext, $self) {
$output111 = '';

$output111 .= '
							';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Link\YearViewHelper
$arguments112 = array();
$arguments112['pageUid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.yearPid', $renderingContext);
$arguments112['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments112['additionalAttributes'] = NULL;
$arguments112['data'] = NULL;
$arguments112['class'] = NULL;
$arguments112['dir'] = NULL;
$arguments112['id'] = NULL;
$arguments112['lang'] = NULL;
$arguments112['style'] = NULL;
$arguments112['title'] = NULL;
$arguments112['accesskey'] = NULL;
$arguments112['tabindex'] = NULL;
$arguments112['onclick'] = NULL;
$arguments112['target'] = NULL;
$arguments112['rel'] = NULL;
$renderChildrenClosure113 = function() use ($renderingContext, $self) {
return '
								&gt;
							';
};
$viewHelper114 = $self->getViewHelper('$viewHelper114', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Link\YearViewHelper');
$viewHelper114->setArguments($arguments112);
$viewHelper114->setRenderingContext($renderingContext);
$viewHelper114->setRenderChildrenClosure($renderChildrenClosure113);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Link\YearViewHelper

$output111 .= $viewHelper114->initializeArgumentsAndRender();

$output111 .= '
						';
return $output111;
};
$viewHelper115 = $self->getViewHelper('$viewHelper115', $renderingContext, 'HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper');
$viewHelper115->setArguments($arguments109);
$viewHelper115->setRenderingContext($renderingContext);
$viewHelper115->setRenderChildrenClosure($renderChildrenClosure110);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\IfDateLowerViewHelper

$output102 .= $viewHelper115->initializeArgumentsAndRender();

$output102 .= '
						';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper
$arguments116 = array();
$arguments116['modification'] = '-1 year';
$arguments116['dateTime'] = NULL;
$renderChildrenClosure117 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments118 = array();
$arguments118['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments118['keepQuotes'] = false;
$arguments118['encoding'] = NULL;
$arguments118['doubleEncode'] = true;
$renderChildrenClosure119 = function() use ($renderingContext, $self) {
return NULL;
};
$value120 = ($arguments118['value'] !== NULL ? $arguments118['value'] : $renderChildrenClosure119());
return (!is_string($value120) ? $value120 : htmlspecialchars($value120, ($arguments118['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments118['encoding'] !== NULL ? $arguments118['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments118['doubleEncode']));
};
$viewHelper121 = $self->getViewHelper('$viewHelper121', $renderingContext, 'HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper');
$viewHelper121->setArguments($arguments116);
$viewHelper121->setRenderingContext($renderingContext);
$viewHelper121->setRenderChildrenClosure($renderChildrenClosure117);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\DateTime\ModifyViewHelper

$output102 .= $viewHelper121->initializeArgumentsAndRender();

$output102 .= '
					';
return $output102;
};
$viewHelper122 = $self->getViewHelper('$viewHelper122', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper122->setArguments($arguments100);
$viewHelper122->setRenderingContext($renderingContext);
$viewHelper122->setRenderChildrenClosure($renderChildrenClosure101);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output74 .= $viewHelper122->initializeArgumentsAndRender();

$output74 .= '
				</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				';
// Rendering ViewHelper HDNET\Calendarize\ViewHelpers\Loop\MonthsInYearViewHelper
$arguments123 = array();
$arguments123['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'date', $renderingContext);
$arguments123['iteration'] = 'year';
$renderChildrenClosure124 = function() use ($renderingContext, $self) {
$output125 = '';

$output125 .= '
					<td>

						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CommentViewHelper
$arguments126 = array();
$renderChildrenClosure127 = function() use ($renderingContext, $self) {
$output128 = '';

$output128 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments129 = array();
$arguments129['partial'] = 'Month';
// Rendering Array
$array130 = array();
$array130['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'year.calendar.date', $renderingContext);
$arguments129['arguments'] = $array130;
$arguments129['section'] = NULL;
$arguments129['optional'] = false;
$renderChildrenClosure131 = function() use ($renderingContext, $self) {
return NULL;
};

$output128 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments129, $renderChildrenClosure131, $renderingContext);

$output128 .= '
						';
return $output128;
};

$output125 .= '';

$output125 .= '

						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments132 = array();
$arguments132['partial'] = 'Month';
// Rendering Array
$array133 = array();
$array133['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'year.calendar.date', $renderingContext);
$arguments132['arguments'] = $array133;
$arguments132['section'] = NULL;
$arguments132['optional'] = false;
$renderChildrenClosure134 = function() use ($renderingContext, $self) {
return NULL;
};

$output125 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments132, $renderChildrenClosure134, $renderingContext);

$output125 .= '

					</td>

					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments135 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments136 = array();
$arguments136['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'year.calendar.break4', $renderingContext);
$arguments136['keepQuotes'] = false;
$arguments136['encoding'] = NULL;
$arguments136['doubleEncode'] = true;
$renderChildrenClosure137 = function() use ($renderingContext, $self) {
return NULL;
};
$value138 = ($arguments136['value'] !== NULL ? $arguments136['value'] : $renderChildrenClosure137());
$arguments135['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', (!is_string($value138) ? $value138 : htmlspecialchars($value138, ($arguments136['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments136['encoding'] !== NULL ? $arguments136['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments136['doubleEncode'])), 0);
$arguments135['then'] = '</tr><tr>';
$arguments135['else'] = NULL;
$renderChildrenClosure139 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper140 = $self->getViewHelper('$viewHelper140', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper140->setArguments($arguments135);
$viewHelper140->setRenderingContext($renderingContext);
$viewHelper140->setRenderChildrenClosure($renderChildrenClosure139);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output125 .= $viewHelper140->initializeArgumentsAndRender();

$output125 .= '
				';
return $output125;
};
$viewHelper141 = $self->getViewHelper('$viewHelper141', $renderingContext, 'HDNET\Calendarize\ViewHelpers\Loop\MonthsInYearViewHelper');
$viewHelper141->setArguments($arguments123);
$viewHelper141->setRenderingContext($renderingContext);
$viewHelper141->setRenderChildrenClosure($renderChildrenClosure124);
// End of ViewHelper HDNET\Calendarize\ViewHelpers\Loop\MonthsInYearViewHelper

$output74 .= $viewHelper141->initializeArgumentsAndRender();

$output74 .= '
			</tr>
		</tbody>
	</table>
';
return $output74;
};

$output68 .= '';

return $output68;
}


}
#1435266040    39048     