<?php
class FluidCache_Fluid_ViewHelpers_Be_Widget_Paginate_action_index_b12ffe7fd54109dd4a4be25dc7c0aef3200aea40 extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
 * section paginator
 */
public function section_31b8d545b1939b065e8931304bab52b99d8b4567(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= '
	<nav class="pagination-wrap">
		<ul class="pagination pagination-block">
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments1 = array();
// Rendering Boolean node
$arguments1['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.hasLessPages', $renderingContext));
$arguments1['then'] = NULL;
$arguments1['else'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$output3 = '';

$output3 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments4 = array();
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
$output6 = '';

$output6 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments7 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments8 = array();
// Rendering Array
$array9 = array();
$array9['currentPage'] = 1;
$arguments8['arguments'] = $array9;
$arguments8['action'] = NULL;
$arguments8['section'] = '';
$arguments8['format'] = '';
$arguments8['ajax'] = false;
$arguments8['addQueryStringMethod'] = NULL;
$renderChildrenClosure10 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper11 = $self->getViewHelper('$viewHelper11', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper11->setArguments($arguments8);
$viewHelper11->setRenderingContext($renderingContext);
$viewHelper11->setRenderChildrenClosure($renderChildrenClosure10);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments7['uri'] = $viewHelper11->initializeArgumentsAndRender();
$arguments7['icon'] = 'actions-view-paging-first';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments12 = array();
$arguments12['key'] = 'widget.pagination.first';
$arguments12['id'] = NULL;
$arguments12['default'] = NULL;
$arguments12['htmlEscape'] = NULL;
$arguments12['arguments'] = NULL;
$arguments12['extensionName'] = NULL;
$renderChildrenClosure13 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments7['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments12, $renderChildrenClosure13, $renderingContext);
$arguments7['additionalAttributes'] = NULL;
$renderChildrenClosure14 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper15 = $self->getViewHelper('$viewHelper15', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper15->setArguments($arguments7);
$viewHelper15->setRenderingContext($renderingContext);
$viewHelper15->setRenderChildrenClosure($renderChildrenClosure14);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output6 .= $viewHelper15->initializeArgumentsAndRender();

$output6 .= '
					</li>
					<li>
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments16 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments17 = array();
// Rendering Array
$array18 = array();
$array18['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.previousPage', $renderingContext);
$arguments17['arguments'] = $array18;
$arguments17['action'] = NULL;
$arguments17['section'] = '';
$arguments17['format'] = '';
$arguments17['ajax'] = false;
$arguments17['addQueryStringMethod'] = NULL;
$renderChildrenClosure19 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper20 = $self->getViewHelper('$viewHelper20', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper20->setArguments($arguments17);
$viewHelper20->setRenderingContext($renderingContext);
$viewHelper20->setRenderChildrenClosure($renderChildrenClosure19);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments16['uri'] = $viewHelper20->initializeArgumentsAndRender();
$arguments16['icon'] = 'actions-view-paging-previous';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments21 = array();
$arguments21['key'] = 'widget.pagination.previous';
$arguments21['id'] = NULL;
$arguments21['default'] = NULL;
$arguments21['htmlEscape'] = NULL;
$arguments21['arguments'] = NULL;
$arguments21['extensionName'] = NULL;
$renderChildrenClosure22 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments16['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments21, $renderChildrenClosure22, $renderingContext);
$arguments16['additionalAttributes'] = NULL;
$renderChildrenClosure23 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper24 = $self->getViewHelper('$viewHelper24', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper24->setArguments($arguments16);
$viewHelper24->setRenderingContext($renderingContext);
$viewHelper24->setRenderChildrenClosure($renderChildrenClosure23);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output6 .= $viewHelper24->initializeArgumentsAndRender();

$output6 .= '
					</li>
				';
return $output6;
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments4, $renderChildrenClosure5, $renderingContext);

$output3 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments25 = array();
$renderChildrenClosure26 = function() use ($renderingContext, $self) {
$output27 = '';

$output27 .= '
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments28 = array();
$arguments28['uri'] = '';
$arguments28['icon'] = 'actions-view-paging-first';
$arguments28['title'] = '';
$arguments28['additionalAttributes'] = NULL;
$renderChildrenClosure29 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper30 = $self->getViewHelper('$viewHelper30', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper30->setArguments($arguments28);
$viewHelper30->setRenderingContext($renderingContext);
$viewHelper30->setRenderChildrenClosure($renderChildrenClosure29);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output27 .= $viewHelper30->initializeArgumentsAndRender();

$output27 .= '
						</span>
					</li>
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments31 = array();
$arguments31['uri'] = '';
$arguments31['icon'] = 'actions-view-paging-previous';
$arguments31['title'] = '';
$arguments31['additionalAttributes'] = NULL;
$renderChildrenClosure32 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper33 = $self->getViewHelper('$viewHelper33', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper33->setArguments($arguments31);
$viewHelper33->setRenderingContext($renderingContext);
$viewHelper33->setRenderChildrenClosure($renderChildrenClosure32);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output27 .= $viewHelper33->initializeArgumentsAndRender();

$output27 .= '
						</span>
					</li>
				';
return $output27;
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments25, $renderChildrenClosure26, $renderingContext);

$output3 .= '
			';
return $output3;
};
$arguments1['__thenClosure'] = function() use ($renderingContext, $self) {
$output34 = '';

$output34 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments35 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments36 = array();
// Rendering Array
$array37 = array();
$array37['currentPage'] = 1;
$arguments36['arguments'] = $array37;
$arguments36['action'] = NULL;
$arguments36['section'] = '';
$arguments36['format'] = '';
$arguments36['ajax'] = false;
$arguments36['addQueryStringMethod'] = NULL;
$renderChildrenClosure38 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper39 = $self->getViewHelper('$viewHelper39', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper39->setArguments($arguments36);
$viewHelper39->setRenderingContext($renderingContext);
$viewHelper39->setRenderChildrenClosure($renderChildrenClosure38);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments35['uri'] = $viewHelper39->initializeArgumentsAndRender();
$arguments35['icon'] = 'actions-view-paging-first';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments40 = array();
$arguments40['key'] = 'widget.pagination.first';
$arguments40['id'] = NULL;
$arguments40['default'] = NULL;
$arguments40['htmlEscape'] = NULL;
$arguments40['arguments'] = NULL;
$arguments40['extensionName'] = NULL;
$renderChildrenClosure41 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments35['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments40, $renderChildrenClosure41, $renderingContext);
$arguments35['additionalAttributes'] = NULL;
$renderChildrenClosure42 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper43 = $self->getViewHelper('$viewHelper43', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper43->setArguments($arguments35);
$viewHelper43->setRenderingContext($renderingContext);
$viewHelper43->setRenderChildrenClosure($renderChildrenClosure42);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output34 .= $viewHelper43->initializeArgumentsAndRender();

$output34 .= '
					</li>
					<li>
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments44 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments45 = array();
// Rendering Array
$array46 = array();
$array46['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.previousPage', $renderingContext);
$arguments45['arguments'] = $array46;
$arguments45['action'] = NULL;
$arguments45['section'] = '';
$arguments45['format'] = '';
$arguments45['ajax'] = false;
$arguments45['addQueryStringMethod'] = NULL;
$renderChildrenClosure47 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper48 = $self->getViewHelper('$viewHelper48', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper48->setArguments($arguments45);
$viewHelper48->setRenderingContext($renderingContext);
$viewHelper48->setRenderChildrenClosure($renderChildrenClosure47);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments44['uri'] = $viewHelper48->initializeArgumentsAndRender();
$arguments44['icon'] = 'actions-view-paging-previous';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments49 = array();
$arguments49['key'] = 'widget.pagination.previous';
$arguments49['id'] = NULL;
$arguments49['default'] = NULL;
$arguments49['htmlEscape'] = NULL;
$arguments49['arguments'] = NULL;
$arguments49['extensionName'] = NULL;
$renderChildrenClosure50 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments44['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments49, $renderChildrenClosure50, $renderingContext);
$arguments44['additionalAttributes'] = NULL;
$renderChildrenClosure51 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper52 = $self->getViewHelper('$viewHelper52', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper52->setArguments($arguments44);
$viewHelper52->setRenderingContext($renderingContext);
$viewHelper52->setRenderChildrenClosure($renderChildrenClosure51);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output34 .= $viewHelper52->initializeArgumentsAndRender();

$output34 .= '
					</li>
				';
return $output34;
};
$arguments1['__elseClosure'] = function() use ($renderingContext, $self) {
$output53 = '';

$output53 .= '
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments54 = array();
$arguments54['uri'] = '';
$arguments54['icon'] = 'actions-view-paging-first';
$arguments54['title'] = '';
$arguments54['additionalAttributes'] = NULL;
$renderChildrenClosure55 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper56 = $self->getViewHelper('$viewHelper56', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper56->setArguments($arguments54);
$viewHelper56->setRenderingContext($renderingContext);
$viewHelper56->setRenderChildrenClosure($renderChildrenClosure55);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output53 .= $viewHelper56->initializeArgumentsAndRender();

$output53 .= '
						</span>
					</li>
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments57 = array();
$arguments57['uri'] = '';
$arguments57['icon'] = 'actions-view-paging-previous';
$arguments57['title'] = '';
$arguments57['additionalAttributes'] = NULL;
$renderChildrenClosure58 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper59 = $self->getViewHelper('$viewHelper59', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper59->setArguments($arguments57);
$viewHelper59->setRenderingContext($renderingContext);
$viewHelper59->setRenderChildrenClosure($renderChildrenClosure58);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output53 .= $viewHelper59->initializeArgumentsAndRender();

$output53 .= '
						</span>
					</li>
				';
return $output53;
};
$viewHelper60 = $self->getViewHelper('$viewHelper60', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper60->setArguments($arguments1);
$viewHelper60->setRenderingContext($renderingContext);
$viewHelper60->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper60->initializeArgumentsAndRender();

$output0 .= '
			<li>
				<span>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments61 = array();
// Rendering Boolean node
$arguments61['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'recordsLabel', $renderingContext));
$arguments61['then'] = NULL;
$arguments61['else'] = NULL;
$renderChildrenClosure62 = function() use ($renderingContext, $self) {
$output63 = '';

$output63 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments64 = array();
$renderChildrenClosure65 = function() use ($renderingContext, $self) {
$output66 = '';

$output66 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments67 = array();
$arguments67['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'recordsLabel', $renderingContext);
$arguments67['keepQuotes'] = false;
$arguments67['encoding'] = NULL;
$arguments67['doubleEncode'] = true;
$renderChildrenClosure68 = function() use ($renderingContext, $self) {
return NULL;
};
$value69 = ($arguments67['value'] !== NULL ? $arguments67['value'] : $renderChildrenClosure68());

$output66 .= (!is_string($value69) ? $value69 : htmlspecialchars($value69, ($arguments67['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments67['encoding'] !== NULL ? $arguments67['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments67['doubleEncode']));

$output66 .= '
						';
return $output66;
};

$output63 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments64, $renderChildrenClosure65, $renderingContext);

$output63 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments70 = array();
$renderChildrenClosure71 = function() use ($renderingContext, $self) {
$output72 = '';

$output72 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments73 = array();
$arguments73['key'] = 'widget.pagination.records';
$arguments73['id'] = NULL;
$arguments73['default'] = NULL;
$arguments73['htmlEscape'] = NULL;
$arguments73['arguments'] = NULL;
$arguments73['extensionName'] = NULL;
$renderChildrenClosure74 = function() use ($renderingContext, $self) {
return NULL;
};

$output72 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments73, $renderChildrenClosure74, $renderingContext);

$output72 .= '
						';
return $output72;
};

$output63 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments70, $renderChildrenClosure71, $renderingContext);

$output63 .= '
					';
return $output63;
};
$arguments61['__thenClosure'] = function() use ($renderingContext, $self) {
$output75 = '';

$output75 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments76 = array();
$arguments76['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'recordsLabel', $renderingContext);
$arguments76['keepQuotes'] = false;
$arguments76['encoding'] = NULL;
$arguments76['doubleEncode'] = true;
$renderChildrenClosure77 = function() use ($renderingContext, $self) {
return NULL;
};
$value78 = ($arguments76['value'] !== NULL ? $arguments76['value'] : $renderChildrenClosure77());

$output75 .= (!is_string($value78) ? $value78 : htmlspecialchars($value78, ($arguments76['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments76['encoding'] !== NULL ? $arguments76['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments76['doubleEncode']));

$output75 .= '
						';
return $output75;
};
$arguments61['__elseClosure'] = function() use ($renderingContext, $self) {
$output79 = '';

$output79 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments80 = array();
$arguments80['key'] = 'widget.pagination.records';
$arguments80['id'] = NULL;
$arguments80['default'] = NULL;
$arguments80['htmlEscape'] = NULL;
$arguments80['arguments'] = NULL;
$arguments80['extensionName'] = NULL;
$renderChildrenClosure81 = function() use ($renderingContext, $self) {
return NULL;
};

$output79 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments80, $renderChildrenClosure81, $renderingContext);

$output79 .= '
						';
return $output79;
};
$viewHelper82 = $self->getViewHelper('$viewHelper82', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper82->setArguments($arguments61);
$viewHelper82->setRenderingContext($renderingContext);
$viewHelper82->setRenderChildrenClosure($renderChildrenClosure62);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper82->initializeArgumentsAndRender();

$output0 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments83 = array();
$arguments83['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.startRecord', $renderingContext);
$arguments83['keepQuotes'] = false;
$arguments83['encoding'] = NULL;
$arguments83['doubleEncode'] = true;
$renderChildrenClosure84 = function() use ($renderingContext, $self) {
return NULL;
};
$value85 = ($arguments83['value'] !== NULL ? $arguments83['value'] : $renderChildrenClosure84());

$output0 .= (!is_string($value85) ? $value85 : htmlspecialchars($value85, ($arguments83['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments83['encoding'] !== NULL ? $arguments83['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments83['doubleEncode']));

$output0 .= ' - ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments86 = array();
$arguments86['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.endRecord', $renderingContext);
$arguments86['keepQuotes'] = false;
$arguments86['encoding'] = NULL;
$arguments86['doubleEncode'] = true;
$renderChildrenClosure87 = function() use ($renderingContext, $self) {
return NULL;
};
$value88 = ($arguments86['value'] !== NULL ? $arguments86['value'] : $renderChildrenClosure87());

$output0 .= (!is_string($value88) ? $value88 : htmlspecialchars($value88, ($arguments86['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments86['encoding'] !== NULL ? $arguments86['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments86['doubleEncode']));

$output0 .= '
				</span>
			</li>
			<li>
				<span>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments89 = array();
$arguments89['key'] = 'widget.pagination.page';
$arguments89['id'] = NULL;
$arguments89['default'] = NULL;
$arguments89['htmlEscape'] = NULL;
$arguments89['arguments'] = NULL;
$arguments89['extensionName'] = NULL;
$renderChildrenClosure90 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments89, $renderChildrenClosure90, $renderingContext);

$output0 .= '

					<form id="paginator-form-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments91 = array();
$arguments91['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'position', $renderingContext);
$arguments91['keepQuotes'] = false;
$arguments91['encoding'] = NULL;
$arguments91['doubleEncode'] = true;
$renderChildrenClosure92 = function() use ($renderingContext, $self) {
return NULL;
};
$value93 = ($arguments91['value'] !== NULL ? $arguments91['value'] : $renderChildrenClosure92());

$output0 .= (!is_string($value93) ? $value93 : htmlspecialchars($value93, ($arguments91['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments91['encoding'] !== NULL ? $arguments91['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments91['doubleEncode']));

$output0 .= '" onsubmit="goToPage';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments94 = array();
$arguments94['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'position', $renderingContext);
$arguments94['keepQuotes'] = false;
$arguments94['encoding'] = NULL;
$arguments94['doubleEncode'] = true;
$renderChildrenClosure95 = function() use ($renderingContext, $self) {
return NULL;
};
$value96 = ($arguments94['value'] !== NULL ? $arguments94['value'] : $renderChildrenClosure95());

$output0 .= (!is_string($value96) ? $value96 : htmlspecialchars($value96, ($arguments94['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments94['encoding'] !== NULL ? $arguments94['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments94['doubleEncode']));

$output0 .= '(this); return false;" style="display:inline;">
					<script type="text/javascript">
						function goToPage';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments97 = array();
$arguments97['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'position', $renderingContext);
$arguments97['keepQuotes'] = false;
$arguments97['encoding'] = NULL;
$arguments97['doubleEncode'] = true;
$renderChildrenClosure98 = function() use ($renderingContext, $self) {
return NULL;
};
$value99 = ($arguments97['value'] !== NULL ? $arguments97['value'] : $renderChildrenClosure98());

$output0 .= (!is_string($value99) ? $value99 : htmlspecialchars($value99, ($arguments97['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments97['encoding'] !== NULL ? $arguments97['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments97['doubleEncode']));

$output0 .= '(formObject) {
							var url = \'';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments100 = array();
// Rendering Array
$array101 = array();
$array101['currentPage'] = 987654321;
$arguments100['arguments'] = $array101;
$arguments100['action'] = NULL;
$arguments100['section'] = '';
$arguments100['format'] = '';
$arguments100['ajax'] = false;
$arguments100['addQueryStringMethod'] = NULL;
$renderChildrenClosure102 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper103 = $self->getViewHelper('$viewHelper103', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper103->setArguments($arguments100);
$viewHelper103->setRenderingContext($renderingContext);
$viewHelper103->setRenderChildrenClosure($renderChildrenClosure102);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output0 .= $viewHelper103->initializeArgumentsAndRender();

$output0 .= '\';
							var page = formObject.elements[\'paginator-target-page\'].value;
							if (page > ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments104 = array();
$arguments104['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.numberOfPages', $renderingContext);
$arguments104['keepQuotes'] = false;
$arguments104['encoding'] = NULL;
$arguments104['doubleEncode'] = true;
$renderChildrenClosure105 = function() use ($renderingContext, $self) {
return NULL;
};
$value106 = ($arguments104['value'] !== NULL ? $arguments104['value'] : $renderChildrenClosure105());

$output0 .= (!is_string($value106) ? $value106 : htmlspecialchars($value106, ($arguments104['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments104['encoding'] !== NULL ? $arguments104['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments104['doubleEncode']));

$output0 .= ') {
								page = ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments107 = array();
$arguments107['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.numberOfPages', $renderingContext);
$arguments107['keepQuotes'] = false;
$arguments107['encoding'] = NULL;
$arguments107['doubleEncode'] = true;
$renderChildrenClosure108 = function() use ($renderingContext, $self) {
return NULL;
};
$value109 = ($arguments107['value'] !== NULL ? $arguments107['value'] : $renderChildrenClosure108());

$output0 .= (!is_string($value109) ? $value109 : htmlspecialchars($value109, ($arguments107['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments107['encoding'] !== NULL ? $arguments107['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments107['doubleEncode']));

$output0 .= ';
							} else if (page < 1) {
								page = 1;
							}
							url = url.replace(\'987654321\', page);
							self.location.href= url;
						}
					</script>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments110 = array();
$output111 = '';

$output111 .= 'paginator-';

$output111 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'position', $renderingContext);
$arguments110['id'] = $output111;
$arguments110['name'] = 'paginator-target-page';
$arguments110['class'] = 'form-control input-sm paginator-input';
$arguments110['size'] = '5';
$arguments110['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.current', $renderingContext);
$arguments110['additionalAttributes'] = NULL;
$arguments110['data'] = NULL;
$arguments110['required'] = NULL;
$arguments110['type'] = 'text';
$arguments110['property'] = NULL;
$arguments110['autofocus'] = NULL;
$arguments110['disabled'] = NULL;
$arguments110['maxlength'] = NULL;
$arguments110['readonly'] = NULL;
$arguments110['placeholder'] = NULL;
$arguments110['pattern'] = NULL;
$arguments110['errorClass'] = 'f3-form-error';
$arguments110['dir'] = NULL;
$arguments110['lang'] = NULL;
$arguments110['style'] = NULL;
$arguments110['title'] = NULL;
$arguments110['accesskey'] = NULL;
$arguments110['tabindex'] = NULL;
$arguments110['onclick'] = NULL;
$renderChildrenClosure112 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper113 = $self->getViewHelper('$viewHelper113', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper113->setArguments($arguments110);
$viewHelper113->setRenderingContext($renderingContext);
$viewHelper113->setRenderChildrenClosure($renderChildrenClosure112);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output0 .= $viewHelper113->initializeArgumentsAndRender();

$output0 .= '
					</form>

					/ ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments114 = array();
$arguments114['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.numberOfPages', $renderingContext);
$arguments114['keepQuotes'] = false;
$arguments114['encoding'] = NULL;
$arguments114['doubleEncode'] = true;
$renderChildrenClosure115 = function() use ($renderingContext, $self) {
return NULL;
};
$value116 = ($arguments114['value'] !== NULL ? $arguments114['value'] : $renderChildrenClosure115());

$output0 .= (!is_string($value116) ? $value116 : htmlspecialchars($value116, ($arguments114['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments114['encoding'] !== NULL ? $arguments114['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments114['doubleEncode']));

$output0 .= '
				</span>
			</li>
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments117 = array();
// Rendering Boolean node
$arguments117['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.hasMorePages', $renderingContext));
$arguments117['then'] = NULL;
$arguments117['else'] = NULL;
$renderChildrenClosure118 = function() use ($renderingContext, $self) {
$output119 = '';

$output119 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments120 = array();
$renderChildrenClosure121 = function() use ($renderingContext, $self) {
$output122 = '';

$output122 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments123 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments124 = array();
// Rendering Array
$array125 = array();
$array125['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.nextPage', $renderingContext);
$arguments124['arguments'] = $array125;
$arguments124['action'] = NULL;
$arguments124['section'] = '';
$arguments124['format'] = '';
$arguments124['ajax'] = false;
$arguments124['addQueryStringMethod'] = NULL;
$renderChildrenClosure126 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper127 = $self->getViewHelper('$viewHelper127', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper127->setArguments($arguments124);
$viewHelper127->setRenderingContext($renderingContext);
$viewHelper127->setRenderChildrenClosure($renderChildrenClosure126);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments123['uri'] = $viewHelper127->initializeArgumentsAndRender();
$arguments123['icon'] = 'actions-view-paging-next';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments128 = array();
$arguments128['key'] = 'widget.pagination.next';
$arguments128['id'] = NULL;
$arguments128['default'] = NULL;
$arguments128['htmlEscape'] = NULL;
$arguments128['arguments'] = NULL;
$arguments128['extensionName'] = NULL;
$renderChildrenClosure129 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments123['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments128, $renderChildrenClosure129, $renderingContext);
$arguments123['additionalAttributes'] = NULL;
$renderChildrenClosure130 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper131 = $self->getViewHelper('$viewHelper131', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper131->setArguments($arguments123);
$viewHelper131->setRenderingContext($renderingContext);
$viewHelper131->setRenderChildrenClosure($renderChildrenClosure130);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output122 .= $viewHelper131->initializeArgumentsAndRender();

$output122 .= '
					</li>
					<li>
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments132 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments133 = array();
// Rendering Array
$array134 = array();
$array134['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.numberOfPages', $renderingContext);
$arguments133['arguments'] = $array134;
$arguments133['action'] = NULL;
$arguments133['section'] = '';
$arguments133['format'] = '';
$arguments133['ajax'] = false;
$arguments133['addQueryStringMethod'] = NULL;
$renderChildrenClosure135 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper136 = $self->getViewHelper('$viewHelper136', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper136->setArguments($arguments133);
$viewHelper136->setRenderingContext($renderingContext);
$viewHelper136->setRenderChildrenClosure($renderChildrenClosure135);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments132['uri'] = $viewHelper136->initializeArgumentsAndRender();
$arguments132['icon'] = 'actions-view-paging-last';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments137 = array();
$arguments137['key'] = 'widget.pagination.last';
$arguments137['id'] = NULL;
$arguments137['default'] = NULL;
$arguments137['htmlEscape'] = NULL;
$arguments137['arguments'] = NULL;
$arguments137['extensionName'] = NULL;
$renderChildrenClosure138 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments132['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments137, $renderChildrenClosure138, $renderingContext);
$arguments132['additionalAttributes'] = NULL;
$renderChildrenClosure139 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper140 = $self->getViewHelper('$viewHelper140', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper140->setArguments($arguments132);
$viewHelper140->setRenderingContext($renderingContext);
$viewHelper140->setRenderChildrenClosure($renderChildrenClosure139);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output122 .= $viewHelper140->initializeArgumentsAndRender();

$output122 .= '
					</li>
				';
return $output122;
};

$output119 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments120, $renderChildrenClosure121, $renderingContext);

$output119 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments141 = array();
$renderChildrenClosure142 = function() use ($renderingContext, $self) {
$output143 = '';

$output143 .= '
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments144 = array();
$arguments144['uri'] = '';
$arguments144['icon'] = 'actions-view-paging-next';
$arguments144['title'] = '';
$arguments144['additionalAttributes'] = NULL;
$renderChildrenClosure145 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper146 = $self->getViewHelper('$viewHelper146', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper146->setArguments($arguments144);
$viewHelper146->setRenderingContext($renderingContext);
$viewHelper146->setRenderChildrenClosure($renderChildrenClosure145);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output143 .= $viewHelper146->initializeArgumentsAndRender();

$output143 .= '
						</span>
					</li>
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments147 = array();
$arguments147['uri'] = '';
$arguments147['icon'] = 'actions-view-paging-last';
$arguments147['title'] = '';
$arguments147['additionalAttributes'] = NULL;
$renderChildrenClosure148 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper149 = $self->getViewHelper('$viewHelper149', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper149->setArguments($arguments147);
$viewHelper149->setRenderingContext($renderingContext);
$viewHelper149->setRenderChildrenClosure($renderChildrenClosure148);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output143 .= $viewHelper149->initializeArgumentsAndRender();

$output143 .= '
						</span>
					</li>
				';
return $output143;
};

$output119 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments141, $renderChildrenClosure142, $renderingContext);

$output119 .= '
			';
return $output119;
};
$arguments117['__thenClosure'] = function() use ($renderingContext, $self) {
$output150 = '';

$output150 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments151 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments152 = array();
// Rendering Array
$array153 = array();
$array153['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.nextPage', $renderingContext);
$arguments152['arguments'] = $array153;
$arguments152['action'] = NULL;
$arguments152['section'] = '';
$arguments152['format'] = '';
$arguments152['ajax'] = false;
$arguments152['addQueryStringMethod'] = NULL;
$renderChildrenClosure154 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper155 = $self->getViewHelper('$viewHelper155', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper155->setArguments($arguments152);
$viewHelper155->setRenderingContext($renderingContext);
$viewHelper155->setRenderChildrenClosure($renderChildrenClosure154);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments151['uri'] = $viewHelper155->initializeArgumentsAndRender();
$arguments151['icon'] = 'actions-view-paging-next';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments156 = array();
$arguments156['key'] = 'widget.pagination.next';
$arguments156['id'] = NULL;
$arguments156['default'] = NULL;
$arguments156['htmlEscape'] = NULL;
$arguments156['arguments'] = NULL;
$arguments156['extensionName'] = NULL;
$renderChildrenClosure157 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments151['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments156, $renderChildrenClosure157, $renderingContext);
$arguments151['additionalAttributes'] = NULL;
$renderChildrenClosure158 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper159 = $self->getViewHelper('$viewHelper159', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper159->setArguments($arguments151);
$viewHelper159->setRenderingContext($renderingContext);
$viewHelper159->setRenderChildrenClosure($renderChildrenClosure158);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output150 .= $viewHelper159->initializeArgumentsAndRender();

$output150 .= '
					</li>
					<li>
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments160 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments161 = array();
// Rendering Array
$array162 = array();
$array162['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.numberOfPages', $renderingContext);
$arguments161['arguments'] = $array162;
$arguments161['action'] = NULL;
$arguments161['section'] = '';
$arguments161['format'] = '';
$arguments161['ajax'] = false;
$arguments161['addQueryStringMethod'] = NULL;
$renderChildrenClosure163 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper164 = $self->getViewHelper('$viewHelper164', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper164->setArguments($arguments161);
$viewHelper164->setRenderingContext($renderingContext);
$viewHelper164->setRenderChildrenClosure($renderChildrenClosure163);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments160['uri'] = $viewHelper164->initializeArgumentsAndRender();
$arguments160['icon'] = 'actions-view-paging-last';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments165 = array();
$arguments165['key'] = 'widget.pagination.last';
$arguments165['id'] = NULL;
$arguments165['default'] = NULL;
$arguments165['htmlEscape'] = NULL;
$arguments165['arguments'] = NULL;
$arguments165['extensionName'] = NULL;
$renderChildrenClosure166 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments160['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments165, $renderChildrenClosure166, $renderingContext);
$arguments160['additionalAttributes'] = NULL;
$renderChildrenClosure167 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper168 = $self->getViewHelper('$viewHelper168', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper168->setArguments($arguments160);
$viewHelper168->setRenderingContext($renderingContext);
$viewHelper168->setRenderChildrenClosure($renderChildrenClosure167);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output150 .= $viewHelper168->initializeArgumentsAndRender();

$output150 .= '
					</li>
				';
return $output150;
};
$arguments117['__elseClosure'] = function() use ($renderingContext, $self) {
$output169 = '';

$output169 .= '
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments170 = array();
$arguments170['uri'] = '';
$arguments170['icon'] = 'actions-view-paging-next';
$arguments170['title'] = '';
$arguments170['additionalAttributes'] = NULL;
$renderChildrenClosure171 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper172 = $self->getViewHelper('$viewHelper172', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper172->setArguments($arguments170);
$viewHelper172->setRenderingContext($renderingContext);
$viewHelper172->setRenderChildrenClosure($renderChildrenClosure171);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output169 .= $viewHelper172->initializeArgumentsAndRender();

$output169 .= '
						</span>
					</li>
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments173 = array();
$arguments173['uri'] = '';
$arguments173['icon'] = 'actions-view-paging-last';
$arguments173['title'] = '';
$arguments173['additionalAttributes'] = NULL;
$renderChildrenClosure174 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper175 = $self->getViewHelper('$viewHelper175', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper175->setArguments($arguments173);
$viewHelper175->setRenderingContext($renderingContext);
$viewHelper175->setRenderChildrenClosure($renderChildrenClosure174);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output169 .= $viewHelper175->initializeArgumentsAndRender();

$output169 .= '
						</span>
					</li>
				';
return $output169;
};
$viewHelper176 = $self->getViewHelper('$viewHelper176', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper176->setArguments($arguments117);
$viewHelper176->setRenderingContext($renderingContext);
$viewHelper176->setRenderChildrenClosure($renderChildrenClosure118);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper176->initializeArgumentsAndRender();

$output0 .= '
			<li>
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments177 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments178 = array();
// Rendering Array
$array179 = array();
$array179['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.current', $renderingContext);
$arguments178['arguments'] = $array179;
$arguments178['action'] = NULL;
$arguments178['section'] = '';
$arguments178['format'] = '';
$arguments178['ajax'] = false;
$arguments178['addQueryStringMethod'] = NULL;
$renderChildrenClosure180 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper181 = $self->getViewHelper('$viewHelper181', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper181->setArguments($arguments178);
$viewHelper181->setRenderingContext($renderingContext);
$viewHelper181->setRenderChildrenClosure($renderChildrenClosure180);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments177['uri'] = $viewHelper181->initializeArgumentsAndRender();
$arguments177['icon'] = 'actions-system-refresh';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments182 = array();
$arguments182['key'] = 'widget.pagination.refresh';
$arguments182['id'] = NULL;
$arguments182['default'] = NULL;
$arguments182['htmlEscape'] = NULL;
$arguments182['arguments'] = NULL;
$arguments182['extensionName'] = NULL;
$renderChildrenClosure183 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments177['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments182, $renderChildrenClosure183, $renderingContext);
$arguments177['additionalAttributes'] = NULL;
$renderChildrenClosure184 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper185 = $self->getViewHelper('$viewHelper185', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper185->setArguments($arguments177);
$viewHelper185->setRenderingContext($renderingContext);
$viewHelper185->setRenderChildrenClosure($renderChildrenClosure184);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output0 .= $viewHelper185->initializeArgumentsAndRender();

$output0 .= '
			</li>
		</ul>
	</nav>
';

return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output186 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments187 = array();
// Rendering Boolean node
$arguments187['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'configuration.insertAbove', $renderingContext));
$arguments187['then'] = NULL;
$arguments187['else'] = NULL;
$renderChildrenClosure188 = function() use ($renderingContext, $self) {
$output189 = '';

$output189 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments190 = array();
$arguments190['section'] = 'paginator';
// Rendering Array
$array191 = array();
$array191['pagination'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination', $renderingContext);
$array191['position'] = 'top';
$array191['recordsLabel'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'configuration.recordsLabel', $renderingContext);
$arguments190['arguments'] = $array191;
$arguments190['partial'] = NULL;
$arguments190['optional'] = false;
$renderChildrenClosure192 = function() use ($renderingContext, $self) {
return NULL;
};

$output189 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments190, $renderChildrenClosure192, $renderingContext);

$output189 .= '
';
return $output189;
};
$viewHelper193 = $self->getViewHelper('$viewHelper193', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper193->setArguments($arguments187);
$viewHelper193->setRenderingContext($renderingContext);
$viewHelper193->setRenderChildrenClosure($renderChildrenClosure188);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output186 .= $viewHelper193->initializeArgumentsAndRender();

$output186 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderChildrenViewHelper
$arguments194 = array();
$arguments194['arguments'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'contentArguments', $renderingContext);
$renderChildrenClosure195 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper196 = $self->getViewHelper('$viewHelper196', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\RenderChildrenViewHelper');
$viewHelper196->setArguments($arguments194);
$viewHelper196->setRenderingContext($renderingContext);
$viewHelper196->setRenderChildrenClosure($renderChildrenClosure195);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderChildrenViewHelper

$output186 .= $viewHelper196->initializeArgumentsAndRender();

$output186 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments197 = array();
// Rendering Boolean node
$arguments197['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'configuration.insertBelow', $renderingContext));
$arguments197['then'] = NULL;
$arguments197['else'] = NULL;
$renderChildrenClosure198 = function() use ($renderingContext, $self) {
$output199 = '';

$output199 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments200 = array();
$arguments200['section'] = 'paginator';
// Rendering Array
$array201 = array();
$array201['pagination'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination', $renderingContext);
$array201['position'] = 'bottom';
$array201['recordsLabel'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'configuration.recordsLabel', $renderingContext);
$arguments200['arguments'] = $array201;
$arguments200['partial'] = NULL;
$arguments200['optional'] = false;
$renderChildrenClosure202 = function() use ($renderingContext, $self) {
return NULL;
};

$output199 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments200, $renderChildrenClosure202, $renderingContext);

$output199 .= '
';
return $output199;
};
$viewHelper203 = $self->getViewHelper('$viewHelper203', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper203->setArguments($arguments197);
$viewHelper203->setRenderingContext($renderingContext);
$viewHelper203->setRenderChildrenClosure($renderChildrenClosure198);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output186 .= $viewHelper203->initializeArgumentsAndRender();

$output186 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments204 = array();
$arguments204['name'] = 'paginator';
$renderChildrenClosure205 = function() use ($renderingContext, $self) {
$output206 = '';

$output206 .= '
	<nav class="pagination-wrap">
		<ul class="pagination pagination-block">
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments207 = array();
// Rendering Boolean node
$arguments207['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.hasLessPages', $renderingContext));
$arguments207['then'] = NULL;
$arguments207['else'] = NULL;
$renderChildrenClosure208 = function() use ($renderingContext, $self) {
$output209 = '';

$output209 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments210 = array();
$renderChildrenClosure211 = function() use ($renderingContext, $self) {
$output212 = '';

$output212 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments213 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments214 = array();
// Rendering Array
$array215 = array();
$array215['currentPage'] = 1;
$arguments214['arguments'] = $array215;
$arguments214['action'] = NULL;
$arguments214['section'] = '';
$arguments214['format'] = '';
$arguments214['ajax'] = false;
$arguments214['addQueryStringMethod'] = NULL;
$renderChildrenClosure216 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper217 = $self->getViewHelper('$viewHelper217', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper217->setArguments($arguments214);
$viewHelper217->setRenderingContext($renderingContext);
$viewHelper217->setRenderChildrenClosure($renderChildrenClosure216);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments213['uri'] = $viewHelper217->initializeArgumentsAndRender();
$arguments213['icon'] = 'actions-view-paging-first';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments218 = array();
$arguments218['key'] = 'widget.pagination.first';
$arguments218['id'] = NULL;
$arguments218['default'] = NULL;
$arguments218['htmlEscape'] = NULL;
$arguments218['arguments'] = NULL;
$arguments218['extensionName'] = NULL;
$renderChildrenClosure219 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments213['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments218, $renderChildrenClosure219, $renderingContext);
$arguments213['additionalAttributes'] = NULL;
$renderChildrenClosure220 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper221 = $self->getViewHelper('$viewHelper221', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper221->setArguments($arguments213);
$viewHelper221->setRenderingContext($renderingContext);
$viewHelper221->setRenderChildrenClosure($renderChildrenClosure220);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output212 .= $viewHelper221->initializeArgumentsAndRender();

$output212 .= '
					</li>
					<li>
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments222 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments223 = array();
// Rendering Array
$array224 = array();
$array224['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.previousPage', $renderingContext);
$arguments223['arguments'] = $array224;
$arguments223['action'] = NULL;
$arguments223['section'] = '';
$arguments223['format'] = '';
$arguments223['ajax'] = false;
$arguments223['addQueryStringMethod'] = NULL;
$renderChildrenClosure225 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper226 = $self->getViewHelper('$viewHelper226', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper226->setArguments($arguments223);
$viewHelper226->setRenderingContext($renderingContext);
$viewHelper226->setRenderChildrenClosure($renderChildrenClosure225);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments222['uri'] = $viewHelper226->initializeArgumentsAndRender();
$arguments222['icon'] = 'actions-view-paging-previous';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments227 = array();
$arguments227['key'] = 'widget.pagination.previous';
$arguments227['id'] = NULL;
$arguments227['default'] = NULL;
$arguments227['htmlEscape'] = NULL;
$arguments227['arguments'] = NULL;
$arguments227['extensionName'] = NULL;
$renderChildrenClosure228 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments222['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments227, $renderChildrenClosure228, $renderingContext);
$arguments222['additionalAttributes'] = NULL;
$renderChildrenClosure229 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper230 = $self->getViewHelper('$viewHelper230', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper230->setArguments($arguments222);
$viewHelper230->setRenderingContext($renderingContext);
$viewHelper230->setRenderChildrenClosure($renderChildrenClosure229);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output212 .= $viewHelper230->initializeArgumentsAndRender();

$output212 .= '
					</li>
				';
return $output212;
};

$output209 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments210, $renderChildrenClosure211, $renderingContext);

$output209 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments231 = array();
$renderChildrenClosure232 = function() use ($renderingContext, $self) {
$output233 = '';

$output233 .= '
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments234 = array();
$arguments234['uri'] = '';
$arguments234['icon'] = 'actions-view-paging-first';
$arguments234['title'] = '';
$arguments234['additionalAttributes'] = NULL;
$renderChildrenClosure235 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper236 = $self->getViewHelper('$viewHelper236', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper236->setArguments($arguments234);
$viewHelper236->setRenderingContext($renderingContext);
$viewHelper236->setRenderChildrenClosure($renderChildrenClosure235);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output233 .= $viewHelper236->initializeArgumentsAndRender();

$output233 .= '
						</span>
					</li>
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments237 = array();
$arguments237['uri'] = '';
$arguments237['icon'] = 'actions-view-paging-previous';
$arguments237['title'] = '';
$arguments237['additionalAttributes'] = NULL;
$renderChildrenClosure238 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper239 = $self->getViewHelper('$viewHelper239', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper239->setArguments($arguments237);
$viewHelper239->setRenderingContext($renderingContext);
$viewHelper239->setRenderChildrenClosure($renderChildrenClosure238);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output233 .= $viewHelper239->initializeArgumentsAndRender();

$output233 .= '
						</span>
					</li>
				';
return $output233;
};

$output209 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments231, $renderChildrenClosure232, $renderingContext);

$output209 .= '
			';
return $output209;
};
$arguments207['__thenClosure'] = function() use ($renderingContext, $self) {
$output240 = '';

$output240 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments241 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments242 = array();
// Rendering Array
$array243 = array();
$array243['currentPage'] = 1;
$arguments242['arguments'] = $array243;
$arguments242['action'] = NULL;
$arguments242['section'] = '';
$arguments242['format'] = '';
$arguments242['ajax'] = false;
$arguments242['addQueryStringMethod'] = NULL;
$renderChildrenClosure244 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper245 = $self->getViewHelper('$viewHelper245', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper245->setArguments($arguments242);
$viewHelper245->setRenderingContext($renderingContext);
$viewHelper245->setRenderChildrenClosure($renderChildrenClosure244);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments241['uri'] = $viewHelper245->initializeArgumentsAndRender();
$arguments241['icon'] = 'actions-view-paging-first';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments246 = array();
$arguments246['key'] = 'widget.pagination.first';
$arguments246['id'] = NULL;
$arguments246['default'] = NULL;
$arguments246['htmlEscape'] = NULL;
$arguments246['arguments'] = NULL;
$arguments246['extensionName'] = NULL;
$renderChildrenClosure247 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments241['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments246, $renderChildrenClosure247, $renderingContext);
$arguments241['additionalAttributes'] = NULL;
$renderChildrenClosure248 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper249 = $self->getViewHelper('$viewHelper249', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper249->setArguments($arguments241);
$viewHelper249->setRenderingContext($renderingContext);
$viewHelper249->setRenderChildrenClosure($renderChildrenClosure248);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output240 .= $viewHelper249->initializeArgumentsAndRender();

$output240 .= '
					</li>
					<li>
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments250 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments251 = array();
// Rendering Array
$array252 = array();
$array252['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.previousPage', $renderingContext);
$arguments251['arguments'] = $array252;
$arguments251['action'] = NULL;
$arguments251['section'] = '';
$arguments251['format'] = '';
$arguments251['ajax'] = false;
$arguments251['addQueryStringMethod'] = NULL;
$renderChildrenClosure253 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper254 = $self->getViewHelper('$viewHelper254', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper254->setArguments($arguments251);
$viewHelper254->setRenderingContext($renderingContext);
$viewHelper254->setRenderChildrenClosure($renderChildrenClosure253);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments250['uri'] = $viewHelper254->initializeArgumentsAndRender();
$arguments250['icon'] = 'actions-view-paging-previous';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments255 = array();
$arguments255['key'] = 'widget.pagination.previous';
$arguments255['id'] = NULL;
$arguments255['default'] = NULL;
$arguments255['htmlEscape'] = NULL;
$arguments255['arguments'] = NULL;
$arguments255['extensionName'] = NULL;
$renderChildrenClosure256 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments250['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments255, $renderChildrenClosure256, $renderingContext);
$arguments250['additionalAttributes'] = NULL;
$renderChildrenClosure257 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper258 = $self->getViewHelper('$viewHelper258', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper258->setArguments($arguments250);
$viewHelper258->setRenderingContext($renderingContext);
$viewHelper258->setRenderChildrenClosure($renderChildrenClosure257);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output240 .= $viewHelper258->initializeArgumentsAndRender();

$output240 .= '
					</li>
				';
return $output240;
};
$arguments207['__elseClosure'] = function() use ($renderingContext, $self) {
$output259 = '';

$output259 .= '
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments260 = array();
$arguments260['uri'] = '';
$arguments260['icon'] = 'actions-view-paging-first';
$arguments260['title'] = '';
$arguments260['additionalAttributes'] = NULL;
$renderChildrenClosure261 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper262 = $self->getViewHelper('$viewHelper262', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper262->setArguments($arguments260);
$viewHelper262->setRenderingContext($renderingContext);
$viewHelper262->setRenderChildrenClosure($renderChildrenClosure261);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output259 .= $viewHelper262->initializeArgumentsAndRender();

$output259 .= '
						</span>
					</li>
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments263 = array();
$arguments263['uri'] = '';
$arguments263['icon'] = 'actions-view-paging-previous';
$arguments263['title'] = '';
$arguments263['additionalAttributes'] = NULL;
$renderChildrenClosure264 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper265 = $self->getViewHelper('$viewHelper265', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper265->setArguments($arguments263);
$viewHelper265->setRenderingContext($renderingContext);
$viewHelper265->setRenderChildrenClosure($renderChildrenClosure264);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output259 .= $viewHelper265->initializeArgumentsAndRender();

$output259 .= '
						</span>
					</li>
				';
return $output259;
};
$viewHelper266 = $self->getViewHelper('$viewHelper266', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper266->setArguments($arguments207);
$viewHelper266->setRenderingContext($renderingContext);
$viewHelper266->setRenderChildrenClosure($renderChildrenClosure208);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output206 .= $viewHelper266->initializeArgumentsAndRender();

$output206 .= '
			<li>
				<span>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments267 = array();
// Rendering Boolean node
$arguments267['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'recordsLabel', $renderingContext));
$arguments267['then'] = NULL;
$arguments267['else'] = NULL;
$renderChildrenClosure268 = function() use ($renderingContext, $self) {
$output269 = '';

$output269 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments270 = array();
$renderChildrenClosure271 = function() use ($renderingContext, $self) {
$output272 = '';

$output272 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments273 = array();
$arguments273['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'recordsLabel', $renderingContext);
$arguments273['keepQuotes'] = false;
$arguments273['encoding'] = NULL;
$arguments273['doubleEncode'] = true;
$renderChildrenClosure274 = function() use ($renderingContext, $self) {
return NULL;
};
$value275 = ($arguments273['value'] !== NULL ? $arguments273['value'] : $renderChildrenClosure274());

$output272 .= (!is_string($value275) ? $value275 : htmlspecialchars($value275, ($arguments273['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments273['encoding'] !== NULL ? $arguments273['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments273['doubleEncode']));

$output272 .= '
						';
return $output272;
};

$output269 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments270, $renderChildrenClosure271, $renderingContext);

$output269 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments276 = array();
$renderChildrenClosure277 = function() use ($renderingContext, $self) {
$output278 = '';

$output278 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments279 = array();
$arguments279['key'] = 'widget.pagination.records';
$arguments279['id'] = NULL;
$arguments279['default'] = NULL;
$arguments279['htmlEscape'] = NULL;
$arguments279['arguments'] = NULL;
$arguments279['extensionName'] = NULL;
$renderChildrenClosure280 = function() use ($renderingContext, $self) {
return NULL;
};

$output278 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments279, $renderChildrenClosure280, $renderingContext);

$output278 .= '
						';
return $output278;
};

$output269 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments276, $renderChildrenClosure277, $renderingContext);

$output269 .= '
					';
return $output269;
};
$arguments267['__thenClosure'] = function() use ($renderingContext, $self) {
$output281 = '';

$output281 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments282 = array();
$arguments282['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'recordsLabel', $renderingContext);
$arguments282['keepQuotes'] = false;
$arguments282['encoding'] = NULL;
$arguments282['doubleEncode'] = true;
$renderChildrenClosure283 = function() use ($renderingContext, $self) {
return NULL;
};
$value284 = ($arguments282['value'] !== NULL ? $arguments282['value'] : $renderChildrenClosure283());

$output281 .= (!is_string($value284) ? $value284 : htmlspecialchars($value284, ($arguments282['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments282['encoding'] !== NULL ? $arguments282['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments282['doubleEncode']));

$output281 .= '
						';
return $output281;
};
$arguments267['__elseClosure'] = function() use ($renderingContext, $self) {
$output285 = '';

$output285 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments286 = array();
$arguments286['key'] = 'widget.pagination.records';
$arguments286['id'] = NULL;
$arguments286['default'] = NULL;
$arguments286['htmlEscape'] = NULL;
$arguments286['arguments'] = NULL;
$arguments286['extensionName'] = NULL;
$renderChildrenClosure287 = function() use ($renderingContext, $self) {
return NULL;
};

$output285 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments286, $renderChildrenClosure287, $renderingContext);

$output285 .= '
						';
return $output285;
};
$viewHelper288 = $self->getViewHelper('$viewHelper288', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper288->setArguments($arguments267);
$viewHelper288->setRenderingContext($renderingContext);
$viewHelper288->setRenderChildrenClosure($renderChildrenClosure268);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output206 .= $viewHelper288->initializeArgumentsAndRender();

$output206 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments289 = array();
$arguments289['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.startRecord', $renderingContext);
$arguments289['keepQuotes'] = false;
$arguments289['encoding'] = NULL;
$arguments289['doubleEncode'] = true;
$renderChildrenClosure290 = function() use ($renderingContext, $self) {
return NULL;
};
$value291 = ($arguments289['value'] !== NULL ? $arguments289['value'] : $renderChildrenClosure290());

$output206 .= (!is_string($value291) ? $value291 : htmlspecialchars($value291, ($arguments289['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments289['encoding'] !== NULL ? $arguments289['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments289['doubleEncode']));

$output206 .= ' - ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments292 = array();
$arguments292['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.endRecord', $renderingContext);
$arguments292['keepQuotes'] = false;
$arguments292['encoding'] = NULL;
$arguments292['doubleEncode'] = true;
$renderChildrenClosure293 = function() use ($renderingContext, $self) {
return NULL;
};
$value294 = ($arguments292['value'] !== NULL ? $arguments292['value'] : $renderChildrenClosure293());

$output206 .= (!is_string($value294) ? $value294 : htmlspecialchars($value294, ($arguments292['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments292['encoding'] !== NULL ? $arguments292['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments292['doubleEncode']));

$output206 .= '
				</span>
			</li>
			<li>
				<span>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments295 = array();
$arguments295['key'] = 'widget.pagination.page';
$arguments295['id'] = NULL;
$arguments295['default'] = NULL;
$arguments295['htmlEscape'] = NULL;
$arguments295['arguments'] = NULL;
$arguments295['extensionName'] = NULL;
$renderChildrenClosure296 = function() use ($renderingContext, $self) {
return NULL;
};

$output206 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments295, $renderChildrenClosure296, $renderingContext);

$output206 .= '

					<form id="paginator-form-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments297 = array();
$arguments297['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'position', $renderingContext);
$arguments297['keepQuotes'] = false;
$arguments297['encoding'] = NULL;
$arguments297['doubleEncode'] = true;
$renderChildrenClosure298 = function() use ($renderingContext, $self) {
return NULL;
};
$value299 = ($arguments297['value'] !== NULL ? $arguments297['value'] : $renderChildrenClosure298());

$output206 .= (!is_string($value299) ? $value299 : htmlspecialchars($value299, ($arguments297['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments297['encoding'] !== NULL ? $arguments297['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments297['doubleEncode']));

$output206 .= '" onsubmit="goToPage';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments300 = array();
$arguments300['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'position', $renderingContext);
$arguments300['keepQuotes'] = false;
$arguments300['encoding'] = NULL;
$arguments300['doubleEncode'] = true;
$renderChildrenClosure301 = function() use ($renderingContext, $self) {
return NULL;
};
$value302 = ($arguments300['value'] !== NULL ? $arguments300['value'] : $renderChildrenClosure301());

$output206 .= (!is_string($value302) ? $value302 : htmlspecialchars($value302, ($arguments300['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments300['encoding'] !== NULL ? $arguments300['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments300['doubleEncode']));

$output206 .= '(this); return false;" style="display:inline;">
					<script type="text/javascript">
						function goToPage';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments303 = array();
$arguments303['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'position', $renderingContext);
$arguments303['keepQuotes'] = false;
$arguments303['encoding'] = NULL;
$arguments303['doubleEncode'] = true;
$renderChildrenClosure304 = function() use ($renderingContext, $self) {
return NULL;
};
$value305 = ($arguments303['value'] !== NULL ? $arguments303['value'] : $renderChildrenClosure304());

$output206 .= (!is_string($value305) ? $value305 : htmlspecialchars($value305, ($arguments303['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments303['encoding'] !== NULL ? $arguments303['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments303['doubleEncode']));

$output206 .= '(formObject) {
							var url = \'';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments306 = array();
// Rendering Array
$array307 = array();
$array307['currentPage'] = 987654321;
$arguments306['arguments'] = $array307;
$arguments306['action'] = NULL;
$arguments306['section'] = '';
$arguments306['format'] = '';
$arguments306['ajax'] = false;
$arguments306['addQueryStringMethod'] = NULL;
$renderChildrenClosure308 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper309 = $self->getViewHelper('$viewHelper309', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper309->setArguments($arguments306);
$viewHelper309->setRenderingContext($renderingContext);
$viewHelper309->setRenderChildrenClosure($renderChildrenClosure308);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output206 .= $viewHelper309->initializeArgumentsAndRender();

$output206 .= '\';
							var page = formObject.elements[\'paginator-target-page\'].value;
							if (page > ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments310 = array();
$arguments310['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.numberOfPages', $renderingContext);
$arguments310['keepQuotes'] = false;
$arguments310['encoding'] = NULL;
$arguments310['doubleEncode'] = true;
$renderChildrenClosure311 = function() use ($renderingContext, $self) {
return NULL;
};
$value312 = ($arguments310['value'] !== NULL ? $arguments310['value'] : $renderChildrenClosure311());

$output206 .= (!is_string($value312) ? $value312 : htmlspecialchars($value312, ($arguments310['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments310['encoding'] !== NULL ? $arguments310['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments310['doubleEncode']));

$output206 .= ') {
								page = ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments313 = array();
$arguments313['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.numberOfPages', $renderingContext);
$arguments313['keepQuotes'] = false;
$arguments313['encoding'] = NULL;
$arguments313['doubleEncode'] = true;
$renderChildrenClosure314 = function() use ($renderingContext, $self) {
return NULL;
};
$value315 = ($arguments313['value'] !== NULL ? $arguments313['value'] : $renderChildrenClosure314());

$output206 .= (!is_string($value315) ? $value315 : htmlspecialchars($value315, ($arguments313['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments313['encoding'] !== NULL ? $arguments313['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments313['doubleEncode']));

$output206 .= ';
							} else if (page < 1) {
								page = 1;
							}
							url = url.replace(\'987654321\', page);
							self.location.href= url;
						}
					</script>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments316 = array();
$output317 = '';

$output317 .= 'paginator-';

$output317 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'position', $renderingContext);
$arguments316['id'] = $output317;
$arguments316['name'] = 'paginator-target-page';
$arguments316['class'] = 'form-control input-sm paginator-input';
$arguments316['size'] = '5';
$arguments316['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.current', $renderingContext);
$arguments316['additionalAttributes'] = NULL;
$arguments316['data'] = NULL;
$arguments316['required'] = NULL;
$arguments316['type'] = 'text';
$arguments316['property'] = NULL;
$arguments316['autofocus'] = NULL;
$arguments316['disabled'] = NULL;
$arguments316['maxlength'] = NULL;
$arguments316['readonly'] = NULL;
$arguments316['placeholder'] = NULL;
$arguments316['pattern'] = NULL;
$arguments316['errorClass'] = 'f3-form-error';
$arguments316['dir'] = NULL;
$arguments316['lang'] = NULL;
$arguments316['style'] = NULL;
$arguments316['title'] = NULL;
$arguments316['accesskey'] = NULL;
$arguments316['tabindex'] = NULL;
$arguments316['onclick'] = NULL;
$renderChildrenClosure318 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper319 = $self->getViewHelper('$viewHelper319', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper319->setArguments($arguments316);
$viewHelper319->setRenderingContext($renderingContext);
$viewHelper319->setRenderChildrenClosure($renderChildrenClosure318);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output206 .= $viewHelper319->initializeArgumentsAndRender();

$output206 .= '
					</form>

					/ ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments320 = array();
$arguments320['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.numberOfPages', $renderingContext);
$arguments320['keepQuotes'] = false;
$arguments320['encoding'] = NULL;
$arguments320['doubleEncode'] = true;
$renderChildrenClosure321 = function() use ($renderingContext, $self) {
return NULL;
};
$value322 = ($arguments320['value'] !== NULL ? $arguments320['value'] : $renderChildrenClosure321());

$output206 .= (!is_string($value322) ? $value322 : htmlspecialchars($value322, ($arguments320['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments320['encoding'] !== NULL ? $arguments320['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments320['doubleEncode']));

$output206 .= '
				</span>
			</li>
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments323 = array();
// Rendering Boolean node
$arguments323['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.hasMorePages', $renderingContext));
$arguments323['then'] = NULL;
$arguments323['else'] = NULL;
$renderChildrenClosure324 = function() use ($renderingContext, $self) {
$output325 = '';

$output325 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments326 = array();
$renderChildrenClosure327 = function() use ($renderingContext, $self) {
$output328 = '';

$output328 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments329 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments330 = array();
// Rendering Array
$array331 = array();
$array331['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.nextPage', $renderingContext);
$arguments330['arguments'] = $array331;
$arguments330['action'] = NULL;
$arguments330['section'] = '';
$arguments330['format'] = '';
$arguments330['ajax'] = false;
$arguments330['addQueryStringMethod'] = NULL;
$renderChildrenClosure332 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper333 = $self->getViewHelper('$viewHelper333', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper333->setArguments($arguments330);
$viewHelper333->setRenderingContext($renderingContext);
$viewHelper333->setRenderChildrenClosure($renderChildrenClosure332);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments329['uri'] = $viewHelper333->initializeArgumentsAndRender();
$arguments329['icon'] = 'actions-view-paging-next';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments334 = array();
$arguments334['key'] = 'widget.pagination.next';
$arguments334['id'] = NULL;
$arguments334['default'] = NULL;
$arguments334['htmlEscape'] = NULL;
$arguments334['arguments'] = NULL;
$arguments334['extensionName'] = NULL;
$renderChildrenClosure335 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments329['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments334, $renderChildrenClosure335, $renderingContext);
$arguments329['additionalAttributes'] = NULL;
$renderChildrenClosure336 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper337 = $self->getViewHelper('$viewHelper337', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper337->setArguments($arguments329);
$viewHelper337->setRenderingContext($renderingContext);
$viewHelper337->setRenderChildrenClosure($renderChildrenClosure336);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output328 .= $viewHelper337->initializeArgumentsAndRender();

$output328 .= '
					</li>
					<li>
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments338 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments339 = array();
// Rendering Array
$array340 = array();
$array340['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.numberOfPages', $renderingContext);
$arguments339['arguments'] = $array340;
$arguments339['action'] = NULL;
$arguments339['section'] = '';
$arguments339['format'] = '';
$arguments339['ajax'] = false;
$arguments339['addQueryStringMethod'] = NULL;
$renderChildrenClosure341 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper342 = $self->getViewHelper('$viewHelper342', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper342->setArguments($arguments339);
$viewHelper342->setRenderingContext($renderingContext);
$viewHelper342->setRenderChildrenClosure($renderChildrenClosure341);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments338['uri'] = $viewHelper342->initializeArgumentsAndRender();
$arguments338['icon'] = 'actions-view-paging-last';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments343 = array();
$arguments343['key'] = 'widget.pagination.last';
$arguments343['id'] = NULL;
$arguments343['default'] = NULL;
$arguments343['htmlEscape'] = NULL;
$arguments343['arguments'] = NULL;
$arguments343['extensionName'] = NULL;
$renderChildrenClosure344 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments338['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments343, $renderChildrenClosure344, $renderingContext);
$arguments338['additionalAttributes'] = NULL;
$renderChildrenClosure345 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper346 = $self->getViewHelper('$viewHelper346', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper346->setArguments($arguments338);
$viewHelper346->setRenderingContext($renderingContext);
$viewHelper346->setRenderChildrenClosure($renderChildrenClosure345);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output328 .= $viewHelper346->initializeArgumentsAndRender();

$output328 .= '
					</li>
				';
return $output328;
};

$output325 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments326, $renderChildrenClosure327, $renderingContext);

$output325 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments347 = array();
$renderChildrenClosure348 = function() use ($renderingContext, $self) {
$output349 = '';

$output349 .= '
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments350 = array();
$arguments350['uri'] = '';
$arguments350['icon'] = 'actions-view-paging-next';
$arguments350['title'] = '';
$arguments350['additionalAttributes'] = NULL;
$renderChildrenClosure351 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper352 = $self->getViewHelper('$viewHelper352', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper352->setArguments($arguments350);
$viewHelper352->setRenderingContext($renderingContext);
$viewHelper352->setRenderChildrenClosure($renderChildrenClosure351);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output349 .= $viewHelper352->initializeArgumentsAndRender();

$output349 .= '
						</span>
					</li>
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments353 = array();
$arguments353['uri'] = '';
$arguments353['icon'] = 'actions-view-paging-last';
$arguments353['title'] = '';
$arguments353['additionalAttributes'] = NULL;
$renderChildrenClosure354 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper355 = $self->getViewHelper('$viewHelper355', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper355->setArguments($arguments353);
$viewHelper355->setRenderingContext($renderingContext);
$viewHelper355->setRenderChildrenClosure($renderChildrenClosure354);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output349 .= $viewHelper355->initializeArgumentsAndRender();

$output349 .= '
						</span>
					</li>
				';
return $output349;
};

$output325 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments347, $renderChildrenClosure348, $renderingContext);

$output325 .= '
			';
return $output325;
};
$arguments323['__thenClosure'] = function() use ($renderingContext, $self) {
$output356 = '';

$output356 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments357 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments358 = array();
// Rendering Array
$array359 = array();
$array359['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.nextPage', $renderingContext);
$arguments358['arguments'] = $array359;
$arguments358['action'] = NULL;
$arguments358['section'] = '';
$arguments358['format'] = '';
$arguments358['ajax'] = false;
$arguments358['addQueryStringMethod'] = NULL;
$renderChildrenClosure360 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper361 = $self->getViewHelper('$viewHelper361', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper361->setArguments($arguments358);
$viewHelper361->setRenderingContext($renderingContext);
$viewHelper361->setRenderChildrenClosure($renderChildrenClosure360);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments357['uri'] = $viewHelper361->initializeArgumentsAndRender();
$arguments357['icon'] = 'actions-view-paging-next';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments362 = array();
$arguments362['key'] = 'widget.pagination.next';
$arguments362['id'] = NULL;
$arguments362['default'] = NULL;
$arguments362['htmlEscape'] = NULL;
$arguments362['arguments'] = NULL;
$arguments362['extensionName'] = NULL;
$renderChildrenClosure363 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments357['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments362, $renderChildrenClosure363, $renderingContext);
$arguments357['additionalAttributes'] = NULL;
$renderChildrenClosure364 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper365 = $self->getViewHelper('$viewHelper365', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper365->setArguments($arguments357);
$viewHelper365->setRenderingContext($renderingContext);
$viewHelper365->setRenderChildrenClosure($renderChildrenClosure364);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output356 .= $viewHelper365->initializeArgumentsAndRender();

$output356 .= '
					</li>
					<li>
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments366 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments367 = array();
// Rendering Array
$array368 = array();
$array368['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.numberOfPages', $renderingContext);
$arguments367['arguments'] = $array368;
$arguments367['action'] = NULL;
$arguments367['section'] = '';
$arguments367['format'] = '';
$arguments367['ajax'] = false;
$arguments367['addQueryStringMethod'] = NULL;
$renderChildrenClosure369 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper370 = $self->getViewHelper('$viewHelper370', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper370->setArguments($arguments367);
$viewHelper370->setRenderingContext($renderingContext);
$viewHelper370->setRenderChildrenClosure($renderChildrenClosure369);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments366['uri'] = $viewHelper370->initializeArgumentsAndRender();
$arguments366['icon'] = 'actions-view-paging-last';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments371 = array();
$arguments371['key'] = 'widget.pagination.last';
$arguments371['id'] = NULL;
$arguments371['default'] = NULL;
$arguments371['htmlEscape'] = NULL;
$arguments371['arguments'] = NULL;
$arguments371['extensionName'] = NULL;
$renderChildrenClosure372 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments366['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments371, $renderChildrenClosure372, $renderingContext);
$arguments366['additionalAttributes'] = NULL;
$renderChildrenClosure373 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper374 = $self->getViewHelper('$viewHelper374', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper374->setArguments($arguments366);
$viewHelper374->setRenderingContext($renderingContext);
$viewHelper374->setRenderChildrenClosure($renderChildrenClosure373);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output356 .= $viewHelper374->initializeArgumentsAndRender();

$output356 .= '
					</li>
				';
return $output356;
};
$arguments323['__elseClosure'] = function() use ($renderingContext, $self) {
$output375 = '';

$output375 .= '
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments376 = array();
$arguments376['uri'] = '';
$arguments376['icon'] = 'actions-view-paging-next';
$arguments376['title'] = '';
$arguments376['additionalAttributes'] = NULL;
$renderChildrenClosure377 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper378 = $self->getViewHelper('$viewHelper378', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper378->setArguments($arguments376);
$viewHelper378->setRenderingContext($renderingContext);
$viewHelper378->setRenderChildrenClosure($renderChildrenClosure377);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output375 .= $viewHelper378->initializeArgumentsAndRender();

$output375 .= '
						</span>
					</li>
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments379 = array();
$arguments379['uri'] = '';
$arguments379['icon'] = 'actions-view-paging-last';
$arguments379['title'] = '';
$arguments379['additionalAttributes'] = NULL;
$renderChildrenClosure380 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper381 = $self->getViewHelper('$viewHelper381', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper381->setArguments($arguments379);
$viewHelper381->setRenderingContext($renderingContext);
$viewHelper381->setRenderChildrenClosure($renderChildrenClosure380);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output375 .= $viewHelper381->initializeArgumentsAndRender();

$output375 .= '
						</span>
					</li>
				';
return $output375;
};
$viewHelper382 = $self->getViewHelper('$viewHelper382', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper382->setArguments($arguments323);
$viewHelper382->setRenderingContext($renderingContext);
$viewHelper382->setRenderChildrenClosure($renderChildrenClosure324);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output206 .= $viewHelper382->initializeArgumentsAndRender();

$output206 .= '
			<li>
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments383 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments384 = array();
// Rendering Array
$array385 = array();
$array385['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.current', $renderingContext);
$arguments384['arguments'] = $array385;
$arguments384['action'] = NULL;
$arguments384['section'] = '';
$arguments384['format'] = '';
$arguments384['ajax'] = false;
$arguments384['addQueryStringMethod'] = NULL;
$renderChildrenClosure386 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper387 = $self->getViewHelper('$viewHelper387', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper387->setArguments($arguments384);
$viewHelper387->setRenderingContext($renderingContext);
$viewHelper387->setRenderChildrenClosure($renderChildrenClosure386);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments383['uri'] = $viewHelper387->initializeArgumentsAndRender();
$arguments383['icon'] = 'actions-system-refresh';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments388 = array();
$arguments388['key'] = 'widget.pagination.refresh';
$arguments388['id'] = NULL;
$arguments388['default'] = NULL;
$arguments388['htmlEscape'] = NULL;
$arguments388['arguments'] = NULL;
$arguments388['extensionName'] = NULL;
$renderChildrenClosure389 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments383['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments388, $renderChildrenClosure389, $renderingContext);
$arguments383['additionalAttributes'] = NULL;
$renderChildrenClosure390 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper391 = $self->getViewHelper('$viewHelper391', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper391->setArguments($arguments383);
$viewHelper391->setRenderingContext($renderingContext);
$viewHelper391->setRenderChildrenClosure($renderChildrenClosure390);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output206 .= $viewHelper391->initializeArgumentsAndRender();

$output206 .= '
			</li>
		</ul>
	</nav>
';
return $output206;
};

$output186 .= '';

return $output186;
}


}
#1433275408    103809    