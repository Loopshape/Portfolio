<?php
class FluidCache_Standalone_template_file_SystemInformation_550e62300bb07b8e2ddcfb09f0e11f716b4bf87d extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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

$output0 .= '<ul class="dropdown-list" data-count="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments1 = array();
$arguments1['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'count', $renderingContext);
$arguments1['keepQuotes'] = false;
$arguments1['encoding'] = NULL;
$arguments1['doubleEncode'] = true;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
return NULL;
};
$value3 = ($arguments1['value'] !== NULL ? $arguments1['value'] : $renderChildrenClosure2());

$output0 .= (!is_string($value3) ? $value3 : htmlspecialchars($value3, ($arguments1['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments1['encoding'] !== NULL ? $arguments1['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments1['doubleEncode']));

$output0 .= '" data-severityclass="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments4 = array();
$arguments4['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'severityBadgeClass', $renderingContext);
$arguments4['keepQuotes'] = false;
$arguments4['encoding'] = NULL;
$arguments4['doubleEncode'] = true;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
return NULL;
};
$value6 = ($arguments4['value'] !== NULL ? $arguments4['value'] : $renderChildrenClosure5());

$output0 .= (!is_string($value6) ? $value6 : htmlspecialchars($value6, ($arguments4['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments4['encoding'] !== NULL ? $arguments4['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments4['doubleEncode']));

$output0 .= '">
	<li class="dropdown-header">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments7 = array();
$arguments7['key'] = 'systemmessage.header';
$arguments7['id'] = NULL;
$arguments7['default'] = NULL;
$arguments7['htmlEscape'] = NULL;
$arguments7['arguments'] = NULL;
$arguments7['extensionName'] = NULL;
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments7, $renderChildrenClosure8, $renderingContext);

$output0 .= '</li>
	<li id="systeminformation_installtool" class="dropdown-intro typo3-module-menu-item submodule mod-system_InstallInstall" data-modulename="system_InstallInstall">
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments9 = array();
$arguments9['key'] = 'systemmessage.intro';
// Rendering Array
$array10 = array();
$array10['0'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'installToolUrl', $renderingContext);
$arguments9['arguments'] = $array10;
$arguments9['id'] = NULL;
$arguments9['default'] = NULL;
$arguments9['htmlEscape'] = NULL;
$arguments9['extensionName'] = NULL;
$renderChildrenClosure11 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments9, $renderChildrenClosure11, $renderingContext);

$output0 .= '
	</li>
	<li>
		<dl class="dl-horizontal">
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments12 = array();
$arguments12['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'systemInformation', $renderingContext);
$arguments12['as'] = 'info';
$arguments12['key'] = '';
$arguments12['reverse'] = false;
$arguments12['iteration'] = NULL;
$renderChildrenClosure13 = function() use ($renderingContext, $self) {
$output14 = '';

$output14 .= '
				<dt title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments15 = array();
$arguments15['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'info.title', $renderingContext);
$arguments15['keepQuotes'] = false;
$arguments15['encoding'] = NULL;
$arguments15['doubleEncode'] = true;
$renderChildrenClosure16 = function() use ($renderingContext, $self) {
return NULL;
};
$value17 = ($arguments15['value'] !== NULL ? $arguments15['value'] : $renderChildrenClosure16());

$output14 .= (!is_string($value17) ? $value17 : htmlspecialchars($value17, ($arguments15['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments15['encoding'] !== NULL ? $arguments15['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments15['doubleEncode']));

$output14 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper
$arguments18 = array();
$arguments18['value'] = NULL;
$renderChildrenClosure19 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'info.icon', $renderingContext);
};

$output14 .= TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper::renderStatic($arguments18, $renderChildrenClosure19, $renderingContext);

$output14 .= ' ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments20 = array();
$arguments20['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'info.title', $renderingContext);
$arguments20['keepQuotes'] = false;
$arguments20['encoding'] = NULL;
$arguments20['doubleEncode'] = true;
$renderChildrenClosure21 = function() use ($renderingContext, $self) {
return NULL;
};
$value22 = ($arguments20['value'] !== NULL ? $arguments20['value'] : $renderChildrenClosure21());

$output14 .= (!is_string($value22) ? $value22 : htmlspecialchars($value22, ($arguments20['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments20['encoding'] !== NULL ? $arguments20['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments20['doubleEncode']));

$output14 .= '</dt>
				<dd>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments23 = array();
// Rendering Boolean node
$arguments23['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'info.status', $renderingContext));
$arguments23['then'] = NULL;
$arguments23['else'] = NULL;
$renderChildrenClosure24 = function() use ($renderingContext, $self) {
$output25 = '';

$output25 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments26 = array();
$renderChildrenClosure27 = function() use ($renderingContext, $self) {
$output28 = '';

$output28 .= '
						<span class="text-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments29 = array();
$arguments29['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'info.status', $renderingContext);
$arguments29['keepQuotes'] = false;
$arguments29['encoding'] = NULL;
$arguments29['doubleEncode'] = true;
$renderChildrenClosure30 = function() use ($renderingContext, $self) {
return NULL;
};
$value31 = ($arguments29['value'] !== NULL ? $arguments29['value'] : $renderChildrenClosure30());

$output28 .= (!is_string($value31) ? $value31 : htmlspecialchars($value31, ($arguments29['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments29['encoding'] !== NULL ? $arguments29['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments29['doubleEncode']));

$output28 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments32 = array();
$arguments32['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'info.value', $renderingContext);
$arguments32['keepQuotes'] = false;
$arguments32['encoding'] = NULL;
$arguments32['doubleEncode'] = true;
$renderChildrenClosure33 = function() use ($renderingContext, $self) {
return NULL;
};
$value34 = ($arguments32['value'] !== NULL ? $arguments32['value'] : $renderChildrenClosure33());

$output28 .= (!is_string($value34) ? $value34 : htmlspecialchars($value34, ($arguments32['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments32['encoding'] !== NULL ? $arguments32['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments32['doubleEncode']));

$output28 .= '</span>
					';
return $output28;
};

$output25 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments26, $renderChildrenClosure27, $renderingContext);

$output25 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments35 = array();
$renderChildrenClosure36 = function() use ($renderingContext, $self) {
$output37 = '';

$output37 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments38 = array();
$arguments38['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'info.value', $renderingContext);
$arguments38['keepQuotes'] = false;
$arguments38['encoding'] = NULL;
$arguments38['doubleEncode'] = true;
$renderChildrenClosure39 = function() use ($renderingContext, $self) {
return NULL;
};
$value40 = ($arguments38['value'] !== NULL ? $arguments38['value'] : $renderChildrenClosure39());

$output37 .= (!is_string($value40) ? $value40 : htmlspecialchars($value40, ($arguments38['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments38['encoding'] !== NULL ? $arguments38['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments38['doubleEncode']));

$output37 .= '
					';
return $output37;
};

$output25 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments35, $renderChildrenClosure36, $renderingContext);

$output25 .= '
				';
return $output25;
};
$arguments23['__thenClosure'] = function() use ($renderingContext, $self) {
$output41 = '';

$output41 .= '
						<span class="text-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments42 = array();
$arguments42['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'info.status', $renderingContext);
$arguments42['keepQuotes'] = false;
$arguments42['encoding'] = NULL;
$arguments42['doubleEncode'] = true;
$renderChildrenClosure43 = function() use ($renderingContext, $self) {
return NULL;
};
$value44 = ($arguments42['value'] !== NULL ? $arguments42['value'] : $renderChildrenClosure43());

$output41 .= (!is_string($value44) ? $value44 : htmlspecialchars($value44, ($arguments42['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments42['encoding'] !== NULL ? $arguments42['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments42['doubleEncode']));

$output41 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments45 = array();
$arguments45['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'info.value', $renderingContext);
$arguments45['keepQuotes'] = false;
$arguments45['encoding'] = NULL;
$arguments45['doubleEncode'] = true;
$renderChildrenClosure46 = function() use ($renderingContext, $self) {
return NULL;
};
$value47 = ($arguments45['value'] !== NULL ? $arguments45['value'] : $renderChildrenClosure46());

$output41 .= (!is_string($value47) ? $value47 : htmlspecialchars($value47, ($arguments45['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments45['encoding'] !== NULL ? $arguments45['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments45['doubleEncode']));

$output41 .= '</span>
					';
return $output41;
};
$arguments23['__elseClosure'] = function() use ($renderingContext, $self) {
$output48 = '';

$output48 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments49 = array();
$arguments49['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'info.value', $renderingContext);
$arguments49['keepQuotes'] = false;
$arguments49['encoding'] = NULL;
$arguments49['doubleEncode'] = true;
$renderChildrenClosure50 = function() use ($renderingContext, $self) {
return NULL;
};
$value51 = ($arguments49['value'] !== NULL ? $arguments49['value'] : $renderChildrenClosure50());

$output48 .= (!is_string($value51) ? $value51 : htmlspecialchars($value51, ($arguments49['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments49['encoding'] !== NULL ? $arguments49['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments49['doubleEncode']));

$output48 .= '
					';
return $output48;
};
$viewHelper52 = $self->getViewHelper('$viewHelper52', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper52->setArguments($arguments23);
$viewHelper52->setRenderingContext($renderingContext);
$viewHelper52->setRenderChildrenClosure($renderChildrenClosure24);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output14 .= $viewHelper52->initializeArgumentsAndRender();

$output14 .= '</dd>
			';
return $output14;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments12, $renderChildrenClosure13, $renderingContext);

$output0 .= '
		</dl>
	</li>
	<li class="divider"></li>
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments53 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CountViewHelper
$arguments54 = array();
$arguments54['subject'] = NULL;
$renderChildrenClosure55 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'messages', $renderingContext);
};
$arguments53['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('>', TYPO3\CMS\Fluid\ViewHelpers\CountViewHelper::renderStatic($arguments54, $renderChildrenClosure55, $renderingContext), 0);
$arguments53['then'] = NULL;
$arguments53['else'] = NULL;
$renderChildrenClosure56 = function() use ($renderingContext, $self) {
$output57 = '';

$output57 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments58 = array();
$renderChildrenClosure59 = function() use ($renderingContext, $self) {
$output60 = '';

$output60 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments61 = array();
$arguments61['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'messages', $renderingContext);
$arguments61['as'] = 'message';
$arguments61['key'] = '';
$arguments61['reverse'] = false;
$arguments61['iteration'] = NULL;
$renderChildrenClosure62 = function() use ($renderingContext, $self) {
$output63 = '';

$output63 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments64 = array();
// Rendering Boolean node
$arguments64['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.module', $renderingContext));
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
						<li id="systeminformation_';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments70 = array();
$arguments70['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.module', $renderingContext);
$arguments70['keepQuotes'] = false;
$arguments70['encoding'] = NULL;
$arguments70['doubleEncode'] = true;
$renderChildrenClosure71 = function() use ($renderingContext, $self) {
return NULL;
};
$value72 = ($arguments70['value'] !== NULL ? $arguments70['value'] : $renderChildrenClosure71());

$output69 .= (!is_string($value72) ? $value72 : htmlspecialchars($value72, ($arguments70['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments70['encoding'] !== NULL ? $arguments70['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments70['doubleEncode']));

$output69 .= '" class="t3js-systeminformation-module dropdown-intro typo3-module-menu-item submodule mod-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments73 = array();
$arguments73['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.module', $renderingContext);
$arguments73['keepQuotes'] = false;
$arguments73['encoding'] = NULL;
$arguments73['doubleEncode'] = true;
$renderChildrenClosure74 = function() use ($renderingContext, $self) {
return NULL;
};
$value75 = ($arguments73['value'] !== NULL ? $arguments73['value'] : $renderChildrenClosure74());

$output69 .= (!is_string($value75) ? $value75 : htmlspecialchars($value75, ($arguments73['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments73['encoding'] !== NULL ? $arguments73['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments73['doubleEncode']));

$output69 .= '" data-modulename="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments76 = array();
$arguments76['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.module', $renderingContext);
$arguments76['keepQuotes'] = false;
$arguments76['encoding'] = NULL;
$arguments76['doubleEncode'] = true;
$renderChildrenClosure77 = function() use ($renderingContext, $self) {
return NULL;
};
$value78 = ($arguments76['value'] !== NULL ? $arguments76['value'] : $renderChildrenClosure77());

$output69 .= (!is_string($value78) ? $value78 : htmlspecialchars($value78, ($arguments76['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments76['encoding'] !== NULL ? $arguments76['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments76['doubleEncode']));

$output69 .= '">
							<span class="text-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments79 = array();
$arguments79['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.status', $renderingContext);
$arguments79['keepQuotes'] = false;
$arguments79['encoding'] = NULL;
$arguments79['doubleEncode'] = true;
$renderChildrenClosure80 = function() use ($renderingContext, $self) {
return NULL;
};
$value81 = ($arguments79['value'] !== NULL ? $arguments79['value'] : $renderChildrenClosure80());

$output69 .= (!is_string($value81) ? $value81 : htmlspecialchars($value81, ($arguments79['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments79['encoding'] !== NULL ? $arguments79['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments79['doubleEncode']));

$output69 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper
$arguments82 = array();
$arguments82['value'] = NULL;
$renderChildrenClosure83 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.text', $renderingContext);
};

$output69 .= TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper::renderStatic($arguments82, $renderChildrenClosure83, $renderingContext);

$output69 .= '</span>
						</li>
					';
return $output69;
};

$output66 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments67, $renderChildrenClosure68, $renderingContext);

$output66 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments84 = array();
$renderChildrenClosure85 = function() use ($renderingContext, $self) {
$output86 = '';

$output86 .= '
						<li>
							<span class="text-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments87 = array();
$arguments87['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.status', $renderingContext);
$arguments87['keepQuotes'] = false;
$arguments87['encoding'] = NULL;
$arguments87['doubleEncode'] = true;
$renderChildrenClosure88 = function() use ($renderingContext, $self) {
return NULL;
};
$value89 = ($arguments87['value'] !== NULL ? $arguments87['value'] : $renderChildrenClosure88());

$output86 .= (!is_string($value89) ? $value89 : htmlspecialchars($value89, ($arguments87['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments87['encoding'] !== NULL ? $arguments87['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments87['doubleEncode']));

$output86 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper
$arguments90 = array();
$arguments90['value'] = NULL;
$renderChildrenClosure91 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.text', $renderingContext);
};

$output86 .= TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper::renderStatic($arguments90, $renderChildrenClosure91, $renderingContext);

$output86 .= '</span>
						</li>
					';
return $output86;
};

$output66 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments84, $renderChildrenClosure85, $renderingContext);

$output66 .= '
				';
return $output66;
};
$arguments64['__thenClosure'] = function() use ($renderingContext, $self) {
$output92 = '';

$output92 .= '
						<li id="systeminformation_';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments93 = array();
$arguments93['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.module', $renderingContext);
$arguments93['keepQuotes'] = false;
$arguments93['encoding'] = NULL;
$arguments93['doubleEncode'] = true;
$renderChildrenClosure94 = function() use ($renderingContext, $self) {
return NULL;
};
$value95 = ($arguments93['value'] !== NULL ? $arguments93['value'] : $renderChildrenClosure94());

$output92 .= (!is_string($value95) ? $value95 : htmlspecialchars($value95, ($arguments93['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments93['encoding'] !== NULL ? $arguments93['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments93['doubleEncode']));

$output92 .= '" class="t3js-systeminformation-module dropdown-intro typo3-module-menu-item submodule mod-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments96 = array();
$arguments96['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.module', $renderingContext);
$arguments96['keepQuotes'] = false;
$arguments96['encoding'] = NULL;
$arguments96['doubleEncode'] = true;
$renderChildrenClosure97 = function() use ($renderingContext, $self) {
return NULL;
};
$value98 = ($arguments96['value'] !== NULL ? $arguments96['value'] : $renderChildrenClosure97());

$output92 .= (!is_string($value98) ? $value98 : htmlspecialchars($value98, ($arguments96['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments96['encoding'] !== NULL ? $arguments96['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments96['doubleEncode']));

$output92 .= '" data-modulename="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments99 = array();
$arguments99['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.module', $renderingContext);
$arguments99['keepQuotes'] = false;
$arguments99['encoding'] = NULL;
$arguments99['doubleEncode'] = true;
$renderChildrenClosure100 = function() use ($renderingContext, $self) {
return NULL;
};
$value101 = ($arguments99['value'] !== NULL ? $arguments99['value'] : $renderChildrenClosure100());

$output92 .= (!is_string($value101) ? $value101 : htmlspecialchars($value101, ($arguments99['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments99['encoding'] !== NULL ? $arguments99['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments99['doubleEncode']));

$output92 .= '">
							<span class="text-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments102 = array();
$arguments102['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.status', $renderingContext);
$arguments102['keepQuotes'] = false;
$arguments102['encoding'] = NULL;
$arguments102['doubleEncode'] = true;
$renderChildrenClosure103 = function() use ($renderingContext, $self) {
return NULL;
};
$value104 = ($arguments102['value'] !== NULL ? $arguments102['value'] : $renderChildrenClosure103());

$output92 .= (!is_string($value104) ? $value104 : htmlspecialchars($value104, ($arguments102['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments102['encoding'] !== NULL ? $arguments102['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments102['doubleEncode']));

$output92 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper
$arguments105 = array();
$arguments105['value'] = NULL;
$renderChildrenClosure106 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.text', $renderingContext);
};

$output92 .= TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper::renderStatic($arguments105, $renderChildrenClosure106, $renderingContext);

$output92 .= '</span>
						</li>
					';
return $output92;
};
$arguments64['__elseClosure'] = function() use ($renderingContext, $self) {
$output107 = '';

$output107 .= '
						<li>
							<span class="text-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments108 = array();
$arguments108['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.status', $renderingContext);
$arguments108['keepQuotes'] = false;
$arguments108['encoding'] = NULL;
$arguments108['doubleEncode'] = true;
$renderChildrenClosure109 = function() use ($renderingContext, $self) {
return NULL;
};
$value110 = ($arguments108['value'] !== NULL ? $arguments108['value'] : $renderChildrenClosure109());

$output107 .= (!is_string($value110) ? $value110 : htmlspecialchars($value110, ($arguments108['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments108['encoding'] !== NULL ? $arguments108['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments108['doubleEncode']));

$output107 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper
$arguments111 = array();
$arguments111['value'] = NULL;
$renderChildrenClosure112 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.text', $renderingContext);
};

$output107 .= TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper::renderStatic($arguments111, $renderChildrenClosure112, $renderingContext);

$output107 .= '</span>
						</li>
					';
return $output107;
};
$viewHelper113 = $self->getViewHelper('$viewHelper113', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper113->setArguments($arguments64);
$viewHelper113->setRenderingContext($renderingContext);
$viewHelper113->setRenderChildrenClosure($renderChildrenClosure65);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output63 .= $viewHelper113->initializeArgumentsAndRender();

$output63 .= '
			';
return $output63;
};

$output60 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments61, $renderChildrenClosure62, $renderingContext);

$output60 .= '
		';
return $output60;
};

$output57 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments58, $renderChildrenClosure59, $renderingContext);

$output57 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments114 = array();
$renderChildrenClosure115 = function() use ($renderingContext, $self) {
$output116 = '';

$output116 .= '
			<li><span class="text-success">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\Nl2brViewHelper
$arguments117 = array();
$arguments117['value'] = NULL;
$renderChildrenClosure118 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments119 = array();
$arguments119['key'] = 'systemmessage.allgood';
$arguments119['id'] = NULL;
$arguments119['default'] = NULL;
$arguments119['htmlEscape'] = NULL;
$arguments119['arguments'] = NULL;
$arguments119['extensionName'] = NULL;
$renderChildrenClosure120 = function() use ($renderingContext, $self) {
return NULL;
};
return TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments119, $renderChildrenClosure120, $renderingContext);
};

$output116 .= TYPO3\CMS\Fluid\ViewHelpers\Format\Nl2brViewHelper::renderStatic($arguments117, $renderChildrenClosure118, $renderingContext);

$output116 .= '</span></li>
		';
return $output116;
};

$output57 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments114, $renderChildrenClosure115, $renderingContext);

$output57 .= '
	';
return $output57;
};
$arguments53['__thenClosure'] = function() use ($renderingContext, $self) {
$output121 = '';

$output121 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments122 = array();
$arguments122['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'messages', $renderingContext);
$arguments122['as'] = 'message';
$arguments122['key'] = '';
$arguments122['reverse'] = false;
$arguments122['iteration'] = NULL;
$renderChildrenClosure123 = function() use ($renderingContext, $self) {
$output124 = '';

$output124 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments125 = array();
// Rendering Boolean node
$arguments125['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.module', $renderingContext));
$arguments125['then'] = NULL;
$arguments125['else'] = NULL;
$renderChildrenClosure126 = function() use ($renderingContext, $self) {
$output127 = '';

$output127 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments128 = array();
$renderChildrenClosure129 = function() use ($renderingContext, $self) {
$output130 = '';

$output130 .= '
						<li id="systeminformation_';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments131 = array();
$arguments131['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.module', $renderingContext);
$arguments131['keepQuotes'] = false;
$arguments131['encoding'] = NULL;
$arguments131['doubleEncode'] = true;
$renderChildrenClosure132 = function() use ($renderingContext, $self) {
return NULL;
};
$value133 = ($arguments131['value'] !== NULL ? $arguments131['value'] : $renderChildrenClosure132());

$output130 .= (!is_string($value133) ? $value133 : htmlspecialchars($value133, ($arguments131['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments131['encoding'] !== NULL ? $arguments131['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments131['doubleEncode']));

$output130 .= '" class="t3js-systeminformation-module dropdown-intro typo3-module-menu-item submodule mod-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments134 = array();
$arguments134['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.module', $renderingContext);
$arguments134['keepQuotes'] = false;
$arguments134['encoding'] = NULL;
$arguments134['doubleEncode'] = true;
$renderChildrenClosure135 = function() use ($renderingContext, $self) {
return NULL;
};
$value136 = ($arguments134['value'] !== NULL ? $arguments134['value'] : $renderChildrenClosure135());

$output130 .= (!is_string($value136) ? $value136 : htmlspecialchars($value136, ($arguments134['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments134['encoding'] !== NULL ? $arguments134['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments134['doubleEncode']));

$output130 .= '" data-modulename="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments137 = array();
$arguments137['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.module', $renderingContext);
$arguments137['keepQuotes'] = false;
$arguments137['encoding'] = NULL;
$arguments137['doubleEncode'] = true;
$renderChildrenClosure138 = function() use ($renderingContext, $self) {
return NULL;
};
$value139 = ($arguments137['value'] !== NULL ? $arguments137['value'] : $renderChildrenClosure138());

$output130 .= (!is_string($value139) ? $value139 : htmlspecialchars($value139, ($arguments137['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments137['encoding'] !== NULL ? $arguments137['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments137['doubleEncode']));

$output130 .= '">
							<span class="text-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments140 = array();
$arguments140['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.status', $renderingContext);
$arguments140['keepQuotes'] = false;
$arguments140['encoding'] = NULL;
$arguments140['doubleEncode'] = true;
$renderChildrenClosure141 = function() use ($renderingContext, $self) {
return NULL;
};
$value142 = ($arguments140['value'] !== NULL ? $arguments140['value'] : $renderChildrenClosure141());

$output130 .= (!is_string($value142) ? $value142 : htmlspecialchars($value142, ($arguments140['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments140['encoding'] !== NULL ? $arguments140['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments140['doubleEncode']));

$output130 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper
$arguments143 = array();
$arguments143['value'] = NULL;
$renderChildrenClosure144 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.text', $renderingContext);
};

$output130 .= TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper::renderStatic($arguments143, $renderChildrenClosure144, $renderingContext);

$output130 .= '</span>
						</li>
					';
return $output130;
};

$output127 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments128, $renderChildrenClosure129, $renderingContext);

$output127 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments145 = array();
$renderChildrenClosure146 = function() use ($renderingContext, $self) {
$output147 = '';

$output147 .= '
						<li>
							<span class="text-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments148 = array();
$arguments148['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.status', $renderingContext);
$arguments148['keepQuotes'] = false;
$arguments148['encoding'] = NULL;
$arguments148['doubleEncode'] = true;
$renderChildrenClosure149 = function() use ($renderingContext, $self) {
return NULL;
};
$value150 = ($arguments148['value'] !== NULL ? $arguments148['value'] : $renderChildrenClosure149());

$output147 .= (!is_string($value150) ? $value150 : htmlspecialchars($value150, ($arguments148['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments148['encoding'] !== NULL ? $arguments148['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments148['doubleEncode']));

$output147 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper
$arguments151 = array();
$arguments151['value'] = NULL;
$renderChildrenClosure152 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.text', $renderingContext);
};

$output147 .= TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper::renderStatic($arguments151, $renderChildrenClosure152, $renderingContext);

$output147 .= '</span>
						</li>
					';
return $output147;
};

$output127 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments145, $renderChildrenClosure146, $renderingContext);

$output127 .= '
				';
return $output127;
};
$arguments125['__thenClosure'] = function() use ($renderingContext, $self) {
$output153 = '';

$output153 .= '
						<li id="systeminformation_';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments154 = array();
$arguments154['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.module', $renderingContext);
$arguments154['keepQuotes'] = false;
$arguments154['encoding'] = NULL;
$arguments154['doubleEncode'] = true;
$renderChildrenClosure155 = function() use ($renderingContext, $self) {
return NULL;
};
$value156 = ($arguments154['value'] !== NULL ? $arguments154['value'] : $renderChildrenClosure155());

$output153 .= (!is_string($value156) ? $value156 : htmlspecialchars($value156, ($arguments154['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments154['encoding'] !== NULL ? $arguments154['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments154['doubleEncode']));

$output153 .= '" class="t3js-systeminformation-module dropdown-intro typo3-module-menu-item submodule mod-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments157 = array();
$arguments157['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.module', $renderingContext);
$arguments157['keepQuotes'] = false;
$arguments157['encoding'] = NULL;
$arguments157['doubleEncode'] = true;
$renderChildrenClosure158 = function() use ($renderingContext, $self) {
return NULL;
};
$value159 = ($arguments157['value'] !== NULL ? $arguments157['value'] : $renderChildrenClosure158());

$output153 .= (!is_string($value159) ? $value159 : htmlspecialchars($value159, ($arguments157['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments157['encoding'] !== NULL ? $arguments157['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments157['doubleEncode']));

$output153 .= '" data-modulename="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments160 = array();
$arguments160['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.module', $renderingContext);
$arguments160['keepQuotes'] = false;
$arguments160['encoding'] = NULL;
$arguments160['doubleEncode'] = true;
$renderChildrenClosure161 = function() use ($renderingContext, $self) {
return NULL;
};
$value162 = ($arguments160['value'] !== NULL ? $arguments160['value'] : $renderChildrenClosure161());

$output153 .= (!is_string($value162) ? $value162 : htmlspecialchars($value162, ($arguments160['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments160['encoding'] !== NULL ? $arguments160['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments160['doubleEncode']));

$output153 .= '">
							<span class="text-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments163 = array();
$arguments163['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.status', $renderingContext);
$arguments163['keepQuotes'] = false;
$arguments163['encoding'] = NULL;
$arguments163['doubleEncode'] = true;
$renderChildrenClosure164 = function() use ($renderingContext, $self) {
return NULL;
};
$value165 = ($arguments163['value'] !== NULL ? $arguments163['value'] : $renderChildrenClosure164());

$output153 .= (!is_string($value165) ? $value165 : htmlspecialchars($value165, ($arguments163['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments163['encoding'] !== NULL ? $arguments163['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments163['doubleEncode']));

$output153 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper
$arguments166 = array();
$arguments166['value'] = NULL;
$renderChildrenClosure167 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.text', $renderingContext);
};

$output153 .= TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper::renderStatic($arguments166, $renderChildrenClosure167, $renderingContext);

$output153 .= '</span>
						</li>
					';
return $output153;
};
$arguments125['__elseClosure'] = function() use ($renderingContext, $self) {
$output168 = '';

$output168 .= '
						<li>
							<span class="text-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments169 = array();
$arguments169['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.status', $renderingContext);
$arguments169['keepQuotes'] = false;
$arguments169['encoding'] = NULL;
$arguments169['doubleEncode'] = true;
$renderChildrenClosure170 = function() use ($renderingContext, $self) {
return NULL;
};
$value171 = ($arguments169['value'] !== NULL ? $arguments169['value'] : $renderChildrenClosure170());

$output168 .= (!is_string($value171) ? $value171 : htmlspecialchars($value171, ($arguments169['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments169['encoding'] !== NULL ? $arguments169['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments169['doubleEncode']));

$output168 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper
$arguments172 = array();
$arguments172['value'] = NULL;
$renderChildrenClosure173 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'message.text', $renderingContext);
};

$output168 .= TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper::renderStatic($arguments172, $renderChildrenClosure173, $renderingContext);

$output168 .= '</span>
						</li>
					';
return $output168;
};
$viewHelper174 = $self->getViewHelper('$viewHelper174', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper174->setArguments($arguments125);
$viewHelper174->setRenderingContext($renderingContext);
$viewHelper174->setRenderChildrenClosure($renderChildrenClosure126);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output124 .= $viewHelper174->initializeArgumentsAndRender();

$output124 .= '
			';
return $output124;
};

$output121 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments122, $renderChildrenClosure123, $renderingContext);

$output121 .= '
		';
return $output121;
};
$arguments53['__elseClosure'] = function() use ($renderingContext, $self) {
$output175 = '';

$output175 .= '
			<li><span class="text-success">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\Nl2brViewHelper
$arguments176 = array();
$arguments176['value'] = NULL;
$renderChildrenClosure177 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments178 = array();
$arguments178['key'] = 'systemmessage.allgood';
$arguments178['id'] = NULL;
$arguments178['default'] = NULL;
$arguments178['htmlEscape'] = NULL;
$arguments178['arguments'] = NULL;
$arguments178['extensionName'] = NULL;
$renderChildrenClosure179 = function() use ($renderingContext, $self) {
return NULL;
};
return TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments178, $renderChildrenClosure179, $renderingContext);
};

$output175 .= TYPO3\CMS\Fluid\ViewHelpers\Format\Nl2brViewHelper::renderStatic($arguments176, $renderChildrenClosure177, $renderingContext);

$output175 .= '</span></li>
		';
return $output175;
};
$viewHelper180 = $self->getViewHelper('$viewHelper180', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper180->setArguments($arguments53);
$viewHelper180->setRenderingContext($renderingContext);
$viewHelper180->setRenderChildrenClosure($renderChildrenClosure56);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper180->initializeArgumentsAndRender();

$output0 .= '
</ul>';

return $output0;
}


}
#1437088570    48416     