<?php
class FluidCache_IndexedSearch_Administration_action_index_fb255834a908ccef7e7ead6792adae2fee347dbb extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// @todo
	return new \TYPO3\CMS\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {

return 'Administration';
}
public function hasLayout() {
return TRUE;
}

/**
 * section Content
 */
public function section_4f9be057f0ea5d2ba72fd2c810e8d7b9aa98b469(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= '
	<p class="lead">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments1 = array();
$arguments1['key'] = 'administration.index.description';
$arguments1['id'] = NULL;
$arguments1['default'] = NULL;
$arguments1['htmlEscape'] = NULL;
$arguments1['arguments'] = NULL;
$arguments1['extensionName'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments1, $renderChildrenClosure2, $renderingContext);

$output0 .= '</p>

	<div class="row">
		<div class="col-md-6">
			<h4>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments3 = array();
$arguments3['key'] = 'administration.statistics.header';
$arguments3['id'] = NULL;
$arguments3['default'] = NULL;
$arguments3['htmlEscape'] = NULL;
$arguments3['arguments'] = NULL;
$arguments3['extensionName'] = NULL;
$renderChildrenClosure4 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments3, $renderChildrenClosure4, $renderingContext);

$output0 .= '</h4>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments5 = array();
$arguments5['key'] = 'administration.statistics.name';
$arguments5['id'] = NULL;
$arguments5['default'] = NULL;
$arguments5['htmlEscape'] = NULL;
$arguments5['arguments'] = NULL;
$arguments5['extensionName'] = NULL;
$renderChildrenClosure6 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments5, $renderChildrenClosure6, $renderingContext);

$output0 .= '</th>
						<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments7 = array();
$arguments7['key'] = 'administration.statistics.count';
$arguments7['id'] = NULL;
$arguments7['default'] = NULL;
$arguments7['htmlEscape'] = NULL;
$arguments7['arguments'] = NULL;
$arguments7['extensionName'] = NULL;
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments7, $renderChildrenClosure8, $renderingContext);

$output0 .= '</th>
					</tr>
				</thead>
				<tbody>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments9 = array();
$arguments9['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'records', $renderingContext);
$arguments9['as'] = 'count';
$arguments9['key'] = 'name';
$arguments9['reverse'] = false;
$arguments9['iteration'] = NULL;
$renderChildrenClosure10 = function() use ($renderingContext, $self) {
$output11 = '';

$output11 .= '
						<tr>
							<td>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments12 = array();
$arguments12['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'name', $renderingContext);
$arguments12['keepQuotes'] = false;
$arguments12['encoding'] = NULL;
$arguments12['doubleEncode'] = true;
$renderChildrenClosure13 = function() use ($renderingContext, $self) {
return NULL;
};
$value14 = ($arguments12['value'] !== NULL ? $arguments12['value'] : $renderChildrenClosure13());

$output11 .= (!is_string($value14) ? $value14 : htmlspecialchars($value14, ($arguments12['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments12['encoding'] !== NULL ? $arguments12['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments12['doubleEncode']));

$output11 .= '</td>
							<td>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments15 = array();
$arguments15['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'count', $renderingContext);
$arguments15['keepQuotes'] = false;
$arguments15['encoding'] = NULL;
$arguments15['doubleEncode'] = true;
$renderChildrenClosure16 = function() use ($renderingContext, $self) {
return NULL;
};
$value17 = ($arguments15['value'] !== NULL ? $arguments15['value'] : $renderChildrenClosure16());

$output11 .= (!is_string($value17) ? $value17 : htmlspecialchars($value17, ($arguments15['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments15['encoding'] !== NULL ? $arguments15['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments15['doubleEncode']));

$output11 .= '</td>
						</tr>
					';
return $output11;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments9, $renderChildrenClosure10, $renderingContext);

$output0 .= '
				</tbody>
			</table>
		</div>
		<div class="col-md-6">
			<h4>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments18 = array();
$arguments18['key'] = 'administration.statistics.headerTypes';
$arguments18['id'] = NULL;
$arguments18['default'] = NULL;
$arguments18['htmlEscape'] = NULL;
$arguments18['arguments'] = NULL;
$arguments18['extensionName'] = NULL;
$renderChildrenClosure19 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments18, $renderChildrenClosure19, $renderingContext);

$output0 .= '</h4>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments20 = array();
$arguments20['key'] = 'administration.statistics.name';
$arguments20['id'] = NULL;
$arguments20['default'] = NULL;
$arguments20['htmlEscape'] = NULL;
$arguments20['arguments'] = NULL;
$arguments20['extensionName'] = NULL;
$renderChildrenClosure21 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments20, $renderChildrenClosure21, $renderingContext);

$output0 .= '</th>
						<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments22 = array();
$arguments22['key'] = 'administration.statistics.count';
$arguments22['id'] = NULL;
$arguments22['default'] = NULL;
$arguments22['htmlEscape'] = NULL;
$arguments22['arguments'] = NULL;
$arguments22['extensionName'] = NULL;
$renderChildrenClosure23 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments22, $renderChildrenClosure23, $renderingContext);

$output0 .= '</th>
					</tr>
				</thead>
				<tbody>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments24 = array();
$arguments24['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'phash', $renderingContext);
$arguments24['as'] = 'data';
$arguments24['key'] = '';
$arguments24['reverse'] = false;
$arguments24['iteration'] = NULL;
$renderChildrenClosure25 = function() use ($renderingContext, $self) {
$output26 = '';

$output26 .= '
						<tr>
							<td>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments27 = array();
$arguments27['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'data.name', $renderingContext);
$arguments27['keepQuotes'] = false;
$arguments27['encoding'] = NULL;
$arguments27['doubleEncode'] = true;
$renderChildrenClosure28 = function() use ($renderingContext, $self) {
return NULL;
};
$value29 = ($arguments27['value'] !== NULL ? $arguments27['value'] : $renderChildrenClosure28());

$output26 .= (!is_string($value29) ? $value29 : htmlspecialchars($value29, ($arguments27['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments27['encoding'] !== NULL ? $arguments27['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments27['doubleEncode']));

$output26 .= ' (';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments30 = array();
$arguments30['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'data.type', $renderingContext);
$arguments30['keepQuotes'] = false;
$arguments30['encoding'] = NULL;
$arguments30['doubleEncode'] = true;
$renderChildrenClosure31 = function() use ($renderingContext, $self) {
return NULL;
};
$value32 = ($arguments30['value'] !== NULL ? $arguments30['value'] : $renderChildrenClosure31());

$output26 .= (!is_string($value32) ? $value32 : htmlspecialchars($value32, ($arguments30['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments30['encoding'] !== NULL ? $arguments30['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments30['doubleEncode']));

$output26 .= ')</td>
							<td>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments33 = array();
$arguments33['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'data.count', $renderingContext);
$arguments33['keepQuotes'] = false;
$arguments33['encoding'] = NULL;
$arguments33['doubleEncode'] = true;
$renderChildrenClosure34 = function() use ($renderingContext, $self) {
return NULL;
};
$value35 = ($arguments33['value'] !== NULL ? $arguments33['value'] : $renderChildrenClosure34());

$output26 .= (!is_string($value35) ? $value35 : htmlspecialchars($value35, ($arguments33['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments33['encoding'] !== NULL ? $arguments33['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments33['doubleEncode']));

$output26 .= ' / ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments36 = array();
$arguments36['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'data.uniqueCount', $renderingContext);
$arguments36['keepQuotes'] = false;
$arguments36['encoding'] = NULL;
$arguments36['doubleEncode'] = true;
$renderChildrenClosure37 = function() use ($renderingContext, $self) {
return NULL;
};
$value38 = ($arguments36['value'] !== NULL ? $arguments36['value'] : $renderChildrenClosure37());

$output26 .= (!is_string($value38) ? $value38 : htmlspecialchars($value38, ($arguments36['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments36['encoding'] !== NULL ? $arguments36['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments36['doubleEncode']));

$output26 .= '</td>
						</tr>
					';
return $output26;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments24, $renderChildrenClosure25, $renderingContext);

$output0 .= '
				</tbody>
			</table>
		</div>
	</div>

	<h3>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments39 = array();
$arguments39['key'] = 'administration.statistics.mostSearched.title';
$arguments39['id'] = NULL;
$arguments39['default'] = NULL;
$arguments39['htmlEscape'] = NULL;
$arguments39['arguments'] = NULL;
$arguments39['extensionName'] = NULL;
$renderChildrenClosure40 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments39, $renderChildrenClosure40, $renderingContext);

$output0 .= '
	</h3>
	<p>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments41 = array();
$arguments41['key'] = 'administration.statistics.mostSearched.description';
$arguments41['id'] = NULL;
$arguments41['default'] = NULL;
$arguments41['htmlEscape'] = NULL;
$arguments41['arguments'] = NULL;
$arguments41['extensionName'] = NULL;
$renderChildrenClosure42 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments41, $renderChildrenClosure42, $renderingContext);

$output0 .= '
	</p>
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments43 = array();
// Rendering Boolean node
$arguments43['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pageUid', $renderingContext));
$arguments43['then'] = NULL;
$arguments43['else'] = NULL;
$renderChildrenClosure44 = function() use ($renderingContext, $self) {
$output45 = '';

$output45 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments46 = array();
$renderChildrenClosure47 = function() use ($renderingContext, $self) {
$output48 = '';

$output48 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments49 = array();
// Rendering Boolean node
$arguments49['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'all', $renderingContext));
$arguments49['then'] = NULL;
$arguments49['else'] = NULL;
$renderChildrenClosure50 = function() use ($renderingContext, $self) {
$output51 = '';

$output51 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments52 = array();
$renderChildrenClosure53 = function() use ($renderingContext, $self) {
$output54 = '';

$output54 .= '
					<div class="row">
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments55 = array();
$arguments55['section'] = 'statistic';
// Rendering Array
$array56 = array();
$array56['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'all', $renderingContext);
$array56['title'] = 'all';
$arguments55['arguments'] = $array56;
$arguments55['partial'] = NULL;
$arguments55['optional'] = false;
$renderChildrenClosure57 = function() use ($renderingContext, $self) {
return NULL;
};

$output54 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments55, $renderChildrenClosure57, $renderingContext);

$output54 .= '
						</div>
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments58 = array();
$arguments58['section'] = 'statistic';
// Rendering Array
$array59 = array();
$array59['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'last24hours', $renderingContext);
$array59['title'] = 'last24hours';
$arguments58['arguments'] = $array59;
$arguments58['partial'] = NULL;
$arguments58['optional'] = false;
$renderChildrenClosure60 = function() use ($renderingContext, $self) {
return NULL;
};

$output54 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments58, $renderChildrenClosure60, $renderingContext);

$output54 .= '
						</div>
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments61 = array();
$arguments61['section'] = 'statistic';
// Rendering Array
$array62 = array();
$array62['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'last30days', $renderingContext);
$array62['title'] = 'last30days';
$arguments61['arguments'] = $array62;
$arguments61['partial'] = NULL;
$arguments61['optional'] = false;
$renderChildrenClosure63 = function() use ($renderingContext, $self) {
return NULL;
};

$output54 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments61, $renderChildrenClosure63, $renderingContext);

$output54 .= '
						</div>
					</div>
				';
return $output54;
};

$output51 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments52, $renderChildrenClosure53, $renderingContext);

$output51 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments64 = array();
$renderChildrenClosure65 = function() use ($renderingContext, $self) {
$output66 = '';

$output66 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper
$arguments67 = array();
$arguments67['title'] = NULL;
$arguments67['message'] = NULL;
$arguments67['state'] = -2;
$arguments67['iconName'] = NULL;
$arguments67['disableIcon'] = false;
$renderChildrenClosure68 = function() use ($renderingContext, $self) {
$output69 = '';

$output69 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments70 = array();
$arguments70['key'] = 'administration.statistics.noResultForPage';
$arguments70['id'] = NULL;
$arguments70['default'] = NULL;
$arguments70['htmlEscape'] = NULL;
$arguments70['arguments'] = NULL;
$arguments70['extensionName'] = NULL;
$renderChildrenClosure71 = function() use ($renderingContext, $self) {
return NULL;
};

$output69 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments70, $renderChildrenClosure71, $renderingContext);

$output69 .= '
					';
return $output69;
};
$viewHelper72 = $self->getViewHelper('$viewHelper72', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper');
$viewHelper72->setArguments($arguments67);
$viewHelper72->setRenderingContext($renderingContext);
$viewHelper72->setRenderChildrenClosure($renderChildrenClosure68);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper

$output66 .= $viewHelper72->initializeArgumentsAndRender();

$output66 .= '
				';
return $output66;
};

$output51 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments64, $renderChildrenClosure65, $renderingContext);

$output51 .= '
			';
return $output51;
};
$arguments49['__thenClosure'] = function() use ($renderingContext, $self) {
$output73 = '';

$output73 .= '
					<div class="row">
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments74 = array();
$arguments74['section'] = 'statistic';
// Rendering Array
$array75 = array();
$array75['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'all', $renderingContext);
$array75['title'] = 'all';
$arguments74['arguments'] = $array75;
$arguments74['partial'] = NULL;
$arguments74['optional'] = false;
$renderChildrenClosure76 = function() use ($renderingContext, $self) {
return NULL;
};

$output73 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments74, $renderChildrenClosure76, $renderingContext);

$output73 .= '
						</div>
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments77 = array();
$arguments77['section'] = 'statistic';
// Rendering Array
$array78 = array();
$array78['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'last24hours', $renderingContext);
$array78['title'] = 'last24hours';
$arguments77['arguments'] = $array78;
$arguments77['partial'] = NULL;
$arguments77['optional'] = false;
$renderChildrenClosure79 = function() use ($renderingContext, $self) {
return NULL;
};

$output73 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments77, $renderChildrenClosure79, $renderingContext);

$output73 .= '
						</div>
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments80 = array();
$arguments80['section'] = 'statistic';
// Rendering Array
$array81 = array();
$array81['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'last30days', $renderingContext);
$array81['title'] = 'last30days';
$arguments80['arguments'] = $array81;
$arguments80['partial'] = NULL;
$arguments80['optional'] = false;
$renderChildrenClosure82 = function() use ($renderingContext, $self) {
return NULL;
};

$output73 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments80, $renderChildrenClosure82, $renderingContext);

$output73 .= '
						</div>
					</div>
				';
return $output73;
};
$arguments49['__elseClosure'] = function() use ($renderingContext, $self) {
$output83 = '';

$output83 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper
$arguments84 = array();
$arguments84['title'] = NULL;
$arguments84['message'] = NULL;
$arguments84['state'] = -2;
$arguments84['iconName'] = NULL;
$arguments84['disableIcon'] = false;
$renderChildrenClosure85 = function() use ($renderingContext, $self) {
$output86 = '';

$output86 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments87 = array();
$arguments87['key'] = 'administration.statistics.noResultForPage';
$arguments87['id'] = NULL;
$arguments87['default'] = NULL;
$arguments87['htmlEscape'] = NULL;
$arguments87['arguments'] = NULL;
$arguments87['extensionName'] = NULL;
$renderChildrenClosure88 = function() use ($renderingContext, $self) {
return NULL;
};

$output86 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments87, $renderChildrenClosure88, $renderingContext);

$output86 .= '
					';
return $output86;
};
$viewHelper89 = $self->getViewHelper('$viewHelper89', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper');
$viewHelper89->setArguments($arguments84);
$viewHelper89->setRenderingContext($renderingContext);
$viewHelper89->setRenderChildrenClosure($renderChildrenClosure85);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper

$output83 .= $viewHelper89->initializeArgumentsAndRender();

$output83 .= '
				';
return $output83;
};
$viewHelper90 = $self->getViewHelper('$viewHelper90', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper90->setArguments($arguments49);
$viewHelper90->setRenderingContext($renderingContext);
$viewHelper90->setRenderChildrenClosure($renderChildrenClosure50);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output48 .= $viewHelper90->initializeArgumentsAndRender();

$output48 .= '

		';
return $output48;
};

$output45 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments46, $renderChildrenClosure47, $renderingContext);

$output45 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments91 = array();
$renderChildrenClosure92 = function() use ($renderingContext, $self) {
$output93 = '';

$output93 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper
$arguments94 = array();
$arguments94['state'] = '-1';
$arguments94['title'] = NULL;
$arguments94['message'] = NULL;
$arguments94['iconName'] = NULL;
$arguments94['disableIcon'] = false;
$renderChildrenClosure95 = function() use ($renderingContext, $self) {
$output96 = '';

$output96 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments97 = array();
$arguments97['key'] = 'administration.statistics.selectPage';
$arguments97['id'] = NULL;
$arguments97['default'] = NULL;
$arguments97['htmlEscape'] = NULL;
$arguments97['arguments'] = NULL;
$arguments97['extensionName'] = NULL;
$renderChildrenClosure98 = function() use ($renderingContext, $self) {
return NULL;
};

$output96 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments97, $renderChildrenClosure98, $renderingContext);

$output96 .= '
			';
return $output96;
};
$viewHelper99 = $self->getViewHelper('$viewHelper99', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper');
$viewHelper99->setArguments($arguments94);
$viewHelper99->setRenderingContext($renderingContext);
$viewHelper99->setRenderChildrenClosure($renderChildrenClosure95);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper

$output93 .= $viewHelper99->initializeArgumentsAndRender();

$output93 .= '
		';
return $output93;
};

$output45 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments91, $renderChildrenClosure92, $renderingContext);

$output45 .= '
	';
return $output45;
};
$arguments43['__thenClosure'] = function() use ($renderingContext, $self) {
$output100 = '';

$output100 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments101 = array();
// Rendering Boolean node
$arguments101['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'all', $renderingContext));
$arguments101['then'] = NULL;
$arguments101['else'] = NULL;
$renderChildrenClosure102 = function() use ($renderingContext, $self) {
$output103 = '';

$output103 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments104 = array();
$renderChildrenClosure105 = function() use ($renderingContext, $self) {
$output106 = '';

$output106 .= '
					<div class="row">
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments107 = array();
$arguments107['section'] = 'statistic';
// Rendering Array
$array108 = array();
$array108['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'all', $renderingContext);
$array108['title'] = 'all';
$arguments107['arguments'] = $array108;
$arguments107['partial'] = NULL;
$arguments107['optional'] = false;
$renderChildrenClosure109 = function() use ($renderingContext, $self) {
return NULL;
};

$output106 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments107, $renderChildrenClosure109, $renderingContext);

$output106 .= '
						</div>
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments110 = array();
$arguments110['section'] = 'statistic';
// Rendering Array
$array111 = array();
$array111['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'last24hours', $renderingContext);
$array111['title'] = 'last24hours';
$arguments110['arguments'] = $array111;
$arguments110['partial'] = NULL;
$arguments110['optional'] = false;
$renderChildrenClosure112 = function() use ($renderingContext, $self) {
return NULL;
};

$output106 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments110, $renderChildrenClosure112, $renderingContext);

$output106 .= '
						</div>
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments113 = array();
$arguments113['section'] = 'statistic';
// Rendering Array
$array114 = array();
$array114['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'last30days', $renderingContext);
$array114['title'] = 'last30days';
$arguments113['arguments'] = $array114;
$arguments113['partial'] = NULL;
$arguments113['optional'] = false;
$renderChildrenClosure115 = function() use ($renderingContext, $self) {
return NULL;
};

$output106 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments113, $renderChildrenClosure115, $renderingContext);

$output106 .= '
						</div>
					</div>
				';
return $output106;
};

$output103 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments104, $renderChildrenClosure105, $renderingContext);

$output103 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments116 = array();
$renderChildrenClosure117 = function() use ($renderingContext, $self) {
$output118 = '';

$output118 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper
$arguments119 = array();
$arguments119['title'] = NULL;
$arguments119['message'] = NULL;
$arguments119['state'] = -2;
$arguments119['iconName'] = NULL;
$arguments119['disableIcon'] = false;
$renderChildrenClosure120 = function() use ($renderingContext, $self) {
$output121 = '';

$output121 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments122 = array();
$arguments122['key'] = 'administration.statistics.noResultForPage';
$arguments122['id'] = NULL;
$arguments122['default'] = NULL;
$arguments122['htmlEscape'] = NULL;
$arguments122['arguments'] = NULL;
$arguments122['extensionName'] = NULL;
$renderChildrenClosure123 = function() use ($renderingContext, $self) {
return NULL;
};

$output121 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments122, $renderChildrenClosure123, $renderingContext);

$output121 .= '
					';
return $output121;
};
$viewHelper124 = $self->getViewHelper('$viewHelper124', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper');
$viewHelper124->setArguments($arguments119);
$viewHelper124->setRenderingContext($renderingContext);
$viewHelper124->setRenderChildrenClosure($renderChildrenClosure120);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper

$output118 .= $viewHelper124->initializeArgumentsAndRender();

$output118 .= '
				';
return $output118;
};

$output103 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments116, $renderChildrenClosure117, $renderingContext);

$output103 .= '
			';
return $output103;
};
$arguments101['__thenClosure'] = function() use ($renderingContext, $self) {
$output125 = '';

$output125 .= '
					<div class="row">
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments126 = array();
$arguments126['section'] = 'statistic';
// Rendering Array
$array127 = array();
$array127['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'all', $renderingContext);
$array127['title'] = 'all';
$arguments126['arguments'] = $array127;
$arguments126['partial'] = NULL;
$arguments126['optional'] = false;
$renderChildrenClosure128 = function() use ($renderingContext, $self) {
return NULL;
};

$output125 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments126, $renderChildrenClosure128, $renderingContext);

$output125 .= '
						</div>
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments129 = array();
$arguments129['section'] = 'statistic';
// Rendering Array
$array130 = array();
$array130['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'last24hours', $renderingContext);
$array130['title'] = 'last24hours';
$arguments129['arguments'] = $array130;
$arguments129['partial'] = NULL;
$arguments129['optional'] = false;
$renderChildrenClosure131 = function() use ($renderingContext, $self) {
return NULL;
};

$output125 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments129, $renderChildrenClosure131, $renderingContext);

$output125 .= '
						</div>
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments132 = array();
$arguments132['section'] = 'statistic';
// Rendering Array
$array133 = array();
$array133['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'last30days', $renderingContext);
$array133['title'] = 'last30days';
$arguments132['arguments'] = $array133;
$arguments132['partial'] = NULL;
$arguments132['optional'] = false;
$renderChildrenClosure134 = function() use ($renderingContext, $self) {
return NULL;
};

$output125 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments132, $renderChildrenClosure134, $renderingContext);

$output125 .= '
						</div>
					</div>
				';
return $output125;
};
$arguments101['__elseClosure'] = function() use ($renderingContext, $self) {
$output135 = '';

$output135 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper
$arguments136 = array();
$arguments136['title'] = NULL;
$arguments136['message'] = NULL;
$arguments136['state'] = -2;
$arguments136['iconName'] = NULL;
$arguments136['disableIcon'] = false;
$renderChildrenClosure137 = function() use ($renderingContext, $self) {
$output138 = '';

$output138 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments139 = array();
$arguments139['key'] = 'administration.statistics.noResultForPage';
$arguments139['id'] = NULL;
$arguments139['default'] = NULL;
$arguments139['htmlEscape'] = NULL;
$arguments139['arguments'] = NULL;
$arguments139['extensionName'] = NULL;
$renderChildrenClosure140 = function() use ($renderingContext, $self) {
return NULL;
};

$output138 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments139, $renderChildrenClosure140, $renderingContext);

$output138 .= '
					';
return $output138;
};
$viewHelper141 = $self->getViewHelper('$viewHelper141', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper');
$viewHelper141->setArguments($arguments136);
$viewHelper141->setRenderingContext($renderingContext);
$viewHelper141->setRenderChildrenClosure($renderChildrenClosure137);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper

$output135 .= $viewHelper141->initializeArgumentsAndRender();

$output135 .= '
				';
return $output135;
};
$viewHelper142 = $self->getViewHelper('$viewHelper142', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper142->setArguments($arguments101);
$viewHelper142->setRenderingContext($renderingContext);
$viewHelper142->setRenderChildrenClosure($renderChildrenClosure102);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output100 .= $viewHelper142->initializeArgumentsAndRender();

$output100 .= '

		';
return $output100;
};
$arguments43['__elseClosure'] = function() use ($renderingContext, $self) {
$output143 = '';

$output143 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper
$arguments144 = array();
$arguments144['state'] = '-1';
$arguments144['title'] = NULL;
$arguments144['message'] = NULL;
$arguments144['iconName'] = NULL;
$arguments144['disableIcon'] = false;
$renderChildrenClosure145 = function() use ($renderingContext, $self) {
$output146 = '';

$output146 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments147 = array();
$arguments147['key'] = 'administration.statistics.selectPage';
$arguments147['id'] = NULL;
$arguments147['default'] = NULL;
$arguments147['htmlEscape'] = NULL;
$arguments147['arguments'] = NULL;
$arguments147['extensionName'] = NULL;
$renderChildrenClosure148 = function() use ($renderingContext, $self) {
return NULL;
};

$output146 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments147, $renderChildrenClosure148, $renderingContext);

$output146 .= '
			';
return $output146;
};
$viewHelper149 = $self->getViewHelper('$viewHelper149', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper');
$viewHelper149->setArguments($arguments144);
$viewHelper149->setRenderingContext($renderingContext);
$viewHelper149->setRenderChildrenClosure($renderChildrenClosure145);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper

$output143 .= $viewHelper149->initializeArgumentsAndRender();

$output143 .= '
		';
return $output143;
};
$viewHelper150 = $self->getViewHelper('$viewHelper150', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper150->setArguments($arguments43);
$viewHelper150->setRenderingContext($renderingContext);
$viewHelper150->setRenderChildrenClosure($renderChildrenClosure44);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper150->initializeArgumentsAndRender();

$output0 .= '
';

return $output0;
}
/**
 * section statistic
 */
public function section_b482dfd7888552644911ba741a53cee27e9d364d(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output151 = '';

$output151 .= '
	<h4>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments152 = array();
$output153 = '';

$output153 .= 'administration.statistics.mostSearched.';

$output153 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'title', $renderingContext);
$arguments152['key'] = $output153;
$arguments152['id'] = NULL;
$arguments152['default'] = NULL;
$arguments152['htmlEscape'] = NULL;
$arguments152['arguments'] = NULL;
$arguments152['extensionName'] = NULL;
$renderChildrenClosure154 = function() use ($renderingContext, $self) {
return NULL;
};

$output151 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments152, $renderChildrenClosure154, $renderingContext);

$output151 .= '
	</h4>
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments155 = array();
// Rendering Boolean node
$arguments155['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'statistic', $renderingContext));
$arguments155['then'] = NULL;
$arguments155['else'] = NULL;
$renderChildrenClosure156 = function() use ($renderingContext, $self) {
$output157 = '';

$output157 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments158 = array();
$renderChildrenClosure159 = function() use ($renderingContext, $self) {
$output160 = '';

$output160 .= '
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class="nowrap">&nbsp;</th>
						<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments161 = array();
$arguments161['key'] = 'administration.statistics.mostSearched.';
$arguments161['id'] = NULL;
$arguments161['default'] = NULL;
$arguments161['htmlEscape'] = NULL;
$arguments161['arguments'] = NULL;
$arguments161['extensionName'] = NULL;
$renderChildrenClosure162 = function() use ($renderingContext, $self) {
return NULL;
};

$output160 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments161, $renderChildrenClosure162, $renderingContext);

$output160 .= '</th>
						<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments163 = array();
$arguments163['key'] = 'administration.statistics.count';
$arguments163['id'] = NULL;
$arguments163['default'] = NULL;
$arguments163['htmlEscape'] = NULL;
$arguments163['arguments'] = NULL;
$arguments163['extensionName'] = NULL;
$renderChildrenClosure164 = function() use ($renderingContext, $self) {
return NULL;
};

$output160 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments163, $renderChildrenClosure164, $renderingContext);

$output160 .= '</th>
					</tr>
				</thead>
				<tbody>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments165 = array();
$arguments165['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'statistic', $renderingContext);
$arguments165['as'] = 'line';
$arguments165['iteration'] = 'i';
$arguments165['key'] = '';
$arguments165['reverse'] = false;
$renderChildrenClosure166 = function() use ($renderingContext, $self) {
$output167 = '';

$output167 .= '
						<tr>
							<td class="nowrap"><strong>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments168 = array();
$arguments168['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'i.cycle', $renderingContext);
$arguments168['keepQuotes'] = false;
$arguments168['encoding'] = NULL;
$arguments168['doubleEncode'] = true;
$renderChildrenClosure169 = function() use ($renderingContext, $self) {
return NULL;
};
$value170 = ($arguments168['value'] !== NULL ? $arguments168['value'] : $renderChildrenClosure169());

$output167 .= (!is_string($value170) ? $value170 : htmlspecialchars($value170, ($arguments168['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments168['encoding'] !== NULL ? $arguments168['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments168['doubleEncode']));

$output167 .= '.</strong></td>
							<td>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments171 = array();
$arguments171['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'line.word', $renderingContext);
$arguments171['keepQuotes'] = false;
$arguments171['encoding'] = NULL;
$arguments171['doubleEncode'] = true;
$renderChildrenClosure172 = function() use ($renderingContext, $self) {
return NULL;
};
$value173 = ($arguments171['value'] !== NULL ? $arguments171['value'] : $renderChildrenClosure172());

$output167 .= (!is_string($value173) ? $value173 : htmlspecialchars($value173, ($arguments171['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments171['encoding'] !== NULL ? $arguments171['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments171['doubleEncode']));

$output167 .= '</td>
							<td>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments174 = array();
$arguments174['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'line.c', $renderingContext);
$arguments174['keepQuotes'] = false;
$arguments174['encoding'] = NULL;
$arguments174['doubleEncode'] = true;
$renderChildrenClosure175 = function() use ($renderingContext, $self) {
return NULL;
};
$value176 = ($arguments174['value'] !== NULL ? $arguments174['value'] : $renderChildrenClosure175());

$output167 .= (!is_string($value176) ? $value176 : htmlspecialchars($value176, ($arguments174['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments174['encoding'] !== NULL ? $arguments174['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments174['doubleEncode']));

$output167 .= '</td>
						</tr>
					';
return $output167;
};

$output160 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments165, $renderChildrenClosure166, $renderingContext);

$output160 .= '
				</tbody>
			</table>
		';
return $output160;
};

$output157 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments158, $renderChildrenClosure159, $renderingContext);

$output157 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments177 = array();
$renderChildrenClosure178 = function() use ($renderingContext, $self) {
$output179 = '';

$output179 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper
$arguments180 = array();
$arguments180['state'] = '2';
$arguments180['title'] = NULL;
$arguments180['message'] = NULL;
$arguments180['iconName'] = NULL;
$arguments180['disableIcon'] = false;
$renderChildrenClosure181 = function() use ($renderingContext, $self) {
$output182 = '';

$output182 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments183 = array();
$arguments183['key'] = 'administration.statistics.noResult';
$arguments183['id'] = NULL;
$arguments183['default'] = NULL;
$arguments183['htmlEscape'] = NULL;
$arguments183['arguments'] = NULL;
$arguments183['extensionName'] = NULL;
$renderChildrenClosure184 = function() use ($renderingContext, $self) {
return NULL;
};

$output182 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments183, $renderChildrenClosure184, $renderingContext);

$output182 .= '
			';
return $output182;
};
$viewHelper185 = $self->getViewHelper('$viewHelper185', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper');
$viewHelper185->setArguments($arguments180);
$viewHelper185->setRenderingContext($renderingContext);
$viewHelper185->setRenderChildrenClosure($renderChildrenClosure181);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper

$output179 .= $viewHelper185->initializeArgumentsAndRender();

$output179 .= '
		';
return $output179;
};

$output157 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments177, $renderChildrenClosure178, $renderingContext);

$output157 .= '
	';
return $output157;
};
$arguments155['__thenClosure'] = function() use ($renderingContext, $self) {
$output186 = '';

$output186 .= '
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class="nowrap">&nbsp;</th>
						<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments187 = array();
$arguments187['key'] = 'administration.statistics.mostSearched.';
$arguments187['id'] = NULL;
$arguments187['default'] = NULL;
$arguments187['htmlEscape'] = NULL;
$arguments187['arguments'] = NULL;
$arguments187['extensionName'] = NULL;
$renderChildrenClosure188 = function() use ($renderingContext, $self) {
return NULL;
};

$output186 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments187, $renderChildrenClosure188, $renderingContext);

$output186 .= '</th>
						<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments189 = array();
$arguments189['key'] = 'administration.statistics.count';
$arguments189['id'] = NULL;
$arguments189['default'] = NULL;
$arguments189['htmlEscape'] = NULL;
$arguments189['arguments'] = NULL;
$arguments189['extensionName'] = NULL;
$renderChildrenClosure190 = function() use ($renderingContext, $self) {
return NULL;
};

$output186 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments189, $renderChildrenClosure190, $renderingContext);

$output186 .= '</th>
					</tr>
				</thead>
				<tbody>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments191 = array();
$arguments191['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'statistic', $renderingContext);
$arguments191['as'] = 'line';
$arguments191['iteration'] = 'i';
$arguments191['key'] = '';
$arguments191['reverse'] = false;
$renderChildrenClosure192 = function() use ($renderingContext, $self) {
$output193 = '';

$output193 .= '
						<tr>
							<td class="nowrap"><strong>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments194 = array();
$arguments194['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'i.cycle', $renderingContext);
$arguments194['keepQuotes'] = false;
$arguments194['encoding'] = NULL;
$arguments194['doubleEncode'] = true;
$renderChildrenClosure195 = function() use ($renderingContext, $self) {
return NULL;
};
$value196 = ($arguments194['value'] !== NULL ? $arguments194['value'] : $renderChildrenClosure195());

$output193 .= (!is_string($value196) ? $value196 : htmlspecialchars($value196, ($arguments194['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments194['encoding'] !== NULL ? $arguments194['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments194['doubleEncode']));

$output193 .= '.</strong></td>
							<td>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments197 = array();
$arguments197['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'line.word', $renderingContext);
$arguments197['keepQuotes'] = false;
$arguments197['encoding'] = NULL;
$arguments197['doubleEncode'] = true;
$renderChildrenClosure198 = function() use ($renderingContext, $self) {
return NULL;
};
$value199 = ($arguments197['value'] !== NULL ? $arguments197['value'] : $renderChildrenClosure198());

$output193 .= (!is_string($value199) ? $value199 : htmlspecialchars($value199, ($arguments197['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments197['encoding'] !== NULL ? $arguments197['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments197['doubleEncode']));

$output193 .= '</td>
							<td>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments200 = array();
$arguments200['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'line.c', $renderingContext);
$arguments200['keepQuotes'] = false;
$arguments200['encoding'] = NULL;
$arguments200['doubleEncode'] = true;
$renderChildrenClosure201 = function() use ($renderingContext, $self) {
return NULL;
};
$value202 = ($arguments200['value'] !== NULL ? $arguments200['value'] : $renderChildrenClosure201());

$output193 .= (!is_string($value202) ? $value202 : htmlspecialchars($value202, ($arguments200['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments200['encoding'] !== NULL ? $arguments200['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments200['doubleEncode']));

$output193 .= '</td>
						</tr>
					';
return $output193;
};

$output186 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments191, $renderChildrenClosure192, $renderingContext);

$output186 .= '
				</tbody>
			</table>
		';
return $output186;
};
$arguments155['__elseClosure'] = function() use ($renderingContext, $self) {
$output203 = '';

$output203 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper
$arguments204 = array();
$arguments204['state'] = '2';
$arguments204['title'] = NULL;
$arguments204['message'] = NULL;
$arguments204['iconName'] = NULL;
$arguments204['disableIcon'] = false;
$renderChildrenClosure205 = function() use ($renderingContext, $self) {
$output206 = '';

$output206 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments207 = array();
$arguments207['key'] = 'administration.statistics.noResult';
$arguments207['id'] = NULL;
$arguments207['default'] = NULL;
$arguments207['htmlEscape'] = NULL;
$arguments207['arguments'] = NULL;
$arguments207['extensionName'] = NULL;
$renderChildrenClosure208 = function() use ($renderingContext, $self) {
return NULL;
};

$output206 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments207, $renderChildrenClosure208, $renderingContext);

$output206 .= '
			';
return $output206;
};
$viewHelper209 = $self->getViewHelper('$viewHelper209', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper');
$viewHelper209->setArguments($arguments204);
$viewHelper209->setRenderingContext($renderingContext);
$viewHelper209->setRenderChildrenClosure($renderChildrenClosure205);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper

$output203 .= $viewHelper209->initializeArgumentsAndRender();

$output203 .= '
		';
return $output203;
};
$viewHelper210 = $self->getViewHelper('$viewHelper210', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper210->setArguments($arguments155);
$viewHelper210->setRenderingContext($renderingContext);
$viewHelper210->setRenderChildrenClosure($renderChildrenClosure156);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output151 .= $viewHelper210->initializeArgumentsAndRender();

$output151 .= '
';

return $output151;
}
/**
 * section Buttons
 */
public function section_503d46db37b0db45db898aabed77244252918ca2(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;

return NULL;
}
/**
 * Main Render function
 */
public function render(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output211 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper
$arguments212 = array();
$arguments212['name'] = 'Administration';
$renderChildrenClosure213 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper214 = $self->getViewHelper('$viewHelper214', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper214->setArguments($arguments212);
$viewHelper214->setRenderingContext($renderingContext);
$viewHelper214->setRenderChildrenClosure($renderChildrenClosure213);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper

$output211 .= $viewHelper214->initializeArgumentsAndRender();

$output211 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments215 = array();
$arguments215['name'] = 'Content';
$renderChildrenClosure216 = function() use ($renderingContext, $self) {
$output217 = '';

$output217 .= '
	<p class="lead">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments218 = array();
$arguments218['key'] = 'administration.index.description';
$arguments218['id'] = NULL;
$arguments218['default'] = NULL;
$arguments218['htmlEscape'] = NULL;
$arguments218['arguments'] = NULL;
$arguments218['extensionName'] = NULL;
$renderChildrenClosure219 = function() use ($renderingContext, $self) {
return NULL;
};

$output217 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments218, $renderChildrenClosure219, $renderingContext);

$output217 .= '</p>

	<div class="row">
		<div class="col-md-6">
			<h4>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments220 = array();
$arguments220['key'] = 'administration.statistics.header';
$arguments220['id'] = NULL;
$arguments220['default'] = NULL;
$arguments220['htmlEscape'] = NULL;
$arguments220['arguments'] = NULL;
$arguments220['extensionName'] = NULL;
$renderChildrenClosure221 = function() use ($renderingContext, $self) {
return NULL;
};

$output217 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments220, $renderChildrenClosure221, $renderingContext);

$output217 .= '</h4>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments222 = array();
$arguments222['key'] = 'administration.statistics.name';
$arguments222['id'] = NULL;
$arguments222['default'] = NULL;
$arguments222['htmlEscape'] = NULL;
$arguments222['arguments'] = NULL;
$arguments222['extensionName'] = NULL;
$renderChildrenClosure223 = function() use ($renderingContext, $self) {
return NULL;
};

$output217 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments222, $renderChildrenClosure223, $renderingContext);

$output217 .= '</th>
						<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments224 = array();
$arguments224['key'] = 'administration.statistics.count';
$arguments224['id'] = NULL;
$arguments224['default'] = NULL;
$arguments224['htmlEscape'] = NULL;
$arguments224['arguments'] = NULL;
$arguments224['extensionName'] = NULL;
$renderChildrenClosure225 = function() use ($renderingContext, $self) {
return NULL;
};

$output217 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments224, $renderChildrenClosure225, $renderingContext);

$output217 .= '</th>
					</tr>
				</thead>
				<tbody>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments226 = array();
$arguments226['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'records', $renderingContext);
$arguments226['as'] = 'count';
$arguments226['key'] = 'name';
$arguments226['reverse'] = false;
$arguments226['iteration'] = NULL;
$renderChildrenClosure227 = function() use ($renderingContext, $self) {
$output228 = '';

$output228 .= '
						<tr>
							<td>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments229 = array();
$arguments229['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'name', $renderingContext);
$arguments229['keepQuotes'] = false;
$arguments229['encoding'] = NULL;
$arguments229['doubleEncode'] = true;
$renderChildrenClosure230 = function() use ($renderingContext, $self) {
return NULL;
};
$value231 = ($arguments229['value'] !== NULL ? $arguments229['value'] : $renderChildrenClosure230());

$output228 .= (!is_string($value231) ? $value231 : htmlspecialchars($value231, ($arguments229['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments229['encoding'] !== NULL ? $arguments229['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments229['doubleEncode']));

$output228 .= '</td>
							<td>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments232 = array();
$arguments232['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'count', $renderingContext);
$arguments232['keepQuotes'] = false;
$arguments232['encoding'] = NULL;
$arguments232['doubleEncode'] = true;
$renderChildrenClosure233 = function() use ($renderingContext, $self) {
return NULL;
};
$value234 = ($arguments232['value'] !== NULL ? $arguments232['value'] : $renderChildrenClosure233());

$output228 .= (!is_string($value234) ? $value234 : htmlspecialchars($value234, ($arguments232['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments232['encoding'] !== NULL ? $arguments232['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments232['doubleEncode']));

$output228 .= '</td>
						</tr>
					';
return $output228;
};

$output217 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments226, $renderChildrenClosure227, $renderingContext);

$output217 .= '
				</tbody>
			</table>
		</div>
		<div class="col-md-6">
			<h4>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments235 = array();
$arguments235['key'] = 'administration.statistics.headerTypes';
$arguments235['id'] = NULL;
$arguments235['default'] = NULL;
$arguments235['htmlEscape'] = NULL;
$arguments235['arguments'] = NULL;
$arguments235['extensionName'] = NULL;
$renderChildrenClosure236 = function() use ($renderingContext, $self) {
return NULL;
};

$output217 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments235, $renderChildrenClosure236, $renderingContext);

$output217 .= '</h4>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments237 = array();
$arguments237['key'] = 'administration.statistics.name';
$arguments237['id'] = NULL;
$arguments237['default'] = NULL;
$arguments237['htmlEscape'] = NULL;
$arguments237['arguments'] = NULL;
$arguments237['extensionName'] = NULL;
$renderChildrenClosure238 = function() use ($renderingContext, $self) {
return NULL;
};

$output217 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments237, $renderChildrenClosure238, $renderingContext);

$output217 .= '</th>
						<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments239 = array();
$arguments239['key'] = 'administration.statistics.count';
$arguments239['id'] = NULL;
$arguments239['default'] = NULL;
$arguments239['htmlEscape'] = NULL;
$arguments239['arguments'] = NULL;
$arguments239['extensionName'] = NULL;
$renderChildrenClosure240 = function() use ($renderingContext, $self) {
return NULL;
};

$output217 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments239, $renderChildrenClosure240, $renderingContext);

$output217 .= '</th>
					</tr>
				</thead>
				<tbody>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments241 = array();
$arguments241['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'phash', $renderingContext);
$arguments241['as'] = 'data';
$arguments241['key'] = '';
$arguments241['reverse'] = false;
$arguments241['iteration'] = NULL;
$renderChildrenClosure242 = function() use ($renderingContext, $self) {
$output243 = '';

$output243 .= '
						<tr>
							<td>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments244 = array();
$arguments244['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'data.name', $renderingContext);
$arguments244['keepQuotes'] = false;
$arguments244['encoding'] = NULL;
$arguments244['doubleEncode'] = true;
$renderChildrenClosure245 = function() use ($renderingContext, $self) {
return NULL;
};
$value246 = ($arguments244['value'] !== NULL ? $arguments244['value'] : $renderChildrenClosure245());

$output243 .= (!is_string($value246) ? $value246 : htmlspecialchars($value246, ($arguments244['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments244['encoding'] !== NULL ? $arguments244['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments244['doubleEncode']));

$output243 .= ' (';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments247 = array();
$arguments247['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'data.type', $renderingContext);
$arguments247['keepQuotes'] = false;
$arguments247['encoding'] = NULL;
$arguments247['doubleEncode'] = true;
$renderChildrenClosure248 = function() use ($renderingContext, $self) {
return NULL;
};
$value249 = ($arguments247['value'] !== NULL ? $arguments247['value'] : $renderChildrenClosure248());

$output243 .= (!is_string($value249) ? $value249 : htmlspecialchars($value249, ($arguments247['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments247['encoding'] !== NULL ? $arguments247['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments247['doubleEncode']));

$output243 .= ')</td>
							<td>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments250 = array();
$arguments250['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'data.count', $renderingContext);
$arguments250['keepQuotes'] = false;
$arguments250['encoding'] = NULL;
$arguments250['doubleEncode'] = true;
$renderChildrenClosure251 = function() use ($renderingContext, $self) {
return NULL;
};
$value252 = ($arguments250['value'] !== NULL ? $arguments250['value'] : $renderChildrenClosure251());

$output243 .= (!is_string($value252) ? $value252 : htmlspecialchars($value252, ($arguments250['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments250['encoding'] !== NULL ? $arguments250['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments250['doubleEncode']));

$output243 .= ' / ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments253 = array();
$arguments253['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'data.uniqueCount', $renderingContext);
$arguments253['keepQuotes'] = false;
$arguments253['encoding'] = NULL;
$arguments253['doubleEncode'] = true;
$renderChildrenClosure254 = function() use ($renderingContext, $self) {
return NULL;
};
$value255 = ($arguments253['value'] !== NULL ? $arguments253['value'] : $renderChildrenClosure254());

$output243 .= (!is_string($value255) ? $value255 : htmlspecialchars($value255, ($arguments253['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments253['encoding'] !== NULL ? $arguments253['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments253['doubleEncode']));

$output243 .= '</td>
						</tr>
					';
return $output243;
};

$output217 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments241, $renderChildrenClosure242, $renderingContext);

$output217 .= '
				</tbody>
			</table>
		</div>
	</div>

	<h3>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments256 = array();
$arguments256['key'] = 'administration.statistics.mostSearched.title';
$arguments256['id'] = NULL;
$arguments256['default'] = NULL;
$arguments256['htmlEscape'] = NULL;
$arguments256['arguments'] = NULL;
$arguments256['extensionName'] = NULL;
$renderChildrenClosure257 = function() use ($renderingContext, $self) {
return NULL;
};

$output217 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments256, $renderChildrenClosure257, $renderingContext);

$output217 .= '
	</h3>
	<p>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments258 = array();
$arguments258['key'] = 'administration.statistics.mostSearched.description';
$arguments258['id'] = NULL;
$arguments258['default'] = NULL;
$arguments258['htmlEscape'] = NULL;
$arguments258['arguments'] = NULL;
$arguments258['extensionName'] = NULL;
$renderChildrenClosure259 = function() use ($renderingContext, $self) {
return NULL;
};

$output217 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments258, $renderChildrenClosure259, $renderingContext);

$output217 .= '
	</p>
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments260 = array();
// Rendering Boolean node
$arguments260['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pageUid', $renderingContext));
$arguments260['then'] = NULL;
$arguments260['else'] = NULL;
$renderChildrenClosure261 = function() use ($renderingContext, $self) {
$output262 = '';

$output262 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments263 = array();
$renderChildrenClosure264 = function() use ($renderingContext, $self) {
$output265 = '';

$output265 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments266 = array();
// Rendering Boolean node
$arguments266['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'all', $renderingContext));
$arguments266['then'] = NULL;
$arguments266['else'] = NULL;
$renderChildrenClosure267 = function() use ($renderingContext, $self) {
$output268 = '';

$output268 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments269 = array();
$renderChildrenClosure270 = function() use ($renderingContext, $self) {
$output271 = '';

$output271 .= '
					<div class="row">
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments272 = array();
$arguments272['section'] = 'statistic';
// Rendering Array
$array273 = array();
$array273['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'all', $renderingContext);
$array273['title'] = 'all';
$arguments272['arguments'] = $array273;
$arguments272['partial'] = NULL;
$arguments272['optional'] = false;
$renderChildrenClosure274 = function() use ($renderingContext, $self) {
return NULL;
};

$output271 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments272, $renderChildrenClosure274, $renderingContext);

$output271 .= '
						</div>
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments275 = array();
$arguments275['section'] = 'statistic';
// Rendering Array
$array276 = array();
$array276['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'last24hours', $renderingContext);
$array276['title'] = 'last24hours';
$arguments275['arguments'] = $array276;
$arguments275['partial'] = NULL;
$arguments275['optional'] = false;
$renderChildrenClosure277 = function() use ($renderingContext, $self) {
return NULL;
};

$output271 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments275, $renderChildrenClosure277, $renderingContext);

$output271 .= '
						</div>
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments278 = array();
$arguments278['section'] = 'statistic';
// Rendering Array
$array279 = array();
$array279['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'last30days', $renderingContext);
$array279['title'] = 'last30days';
$arguments278['arguments'] = $array279;
$arguments278['partial'] = NULL;
$arguments278['optional'] = false;
$renderChildrenClosure280 = function() use ($renderingContext, $self) {
return NULL;
};

$output271 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments278, $renderChildrenClosure280, $renderingContext);

$output271 .= '
						</div>
					</div>
				';
return $output271;
};

$output268 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments269, $renderChildrenClosure270, $renderingContext);

$output268 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments281 = array();
$renderChildrenClosure282 = function() use ($renderingContext, $self) {
$output283 = '';

$output283 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper
$arguments284 = array();
$arguments284['title'] = NULL;
$arguments284['message'] = NULL;
$arguments284['state'] = -2;
$arguments284['iconName'] = NULL;
$arguments284['disableIcon'] = false;
$renderChildrenClosure285 = function() use ($renderingContext, $self) {
$output286 = '';

$output286 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments287 = array();
$arguments287['key'] = 'administration.statistics.noResultForPage';
$arguments287['id'] = NULL;
$arguments287['default'] = NULL;
$arguments287['htmlEscape'] = NULL;
$arguments287['arguments'] = NULL;
$arguments287['extensionName'] = NULL;
$renderChildrenClosure288 = function() use ($renderingContext, $self) {
return NULL;
};

$output286 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments287, $renderChildrenClosure288, $renderingContext);

$output286 .= '
					';
return $output286;
};
$viewHelper289 = $self->getViewHelper('$viewHelper289', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper');
$viewHelper289->setArguments($arguments284);
$viewHelper289->setRenderingContext($renderingContext);
$viewHelper289->setRenderChildrenClosure($renderChildrenClosure285);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper

$output283 .= $viewHelper289->initializeArgumentsAndRender();

$output283 .= '
				';
return $output283;
};

$output268 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments281, $renderChildrenClosure282, $renderingContext);

$output268 .= '
			';
return $output268;
};
$arguments266['__thenClosure'] = function() use ($renderingContext, $self) {
$output290 = '';

$output290 .= '
					<div class="row">
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments291 = array();
$arguments291['section'] = 'statistic';
// Rendering Array
$array292 = array();
$array292['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'all', $renderingContext);
$array292['title'] = 'all';
$arguments291['arguments'] = $array292;
$arguments291['partial'] = NULL;
$arguments291['optional'] = false;
$renderChildrenClosure293 = function() use ($renderingContext, $self) {
return NULL;
};

$output290 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments291, $renderChildrenClosure293, $renderingContext);

$output290 .= '
						</div>
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments294 = array();
$arguments294['section'] = 'statistic';
// Rendering Array
$array295 = array();
$array295['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'last24hours', $renderingContext);
$array295['title'] = 'last24hours';
$arguments294['arguments'] = $array295;
$arguments294['partial'] = NULL;
$arguments294['optional'] = false;
$renderChildrenClosure296 = function() use ($renderingContext, $self) {
return NULL;
};

$output290 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments294, $renderChildrenClosure296, $renderingContext);

$output290 .= '
						</div>
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments297 = array();
$arguments297['section'] = 'statistic';
// Rendering Array
$array298 = array();
$array298['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'last30days', $renderingContext);
$array298['title'] = 'last30days';
$arguments297['arguments'] = $array298;
$arguments297['partial'] = NULL;
$arguments297['optional'] = false;
$renderChildrenClosure299 = function() use ($renderingContext, $self) {
return NULL;
};

$output290 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments297, $renderChildrenClosure299, $renderingContext);

$output290 .= '
						</div>
					</div>
				';
return $output290;
};
$arguments266['__elseClosure'] = function() use ($renderingContext, $self) {
$output300 = '';

$output300 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper
$arguments301 = array();
$arguments301['title'] = NULL;
$arguments301['message'] = NULL;
$arguments301['state'] = -2;
$arguments301['iconName'] = NULL;
$arguments301['disableIcon'] = false;
$renderChildrenClosure302 = function() use ($renderingContext, $self) {
$output303 = '';

$output303 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments304 = array();
$arguments304['key'] = 'administration.statistics.noResultForPage';
$arguments304['id'] = NULL;
$arguments304['default'] = NULL;
$arguments304['htmlEscape'] = NULL;
$arguments304['arguments'] = NULL;
$arguments304['extensionName'] = NULL;
$renderChildrenClosure305 = function() use ($renderingContext, $self) {
return NULL;
};

$output303 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments304, $renderChildrenClosure305, $renderingContext);

$output303 .= '
					';
return $output303;
};
$viewHelper306 = $self->getViewHelper('$viewHelper306', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper');
$viewHelper306->setArguments($arguments301);
$viewHelper306->setRenderingContext($renderingContext);
$viewHelper306->setRenderChildrenClosure($renderChildrenClosure302);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper

$output300 .= $viewHelper306->initializeArgumentsAndRender();

$output300 .= '
				';
return $output300;
};
$viewHelper307 = $self->getViewHelper('$viewHelper307', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper307->setArguments($arguments266);
$viewHelper307->setRenderingContext($renderingContext);
$viewHelper307->setRenderChildrenClosure($renderChildrenClosure267);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output265 .= $viewHelper307->initializeArgumentsAndRender();

$output265 .= '

		';
return $output265;
};

$output262 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments263, $renderChildrenClosure264, $renderingContext);

$output262 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments308 = array();
$renderChildrenClosure309 = function() use ($renderingContext, $self) {
$output310 = '';

$output310 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper
$arguments311 = array();
$arguments311['state'] = '-1';
$arguments311['title'] = NULL;
$arguments311['message'] = NULL;
$arguments311['iconName'] = NULL;
$arguments311['disableIcon'] = false;
$renderChildrenClosure312 = function() use ($renderingContext, $self) {
$output313 = '';

$output313 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments314 = array();
$arguments314['key'] = 'administration.statistics.selectPage';
$arguments314['id'] = NULL;
$arguments314['default'] = NULL;
$arguments314['htmlEscape'] = NULL;
$arguments314['arguments'] = NULL;
$arguments314['extensionName'] = NULL;
$renderChildrenClosure315 = function() use ($renderingContext, $self) {
return NULL;
};

$output313 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments314, $renderChildrenClosure315, $renderingContext);

$output313 .= '
			';
return $output313;
};
$viewHelper316 = $self->getViewHelper('$viewHelper316', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper');
$viewHelper316->setArguments($arguments311);
$viewHelper316->setRenderingContext($renderingContext);
$viewHelper316->setRenderChildrenClosure($renderChildrenClosure312);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper

$output310 .= $viewHelper316->initializeArgumentsAndRender();

$output310 .= '
		';
return $output310;
};

$output262 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments308, $renderChildrenClosure309, $renderingContext);

$output262 .= '
	';
return $output262;
};
$arguments260['__thenClosure'] = function() use ($renderingContext, $self) {
$output317 = '';

$output317 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments318 = array();
// Rendering Boolean node
$arguments318['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'all', $renderingContext));
$arguments318['then'] = NULL;
$arguments318['else'] = NULL;
$renderChildrenClosure319 = function() use ($renderingContext, $self) {
$output320 = '';

$output320 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments321 = array();
$renderChildrenClosure322 = function() use ($renderingContext, $self) {
$output323 = '';

$output323 .= '
					<div class="row">
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments324 = array();
$arguments324['section'] = 'statistic';
// Rendering Array
$array325 = array();
$array325['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'all', $renderingContext);
$array325['title'] = 'all';
$arguments324['arguments'] = $array325;
$arguments324['partial'] = NULL;
$arguments324['optional'] = false;
$renderChildrenClosure326 = function() use ($renderingContext, $self) {
return NULL;
};

$output323 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments324, $renderChildrenClosure326, $renderingContext);

$output323 .= '
						</div>
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments327 = array();
$arguments327['section'] = 'statistic';
// Rendering Array
$array328 = array();
$array328['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'last24hours', $renderingContext);
$array328['title'] = 'last24hours';
$arguments327['arguments'] = $array328;
$arguments327['partial'] = NULL;
$arguments327['optional'] = false;
$renderChildrenClosure329 = function() use ($renderingContext, $self) {
return NULL;
};

$output323 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments327, $renderChildrenClosure329, $renderingContext);

$output323 .= '
						</div>
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments330 = array();
$arguments330['section'] = 'statistic';
// Rendering Array
$array331 = array();
$array331['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'last30days', $renderingContext);
$array331['title'] = 'last30days';
$arguments330['arguments'] = $array331;
$arguments330['partial'] = NULL;
$arguments330['optional'] = false;
$renderChildrenClosure332 = function() use ($renderingContext, $self) {
return NULL;
};

$output323 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments330, $renderChildrenClosure332, $renderingContext);

$output323 .= '
						</div>
					</div>
				';
return $output323;
};

$output320 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments321, $renderChildrenClosure322, $renderingContext);

$output320 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments333 = array();
$renderChildrenClosure334 = function() use ($renderingContext, $self) {
$output335 = '';

$output335 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper
$arguments336 = array();
$arguments336['title'] = NULL;
$arguments336['message'] = NULL;
$arguments336['state'] = -2;
$arguments336['iconName'] = NULL;
$arguments336['disableIcon'] = false;
$renderChildrenClosure337 = function() use ($renderingContext, $self) {
$output338 = '';

$output338 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments339 = array();
$arguments339['key'] = 'administration.statistics.noResultForPage';
$arguments339['id'] = NULL;
$arguments339['default'] = NULL;
$arguments339['htmlEscape'] = NULL;
$arguments339['arguments'] = NULL;
$arguments339['extensionName'] = NULL;
$renderChildrenClosure340 = function() use ($renderingContext, $self) {
return NULL;
};

$output338 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments339, $renderChildrenClosure340, $renderingContext);

$output338 .= '
					';
return $output338;
};
$viewHelper341 = $self->getViewHelper('$viewHelper341', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper');
$viewHelper341->setArguments($arguments336);
$viewHelper341->setRenderingContext($renderingContext);
$viewHelper341->setRenderChildrenClosure($renderChildrenClosure337);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper

$output335 .= $viewHelper341->initializeArgumentsAndRender();

$output335 .= '
				';
return $output335;
};

$output320 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments333, $renderChildrenClosure334, $renderingContext);

$output320 .= '
			';
return $output320;
};
$arguments318['__thenClosure'] = function() use ($renderingContext, $self) {
$output342 = '';

$output342 .= '
					<div class="row">
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments343 = array();
$arguments343['section'] = 'statistic';
// Rendering Array
$array344 = array();
$array344['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'all', $renderingContext);
$array344['title'] = 'all';
$arguments343['arguments'] = $array344;
$arguments343['partial'] = NULL;
$arguments343['optional'] = false;
$renderChildrenClosure345 = function() use ($renderingContext, $self) {
return NULL;
};

$output342 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments343, $renderChildrenClosure345, $renderingContext);

$output342 .= '
						</div>
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments346 = array();
$arguments346['section'] = 'statistic';
// Rendering Array
$array347 = array();
$array347['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'last24hours', $renderingContext);
$array347['title'] = 'last24hours';
$arguments346['arguments'] = $array347;
$arguments346['partial'] = NULL;
$arguments346['optional'] = false;
$renderChildrenClosure348 = function() use ($renderingContext, $self) {
return NULL;
};

$output342 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments346, $renderChildrenClosure348, $renderingContext);

$output342 .= '
						</div>
						<div class="col-md-4">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments349 = array();
$arguments349['section'] = 'statistic';
// Rendering Array
$array350 = array();
$array350['statistic'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'last30days', $renderingContext);
$array350['title'] = 'last30days';
$arguments349['arguments'] = $array350;
$arguments349['partial'] = NULL;
$arguments349['optional'] = false;
$renderChildrenClosure351 = function() use ($renderingContext, $self) {
return NULL;
};

$output342 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments349, $renderChildrenClosure351, $renderingContext);

$output342 .= '
						</div>
					</div>
				';
return $output342;
};
$arguments318['__elseClosure'] = function() use ($renderingContext, $self) {
$output352 = '';

$output352 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper
$arguments353 = array();
$arguments353['title'] = NULL;
$arguments353['message'] = NULL;
$arguments353['state'] = -2;
$arguments353['iconName'] = NULL;
$arguments353['disableIcon'] = false;
$renderChildrenClosure354 = function() use ($renderingContext, $self) {
$output355 = '';

$output355 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments356 = array();
$arguments356['key'] = 'administration.statistics.noResultForPage';
$arguments356['id'] = NULL;
$arguments356['default'] = NULL;
$arguments356['htmlEscape'] = NULL;
$arguments356['arguments'] = NULL;
$arguments356['extensionName'] = NULL;
$renderChildrenClosure357 = function() use ($renderingContext, $self) {
return NULL;
};

$output355 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments356, $renderChildrenClosure357, $renderingContext);

$output355 .= '
					';
return $output355;
};
$viewHelper358 = $self->getViewHelper('$viewHelper358', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper');
$viewHelper358->setArguments($arguments353);
$viewHelper358->setRenderingContext($renderingContext);
$viewHelper358->setRenderChildrenClosure($renderChildrenClosure354);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper

$output352 .= $viewHelper358->initializeArgumentsAndRender();

$output352 .= '
				';
return $output352;
};
$viewHelper359 = $self->getViewHelper('$viewHelper359', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper359->setArguments($arguments318);
$viewHelper359->setRenderingContext($renderingContext);
$viewHelper359->setRenderChildrenClosure($renderChildrenClosure319);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output317 .= $viewHelper359->initializeArgumentsAndRender();

$output317 .= '

		';
return $output317;
};
$arguments260['__elseClosure'] = function() use ($renderingContext, $self) {
$output360 = '';

$output360 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper
$arguments361 = array();
$arguments361['state'] = '-1';
$arguments361['title'] = NULL;
$arguments361['message'] = NULL;
$arguments361['iconName'] = NULL;
$arguments361['disableIcon'] = false;
$renderChildrenClosure362 = function() use ($renderingContext, $self) {
$output363 = '';

$output363 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments364 = array();
$arguments364['key'] = 'administration.statistics.selectPage';
$arguments364['id'] = NULL;
$arguments364['default'] = NULL;
$arguments364['htmlEscape'] = NULL;
$arguments364['arguments'] = NULL;
$arguments364['extensionName'] = NULL;
$renderChildrenClosure365 = function() use ($renderingContext, $self) {
return NULL;
};

$output363 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments364, $renderChildrenClosure365, $renderingContext);

$output363 .= '
			';
return $output363;
};
$viewHelper366 = $self->getViewHelper('$viewHelper366', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper');
$viewHelper366->setArguments($arguments361);
$viewHelper366->setRenderingContext($renderingContext);
$viewHelper366->setRenderChildrenClosure($renderChildrenClosure362);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper

$output360 .= $viewHelper366->initializeArgumentsAndRender();

$output360 .= '
		';
return $output360;
};
$viewHelper367 = $self->getViewHelper('$viewHelper367', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper367->setArguments($arguments260);
$viewHelper367->setRenderingContext($renderingContext);
$viewHelper367->setRenderChildrenClosure($renderChildrenClosure261);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output217 .= $viewHelper367->initializeArgumentsAndRender();

$output217 .= '
';
return $output217;
};

$output211 .= '';

$output211 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments368 = array();
$arguments368['name'] = 'statistic';
$renderChildrenClosure369 = function() use ($renderingContext, $self) {
$output370 = '';

$output370 .= '
	<h4>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments371 = array();
$output372 = '';

$output372 .= 'administration.statistics.mostSearched.';

$output372 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'title', $renderingContext);
$arguments371['key'] = $output372;
$arguments371['id'] = NULL;
$arguments371['default'] = NULL;
$arguments371['htmlEscape'] = NULL;
$arguments371['arguments'] = NULL;
$arguments371['extensionName'] = NULL;
$renderChildrenClosure373 = function() use ($renderingContext, $self) {
return NULL;
};

$output370 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments371, $renderChildrenClosure373, $renderingContext);

$output370 .= '
	</h4>
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments374 = array();
// Rendering Boolean node
$arguments374['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'statistic', $renderingContext));
$arguments374['then'] = NULL;
$arguments374['else'] = NULL;
$renderChildrenClosure375 = function() use ($renderingContext, $self) {
$output376 = '';

$output376 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments377 = array();
$renderChildrenClosure378 = function() use ($renderingContext, $self) {
$output379 = '';

$output379 .= '
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class="nowrap">&nbsp;</th>
						<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments380 = array();
$arguments380['key'] = 'administration.statistics.mostSearched.';
$arguments380['id'] = NULL;
$arguments380['default'] = NULL;
$arguments380['htmlEscape'] = NULL;
$arguments380['arguments'] = NULL;
$arguments380['extensionName'] = NULL;
$renderChildrenClosure381 = function() use ($renderingContext, $self) {
return NULL;
};

$output379 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments380, $renderChildrenClosure381, $renderingContext);

$output379 .= '</th>
						<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments382 = array();
$arguments382['key'] = 'administration.statistics.count';
$arguments382['id'] = NULL;
$arguments382['default'] = NULL;
$arguments382['htmlEscape'] = NULL;
$arguments382['arguments'] = NULL;
$arguments382['extensionName'] = NULL;
$renderChildrenClosure383 = function() use ($renderingContext, $self) {
return NULL;
};

$output379 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments382, $renderChildrenClosure383, $renderingContext);

$output379 .= '</th>
					</tr>
				</thead>
				<tbody>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments384 = array();
$arguments384['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'statistic', $renderingContext);
$arguments384['as'] = 'line';
$arguments384['iteration'] = 'i';
$arguments384['key'] = '';
$arguments384['reverse'] = false;
$renderChildrenClosure385 = function() use ($renderingContext, $self) {
$output386 = '';

$output386 .= '
						<tr>
							<td class="nowrap"><strong>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments387 = array();
$arguments387['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'i.cycle', $renderingContext);
$arguments387['keepQuotes'] = false;
$arguments387['encoding'] = NULL;
$arguments387['doubleEncode'] = true;
$renderChildrenClosure388 = function() use ($renderingContext, $self) {
return NULL;
};
$value389 = ($arguments387['value'] !== NULL ? $arguments387['value'] : $renderChildrenClosure388());

$output386 .= (!is_string($value389) ? $value389 : htmlspecialchars($value389, ($arguments387['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments387['encoding'] !== NULL ? $arguments387['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments387['doubleEncode']));

$output386 .= '.</strong></td>
							<td>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments390 = array();
$arguments390['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'line.word', $renderingContext);
$arguments390['keepQuotes'] = false;
$arguments390['encoding'] = NULL;
$arguments390['doubleEncode'] = true;
$renderChildrenClosure391 = function() use ($renderingContext, $self) {
return NULL;
};
$value392 = ($arguments390['value'] !== NULL ? $arguments390['value'] : $renderChildrenClosure391());

$output386 .= (!is_string($value392) ? $value392 : htmlspecialchars($value392, ($arguments390['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments390['encoding'] !== NULL ? $arguments390['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments390['doubleEncode']));

$output386 .= '</td>
							<td>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments393 = array();
$arguments393['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'line.c', $renderingContext);
$arguments393['keepQuotes'] = false;
$arguments393['encoding'] = NULL;
$arguments393['doubleEncode'] = true;
$renderChildrenClosure394 = function() use ($renderingContext, $self) {
return NULL;
};
$value395 = ($arguments393['value'] !== NULL ? $arguments393['value'] : $renderChildrenClosure394());

$output386 .= (!is_string($value395) ? $value395 : htmlspecialchars($value395, ($arguments393['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments393['encoding'] !== NULL ? $arguments393['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments393['doubleEncode']));

$output386 .= '</td>
						</tr>
					';
return $output386;
};

$output379 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments384, $renderChildrenClosure385, $renderingContext);

$output379 .= '
				</tbody>
			</table>
		';
return $output379;
};

$output376 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments377, $renderChildrenClosure378, $renderingContext);

$output376 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments396 = array();
$renderChildrenClosure397 = function() use ($renderingContext, $self) {
$output398 = '';

$output398 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper
$arguments399 = array();
$arguments399['state'] = '2';
$arguments399['title'] = NULL;
$arguments399['message'] = NULL;
$arguments399['iconName'] = NULL;
$arguments399['disableIcon'] = false;
$renderChildrenClosure400 = function() use ($renderingContext, $self) {
$output401 = '';

$output401 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments402 = array();
$arguments402['key'] = 'administration.statistics.noResult';
$arguments402['id'] = NULL;
$arguments402['default'] = NULL;
$arguments402['htmlEscape'] = NULL;
$arguments402['arguments'] = NULL;
$arguments402['extensionName'] = NULL;
$renderChildrenClosure403 = function() use ($renderingContext, $self) {
return NULL;
};

$output401 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments402, $renderChildrenClosure403, $renderingContext);

$output401 .= '
			';
return $output401;
};
$viewHelper404 = $self->getViewHelper('$viewHelper404', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper');
$viewHelper404->setArguments($arguments399);
$viewHelper404->setRenderingContext($renderingContext);
$viewHelper404->setRenderChildrenClosure($renderChildrenClosure400);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper

$output398 .= $viewHelper404->initializeArgumentsAndRender();

$output398 .= '
		';
return $output398;
};

$output376 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments396, $renderChildrenClosure397, $renderingContext);

$output376 .= '
	';
return $output376;
};
$arguments374['__thenClosure'] = function() use ($renderingContext, $self) {
$output405 = '';

$output405 .= '
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class="nowrap">&nbsp;</th>
						<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments406 = array();
$arguments406['key'] = 'administration.statistics.mostSearched.';
$arguments406['id'] = NULL;
$arguments406['default'] = NULL;
$arguments406['htmlEscape'] = NULL;
$arguments406['arguments'] = NULL;
$arguments406['extensionName'] = NULL;
$renderChildrenClosure407 = function() use ($renderingContext, $self) {
return NULL;
};

$output405 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments406, $renderChildrenClosure407, $renderingContext);

$output405 .= '</th>
						<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments408 = array();
$arguments408['key'] = 'administration.statistics.count';
$arguments408['id'] = NULL;
$arguments408['default'] = NULL;
$arguments408['htmlEscape'] = NULL;
$arguments408['arguments'] = NULL;
$arguments408['extensionName'] = NULL;
$renderChildrenClosure409 = function() use ($renderingContext, $self) {
return NULL;
};

$output405 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments408, $renderChildrenClosure409, $renderingContext);

$output405 .= '</th>
					</tr>
				</thead>
				<tbody>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments410 = array();
$arguments410['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'statistic', $renderingContext);
$arguments410['as'] = 'line';
$arguments410['iteration'] = 'i';
$arguments410['key'] = '';
$arguments410['reverse'] = false;
$renderChildrenClosure411 = function() use ($renderingContext, $self) {
$output412 = '';

$output412 .= '
						<tr>
							<td class="nowrap"><strong>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments413 = array();
$arguments413['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'i.cycle', $renderingContext);
$arguments413['keepQuotes'] = false;
$arguments413['encoding'] = NULL;
$arguments413['doubleEncode'] = true;
$renderChildrenClosure414 = function() use ($renderingContext, $self) {
return NULL;
};
$value415 = ($arguments413['value'] !== NULL ? $arguments413['value'] : $renderChildrenClosure414());

$output412 .= (!is_string($value415) ? $value415 : htmlspecialchars($value415, ($arguments413['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments413['encoding'] !== NULL ? $arguments413['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments413['doubleEncode']));

$output412 .= '.</strong></td>
							<td>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments416 = array();
$arguments416['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'line.word', $renderingContext);
$arguments416['keepQuotes'] = false;
$arguments416['encoding'] = NULL;
$arguments416['doubleEncode'] = true;
$renderChildrenClosure417 = function() use ($renderingContext, $self) {
return NULL;
};
$value418 = ($arguments416['value'] !== NULL ? $arguments416['value'] : $renderChildrenClosure417());

$output412 .= (!is_string($value418) ? $value418 : htmlspecialchars($value418, ($arguments416['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments416['encoding'] !== NULL ? $arguments416['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments416['doubleEncode']));

$output412 .= '</td>
							<td>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments419 = array();
$arguments419['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'line.c', $renderingContext);
$arguments419['keepQuotes'] = false;
$arguments419['encoding'] = NULL;
$arguments419['doubleEncode'] = true;
$renderChildrenClosure420 = function() use ($renderingContext, $self) {
return NULL;
};
$value421 = ($arguments419['value'] !== NULL ? $arguments419['value'] : $renderChildrenClosure420());

$output412 .= (!is_string($value421) ? $value421 : htmlspecialchars($value421, ($arguments419['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments419['encoding'] !== NULL ? $arguments419['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments419['doubleEncode']));

$output412 .= '</td>
						</tr>
					';
return $output412;
};

$output405 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments410, $renderChildrenClosure411, $renderingContext);

$output405 .= '
				</tbody>
			</table>
		';
return $output405;
};
$arguments374['__elseClosure'] = function() use ($renderingContext, $self) {
$output422 = '';

$output422 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper
$arguments423 = array();
$arguments423['state'] = '2';
$arguments423['title'] = NULL;
$arguments423['message'] = NULL;
$arguments423['iconName'] = NULL;
$arguments423['disableIcon'] = false;
$renderChildrenClosure424 = function() use ($renderingContext, $self) {
$output425 = '';

$output425 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments426 = array();
$arguments426['key'] = 'administration.statistics.noResult';
$arguments426['id'] = NULL;
$arguments426['default'] = NULL;
$arguments426['htmlEscape'] = NULL;
$arguments426['arguments'] = NULL;
$arguments426['extensionName'] = NULL;
$renderChildrenClosure427 = function() use ($renderingContext, $self) {
return NULL;
};

$output425 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments426, $renderChildrenClosure427, $renderingContext);

$output425 .= '
			';
return $output425;
};
$viewHelper428 = $self->getViewHelper('$viewHelper428', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper');
$viewHelper428->setArguments($arguments423);
$viewHelper428->setRenderingContext($renderingContext);
$viewHelper428->setRenderChildrenClosure($renderChildrenClosure424);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper

$output422 .= $viewHelper428->initializeArgumentsAndRender();

$output422 .= '
		';
return $output422;
};
$viewHelper429 = $self->getViewHelper('$viewHelper429', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper429->setArguments($arguments374);
$viewHelper429->setRenderingContext($renderingContext);
$viewHelper429->setRenderChildrenClosure($renderChildrenClosure375);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output370 .= $viewHelper429->initializeArgumentsAndRender();

$output370 .= '
';
return $output370;
};

$output211 .= '';

$output211 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments430 = array();
$arguments430['name'] = 'Buttons';
$renderChildrenClosure431 = function() use ($renderingContext, $self) {
return NULL;
};

$output211 .= '';

$output211 .= '
';

return $output211;
}


}
#1435620824    108018    