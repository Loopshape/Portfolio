<?php
class FluidCache_News_Administration_action_newsPidListing_fda4b46cad24f0141472d0a490f9c69129332954 extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// @todo
	return new \TYPO3\CMS\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {

return 'Backend/Default';
}
public function hasLayout() {
return TRUE;
}

/**
 * section content
 */
public function section_040f06fd774092478d450774f5ba30c5da78acc8(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= '
	<h2>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments1 = array();
$arguments1['key'] = 'LLL:EXT:news/Resources/Private/Language/locallang_be.xlf:administration.newsPidListing.header';
$arguments1['id'] = NULL;
$arguments1['default'] = NULL;
$arguments1['htmlEscape'] = NULL;
$arguments1['arguments'] = NULL;
$arguments1['extensionName'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments1, $renderChildrenClosure2, $renderingContext);

$output0 .= '
	</h2>
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FlashMessagesViewHelper
$arguments3 = array();
$arguments3['class'] = 'tx-extbase-flash-message';
$arguments3['additionalAttributes'] = NULL;
$arguments3['data'] = NULL;
$arguments3['renderMode'] = 'ul';
$arguments3['dir'] = NULL;
$arguments3['id'] = NULL;
$arguments3['lang'] = NULL;
$arguments3['style'] = NULL;
$arguments3['title'] = NULL;
$arguments3['accesskey'] = NULL;
$arguments3['tabindex'] = NULL;
$arguments3['onclick'] = NULL;
$renderChildrenClosure4 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper5 = $self->getViewHelper('$viewHelper5', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\FlashMessagesViewHelper');
$viewHelper5->setArguments($arguments3);
$viewHelper5->setRenderingContext($renderingContext);
$viewHelper5->setRenderChildrenClosure($renderChildrenClosure4);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FlashMessagesViewHelper

$output0 .= $viewHelper5->initializeArgumentsAndRender();

$output0 .= '
	<p>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments6 = array();
$arguments6['key'] = 'LLL:EXT:news/Resources/Private/Language/locallang_be.xlf:administration.newsPidListing.description';
$arguments6['id'] = NULL;
$arguments6['default'] = NULL;
$arguments6['htmlEscape'] = NULL;
$arguments6['arguments'] = NULL;
$arguments6['extensionName'] = NULL;
$renderChildrenClosure7 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments6, $renderChildrenClosure7, $renderingContext);

$output0 .= '
	</p>
	<br />
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper
$arguments8 = array();
$arguments8['action'] = 'newsPidListing';
$arguments8['additionalAttributes'] = NULL;
$arguments8['data'] = NULL;
$arguments8['arguments'] = array (
);
$arguments8['controller'] = NULL;
$arguments8['extensionName'] = NULL;
$arguments8['pluginName'] = NULL;
$arguments8['pageUid'] = NULL;
$arguments8['object'] = NULL;
$arguments8['pageType'] = 0;
$arguments8['noCache'] = false;
$arguments8['noCacheHash'] = false;
$arguments8['section'] = '';
$arguments8['format'] = '';
$arguments8['additionalParams'] = array (
);
$arguments8['absolute'] = false;
$arguments8['addQueryString'] = false;
$arguments8['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments8['fieldNamePrefix'] = NULL;
$arguments8['actionUri'] = NULL;
$arguments8['objectName'] = NULL;
$arguments8['hiddenFieldClassName'] = NULL;
$arguments8['enctype'] = NULL;
$arguments8['method'] = NULL;
$arguments8['name'] = NULL;
$arguments8['onreset'] = NULL;
$arguments8['onsubmit'] = NULL;
$arguments8['class'] = NULL;
$arguments8['dir'] = NULL;
$arguments8['id'] = NULL;
$arguments8['lang'] = NULL;
$arguments8['style'] = NULL;
$arguments8['title'] = NULL;
$arguments8['accesskey'] = NULL;
$arguments8['tabindex'] = NULL;
$arguments8['onclick'] = NULL;
$renderChildrenClosure9 = function() use ($renderingContext, $self) {
$output10 = '';

$output10 .= '
		<label for="treeLevel">
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments11 = array();
$arguments11['key'] = 'LLL:EXT:lang/locallang_general.xlf:LGL.recursive';
$arguments11['id'] = NULL;
$arguments11['default'] = NULL;
$arguments11['htmlEscape'] = NULL;
$arguments11['arguments'] = NULL;
$arguments11['extensionName'] = NULL;
$renderChildrenClosure12 = function() use ($renderingContext, $self) {
return NULL;
};

$output10 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments11, $renderChildrenClosure12, $renderingContext);

$output10 .= '
		</label>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\SelectViewHelper
$arguments13 = array();
$arguments13['name'] = 'treeLevel';
$arguments13['id'] = 'treeLevel';
// Rendering Array
$array14 = array();
$array14['1'] = 1;
$array14['2'] = 2;
$array14['3'] = 3;
$array14['4'] = 4;
$array14['5'] = 5;
$array14['6'] = 6;
$array14['7'] = 7;
$arguments13['options'] = $array14;
$arguments13['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'treeLevel', $renderingContext);
// Rendering Array
$array15 = array();
$array15['onchange'] = 'this.form.submit()';
$arguments13['additionalAttributes'] = $array15;
$arguments13['data'] = NULL;
$arguments13['property'] = NULL;
$arguments13['class'] = NULL;
$arguments13['dir'] = NULL;
$arguments13['lang'] = NULL;
$arguments13['style'] = NULL;
$arguments13['title'] = NULL;
$arguments13['accesskey'] = NULL;
$arguments13['tabindex'] = NULL;
$arguments13['onclick'] = NULL;
$arguments13['multiple'] = NULL;
$arguments13['size'] = NULL;
$arguments13['disabled'] = NULL;
$arguments13['optionValueField'] = NULL;
$arguments13['optionLabelField'] = NULL;
$arguments13['sortByOptionLabel'] = false;
$arguments13['selectAllByDefault'] = false;
$arguments13['errorClass'] = 'f3-form-error';
$arguments13['prependOptionLabel'] = NULL;
$arguments13['prependOptionValue'] = NULL;
$renderChildrenClosure16 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper17 = $self->getViewHelper('$viewHelper17', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\SelectViewHelper');
$viewHelper17->setArguments($arguments13);
$viewHelper17->setRenderingContext($renderingContext);
$viewHelper17->setRenderChildrenClosure($renderChildrenClosure16);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\SelectViewHelper

$output10 .= $viewHelper17->initializeArgumentsAndRender();

$output10 .= '
	';
return $output10;
};
$viewHelper18 = $self->getViewHelper('$viewHelper18', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper');
$viewHelper18->setArguments($arguments8);
$viewHelper18->setRenderingContext($renderingContext);
$viewHelper18->setRenderChildrenClosure($renderChildrenClosure9);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper

$output0 .= $viewHelper18->initializeArgumentsAndRender();

$output0 .= '
	<table cellpadding="0" cellmargin="0" cellspacing="0" class="t3-table">
		<thead>
			<tr class="t3-row-header">
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments19 = array();
$arguments19['key'] = 'LLL:EXT:lang/locallang_tca.xlf:pages';
$arguments19['id'] = NULL;
$arguments19['default'] = NULL;
$arguments19['htmlEscape'] = NULL;
$arguments19['arguments'] = NULL;
$arguments19['extensionName'] = NULL;
$renderChildrenClosure20 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments19, $renderChildrenClosure20, $renderingContext);

$output0 .= '
				</td>
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments21 = array();
$arguments21['key'] = 'LLL:EXT:news/Resources/Private/Language/locallang_db.xlf:tx_news_domain_model_news';
$arguments21['id'] = NULL;
$arguments21['default'] = NULL;
$arguments21['htmlEscape'] = NULL;
$arguments21['arguments'] = NULL;
$arguments21['extensionName'] = NULL;
$renderChildrenClosure22 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments21, $renderChildrenClosure22, $renderingContext);

$output0 .= '
				</td>
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments23 = array();
$arguments23['key'] = 'LLL:EXT:lang/locallang_tca.xlf:sys_category';
$arguments23['id'] = NULL;
$arguments23['default'] = NULL;
$arguments23['htmlEscape'] = NULL;
$arguments23['arguments'] = NULL;
$arguments23['extensionName'] = NULL;
$renderChildrenClosure24 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments23, $renderChildrenClosure24, $renderingContext);

$output0 .= '
				</td>
			</tr>
		</thead>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments25 = array();
$arguments25['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'tree', $renderingContext);
$arguments25['as'] = 'item';
$arguments25['key'] = '';
$arguments25['reverse'] = false;
$arguments25['iteration'] = NULL;
$renderChildrenClosure26 = function() use ($renderingContext, $self) {
$output27 = '';

$output27 .= '
			<tr class="db_list_normal ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments28 = array();
// Rendering Boolean node
$arguments28['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.countNewsAndCategories', $renderingContext));
$arguments28['then'] = 'show';
$arguments28['else'] = 'hide';
$renderChildrenClosure29 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper30 = $self->getViewHelper('$viewHelper30', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper30->setArguments($arguments28);
$viewHelper30->setRenderingContext($renderingContext);
$viewHelper30->setRenderChildrenClosure($renderChildrenClosure29);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output27 .= $viewHelper30->initializeArgumentsAndRender();

$output27 .= '">
				<td class="icon" nowrap="nowrap">
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper
$arguments31 = array();
$arguments31['parseFuncTSPath'] = '';
$renderChildrenClosure32 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.HTML', $renderingContext);
};
$viewHelper33 = $self->getViewHelper('$viewHelper33', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper');
$viewHelper33->setArguments($arguments31);
$viewHelper33->setRenderingContext($renderingContext);
$viewHelper33->setRenderChildrenClosure($renderChildrenClosure32);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper

$output27 .= $viewHelper33->initializeArgumentsAndRender();

$output27 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments34 = array();
$arguments34['action'] = 'index';
// Rendering Array
$array35 = array();
$array35['id'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.row.uid', $renderingContext);
$arguments34['additionalParams'] = $array35;
$output36 = '';

$output36 .= 'UID: ';

$output36 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.row.uid', $renderingContext);
$arguments34['title'] = $output36;
$arguments34['additionalAttributes'] = NULL;
$arguments34['data'] = NULL;
$arguments34['arguments'] = array (
);
$arguments34['controller'] = NULL;
$arguments34['extensionName'] = NULL;
$arguments34['pluginName'] = NULL;
$arguments34['pageUid'] = NULL;
$arguments34['pageType'] = 0;
$arguments34['noCache'] = false;
$arguments34['noCacheHash'] = false;
$arguments34['section'] = '';
$arguments34['format'] = '';
$arguments34['linkAccessRestrictedPages'] = false;
$arguments34['absolute'] = false;
$arguments34['addQueryString'] = false;
$arguments34['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments34['addQueryStringMethod'] = NULL;
$arguments34['class'] = NULL;
$arguments34['dir'] = NULL;
$arguments34['id'] = NULL;
$arguments34['lang'] = NULL;
$arguments34['style'] = NULL;
$arguments34['accesskey'] = NULL;
$arguments34['tabindex'] = NULL;
$arguments34['onclick'] = NULL;
$arguments34['name'] = NULL;
$arguments34['rel'] = NULL;
$arguments34['rev'] = NULL;
$arguments34['target'] = NULL;
$renderChildrenClosure37 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments38 = array();
$arguments38['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.row.title', $renderingContext);
$arguments38['keepQuotes'] = false;
$arguments38['encoding'] = NULL;
$arguments38['doubleEncode'] = true;
$renderChildrenClosure39 = function() use ($renderingContext, $self) {
return NULL;
};
$value40 = ($arguments38['value'] !== NULL ? $arguments38['value'] : $renderChildrenClosure39());
return (!is_string($value40) ? $value40 : htmlspecialchars($value40, ($arguments38['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments38['encoding'] !== NULL ? $arguments38['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments38['doubleEncode']));
};
$viewHelper41 = $self->getViewHelper('$viewHelper41', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper41->setArguments($arguments34);
$viewHelper41->setRenderingContext($renderingContext);
$viewHelper41->setRenderChildrenClosure($renderChildrenClosure37);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper

$output27 .= $viewHelper41->initializeArgumentsAndRender();

$output27 .= '
				</td>
				<td>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments42 = array();
$arguments42['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.countNews', $renderingContext);
$arguments42['keepQuotes'] = false;
$arguments42['encoding'] = NULL;
$arguments42['doubleEncode'] = true;
$renderChildrenClosure43 = function() use ($renderingContext, $self) {
return NULL;
};
$value44 = ($arguments42['value'] !== NULL ? $arguments42['value'] : $renderChildrenClosure43());

$output27 .= (!is_string($value44) ? $value44 : htmlspecialchars($value44, ($arguments42['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments42['encoding'] !== NULL ? $arguments42['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments42['doubleEncode']));

$output27 .= '</td>
				<td>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments45 = array();
$arguments45['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.countCategories', $renderingContext);
$arguments45['keepQuotes'] = false;
$arguments45['encoding'] = NULL;
$arguments45['doubleEncode'] = true;
$renderChildrenClosure46 = function() use ($renderingContext, $self) {
return NULL;
};
$value47 = ($arguments45['value'] !== NULL ? $arguments45['value'] : $renderChildrenClosure46());

$output27 .= (!is_string($value47) ? $value47 : htmlspecialchars($value47, ($arguments45['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments45['encoding'] !== NULL ? $arguments45['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments45['doubleEncode']));

$output27 .= '</td>
			</tr>
		';
return $output27;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments25, $renderChildrenClosure26, $renderingContext);

$output0 .= '
	</table>
';

return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output48 = '';

$output48 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper
$arguments49 = array();
$arguments49['name'] = 'Backend/Default';
$renderChildrenClosure50 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper51 = $self->getViewHelper('$viewHelper51', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper51->setArguments($arguments49);
$viewHelper51->setRenderingContext($renderingContext);
$viewHelper51->setRenderChildrenClosure($renderChildrenClosure50);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper

$output48 .= $viewHelper51->initializeArgumentsAndRender();

$output48 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments52 = array();
$arguments52['name'] = 'content';
$renderChildrenClosure53 = function() use ($renderingContext, $self) {
$output54 = '';

$output54 .= '
	<h2>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments55 = array();
$arguments55['key'] = 'LLL:EXT:news/Resources/Private/Language/locallang_be.xlf:administration.newsPidListing.header';
$arguments55['id'] = NULL;
$arguments55['default'] = NULL;
$arguments55['htmlEscape'] = NULL;
$arguments55['arguments'] = NULL;
$arguments55['extensionName'] = NULL;
$renderChildrenClosure56 = function() use ($renderingContext, $self) {
return NULL;
};

$output54 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments55, $renderChildrenClosure56, $renderingContext);

$output54 .= '
	</h2>
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FlashMessagesViewHelper
$arguments57 = array();
$arguments57['class'] = 'tx-extbase-flash-message';
$arguments57['additionalAttributes'] = NULL;
$arguments57['data'] = NULL;
$arguments57['renderMode'] = 'ul';
$arguments57['dir'] = NULL;
$arguments57['id'] = NULL;
$arguments57['lang'] = NULL;
$arguments57['style'] = NULL;
$arguments57['title'] = NULL;
$arguments57['accesskey'] = NULL;
$arguments57['tabindex'] = NULL;
$arguments57['onclick'] = NULL;
$renderChildrenClosure58 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper59 = $self->getViewHelper('$viewHelper59', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\FlashMessagesViewHelper');
$viewHelper59->setArguments($arguments57);
$viewHelper59->setRenderingContext($renderingContext);
$viewHelper59->setRenderChildrenClosure($renderChildrenClosure58);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FlashMessagesViewHelper

$output54 .= $viewHelper59->initializeArgumentsAndRender();

$output54 .= '
	<p>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments60 = array();
$arguments60['key'] = 'LLL:EXT:news/Resources/Private/Language/locallang_be.xlf:administration.newsPidListing.description';
$arguments60['id'] = NULL;
$arguments60['default'] = NULL;
$arguments60['htmlEscape'] = NULL;
$arguments60['arguments'] = NULL;
$arguments60['extensionName'] = NULL;
$renderChildrenClosure61 = function() use ($renderingContext, $self) {
return NULL;
};

$output54 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments60, $renderChildrenClosure61, $renderingContext);

$output54 .= '
	</p>
	<br />
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper
$arguments62 = array();
$arguments62['action'] = 'newsPidListing';
$arguments62['additionalAttributes'] = NULL;
$arguments62['data'] = NULL;
$arguments62['arguments'] = array (
);
$arguments62['controller'] = NULL;
$arguments62['extensionName'] = NULL;
$arguments62['pluginName'] = NULL;
$arguments62['pageUid'] = NULL;
$arguments62['object'] = NULL;
$arguments62['pageType'] = 0;
$arguments62['noCache'] = false;
$arguments62['noCacheHash'] = false;
$arguments62['section'] = '';
$arguments62['format'] = '';
$arguments62['additionalParams'] = array (
);
$arguments62['absolute'] = false;
$arguments62['addQueryString'] = false;
$arguments62['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments62['fieldNamePrefix'] = NULL;
$arguments62['actionUri'] = NULL;
$arguments62['objectName'] = NULL;
$arguments62['hiddenFieldClassName'] = NULL;
$arguments62['enctype'] = NULL;
$arguments62['method'] = NULL;
$arguments62['name'] = NULL;
$arguments62['onreset'] = NULL;
$arguments62['onsubmit'] = NULL;
$arguments62['class'] = NULL;
$arguments62['dir'] = NULL;
$arguments62['id'] = NULL;
$arguments62['lang'] = NULL;
$arguments62['style'] = NULL;
$arguments62['title'] = NULL;
$arguments62['accesskey'] = NULL;
$arguments62['tabindex'] = NULL;
$arguments62['onclick'] = NULL;
$renderChildrenClosure63 = function() use ($renderingContext, $self) {
$output64 = '';

$output64 .= '
		<label for="treeLevel">
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments65 = array();
$arguments65['key'] = 'LLL:EXT:lang/locallang_general.xlf:LGL.recursive';
$arguments65['id'] = NULL;
$arguments65['default'] = NULL;
$arguments65['htmlEscape'] = NULL;
$arguments65['arguments'] = NULL;
$arguments65['extensionName'] = NULL;
$renderChildrenClosure66 = function() use ($renderingContext, $self) {
return NULL;
};

$output64 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments65, $renderChildrenClosure66, $renderingContext);

$output64 .= '
		</label>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\SelectViewHelper
$arguments67 = array();
$arguments67['name'] = 'treeLevel';
$arguments67['id'] = 'treeLevel';
// Rendering Array
$array68 = array();
$array68['1'] = 1;
$array68['2'] = 2;
$array68['3'] = 3;
$array68['4'] = 4;
$array68['5'] = 5;
$array68['6'] = 6;
$array68['7'] = 7;
$arguments67['options'] = $array68;
$arguments67['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'treeLevel', $renderingContext);
// Rendering Array
$array69 = array();
$array69['onchange'] = 'this.form.submit()';
$arguments67['additionalAttributes'] = $array69;
$arguments67['data'] = NULL;
$arguments67['property'] = NULL;
$arguments67['class'] = NULL;
$arguments67['dir'] = NULL;
$arguments67['lang'] = NULL;
$arguments67['style'] = NULL;
$arguments67['title'] = NULL;
$arguments67['accesskey'] = NULL;
$arguments67['tabindex'] = NULL;
$arguments67['onclick'] = NULL;
$arguments67['multiple'] = NULL;
$arguments67['size'] = NULL;
$arguments67['disabled'] = NULL;
$arguments67['optionValueField'] = NULL;
$arguments67['optionLabelField'] = NULL;
$arguments67['sortByOptionLabel'] = false;
$arguments67['selectAllByDefault'] = false;
$arguments67['errorClass'] = 'f3-form-error';
$arguments67['prependOptionLabel'] = NULL;
$arguments67['prependOptionValue'] = NULL;
$renderChildrenClosure70 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper71 = $self->getViewHelper('$viewHelper71', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\SelectViewHelper');
$viewHelper71->setArguments($arguments67);
$viewHelper71->setRenderingContext($renderingContext);
$viewHelper71->setRenderChildrenClosure($renderChildrenClosure70);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\SelectViewHelper

$output64 .= $viewHelper71->initializeArgumentsAndRender();

$output64 .= '
	';
return $output64;
};
$viewHelper72 = $self->getViewHelper('$viewHelper72', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper');
$viewHelper72->setArguments($arguments62);
$viewHelper72->setRenderingContext($renderingContext);
$viewHelper72->setRenderChildrenClosure($renderChildrenClosure63);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper

$output54 .= $viewHelper72->initializeArgumentsAndRender();

$output54 .= '
	<table cellpadding="0" cellmargin="0" cellspacing="0" class="t3-table">
		<thead>
			<tr class="t3-row-header">
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments73 = array();
$arguments73['key'] = 'LLL:EXT:lang/locallang_tca.xlf:pages';
$arguments73['id'] = NULL;
$arguments73['default'] = NULL;
$arguments73['htmlEscape'] = NULL;
$arguments73['arguments'] = NULL;
$arguments73['extensionName'] = NULL;
$renderChildrenClosure74 = function() use ($renderingContext, $self) {
return NULL;
};

$output54 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments73, $renderChildrenClosure74, $renderingContext);

$output54 .= '
				</td>
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments75 = array();
$arguments75['key'] = 'LLL:EXT:news/Resources/Private/Language/locallang_db.xlf:tx_news_domain_model_news';
$arguments75['id'] = NULL;
$arguments75['default'] = NULL;
$arguments75['htmlEscape'] = NULL;
$arguments75['arguments'] = NULL;
$arguments75['extensionName'] = NULL;
$renderChildrenClosure76 = function() use ($renderingContext, $self) {
return NULL;
};

$output54 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments75, $renderChildrenClosure76, $renderingContext);

$output54 .= '
				</td>
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments77 = array();
$arguments77['key'] = 'LLL:EXT:lang/locallang_tca.xlf:sys_category';
$arguments77['id'] = NULL;
$arguments77['default'] = NULL;
$arguments77['htmlEscape'] = NULL;
$arguments77['arguments'] = NULL;
$arguments77['extensionName'] = NULL;
$renderChildrenClosure78 = function() use ($renderingContext, $self) {
return NULL;
};

$output54 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments77, $renderChildrenClosure78, $renderingContext);

$output54 .= '
				</td>
			</tr>
		</thead>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments79 = array();
$arguments79['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'tree', $renderingContext);
$arguments79['as'] = 'item';
$arguments79['key'] = '';
$arguments79['reverse'] = false;
$arguments79['iteration'] = NULL;
$renderChildrenClosure80 = function() use ($renderingContext, $self) {
$output81 = '';

$output81 .= '
			<tr class="db_list_normal ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments82 = array();
// Rendering Boolean node
$arguments82['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.countNewsAndCategories', $renderingContext));
$arguments82['then'] = 'show';
$arguments82['else'] = 'hide';
$renderChildrenClosure83 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper84 = $self->getViewHelper('$viewHelper84', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper84->setArguments($arguments82);
$viewHelper84->setRenderingContext($renderingContext);
$viewHelper84->setRenderChildrenClosure($renderChildrenClosure83);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output81 .= $viewHelper84->initializeArgumentsAndRender();

$output81 .= '">
				<td class="icon" nowrap="nowrap">
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper
$arguments85 = array();
$arguments85['parseFuncTSPath'] = '';
$renderChildrenClosure86 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.HTML', $renderingContext);
};
$viewHelper87 = $self->getViewHelper('$viewHelper87', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper');
$viewHelper87->setArguments($arguments85);
$viewHelper87->setRenderingContext($renderingContext);
$viewHelper87->setRenderChildrenClosure($renderChildrenClosure86);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper

$output81 .= $viewHelper87->initializeArgumentsAndRender();

$output81 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments88 = array();
$arguments88['action'] = 'index';
// Rendering Array
$array89 = array();
$array89['id'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.row.uid', $renderingContext);
$arguments88['additionalParams'] = $array89;
$output90 = '';

$output90 .= 'UID: ';

$output90 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.row.uid', $renderingContext);
$arguments88['title'] = $output90;
$arguments88['additionalAttributes'] = NULL;
$arguments88['data'] = NULL;
$arguments88['arguments'] = array (
);
$arguments88['controller'] = NULL;
$arguments88['extensionName'] = NULL;
$arguments88['pluginName'] = NULL;
$arguments88['pageUid'] = NULL;
$arguments88['pageType'] = 0;
$arguments88['noCache'] = false;
$arguments88['noCacheHash'] = false;
$arguments88['section'] = '';
$arguments88['format'] = '';
$arguments88['linkAccessRestrictedPages'] = false;
$arguments88['absolute'] = false;
$arguments88['addQueryString'] = false;
$arguments88['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments88['addQueryStringMethod'] = NULL;
$arguments88['class'] = NULL;
$arguments88['dir'] = NULL;
$arguments88['id'] = NULL;
$arguments88['lang'] = NULL;
$arguments88['style'] = NULL;
$arguments88['accesskey'] = NULL;
$arguments88['tabindex'] = NULL;
$arguments88['onclick'] = NULL;
$arguments88['name'] = NULL;
$arguments88['rel'] = NULL;
$arguments88['rev'] = NULL;
$arguments88['target'] = NULL;
$renderChildrenClosure91 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments92 = array();
$arguments92['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.row.title', $renderingContext);
$arguments92['keepQuotes'] = false;
$arguments92['encoding'] = NULL;
$arguments92['doubleEncode'] = true;
$renderChildrenClosure93 = function() use ($renderingContext, $self) {
return NULL;
};
$value94 = ($arguments92['value'] !== NULL ? $arguments92['value'] : $renderChildrenClosure93());
return (!is_string($value94) ? $value94 : htmlspecialchars($value94, ($arguments92['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments92['encoding'] !== NULL ? $arguments92['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments92['doubleEncode']));
};
$viewHelper95 = $self->getViewHelper('$viewHelper95', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper95->setArguments($arguments88);
$viewHelper95->setRenderingContext($renderingContext);
$viewHelper95->setRenderChildrenClosure($renderChildrenClosure91);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper

$output81 .= $viewHelper95->initializeArgumentsAndRender();

$output81 .= '
				</td>
				<td>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments96 = array();
$arguments96['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.countNews', $renderingContext);
$arguments96['keepQuotes'] = false;
$arguments96['encoding'] = NULL;
$arguments96['doubleEncode'] = true;
$renderChildrenClosure97 = function() use ($renderingContext, $self) {
return NULL;
};
$value98 = ($arguments96['value'] !== NULL ? $arguments96['value'] : $renderChildrenClosure97());

$output81 .= (!is_string($value98) ? $value98 : htmlspecialchars($value98, ($arguments96['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments96['encoding'] !== NULL ? $arguments96['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments96['doubleEncode']));

$output81 .= '</td>
				<td>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments99 = array();
$arguments99['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.countCategories', $renderingContext);
$arguments99['keepQuotes'] = false;
$arguments99['encoding'] = NULL;
$arguments99['doubleEncode'] = true;
$renderChildrenClosure100 = function() use ($renderingContext, $self) {
return NULL;
};
$value101 = ($arguments99['value'] !== NULL ? $arguments99['value'] : $renderChildrenClosure100());

$output81 .= (!is_string($value101) ? $value101 : htmlspecialchars($value101, ($arguments99['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments99['encoding'] !== NULL ? $arguments99['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments99['doubleEncode']));

$output81 .= '</td>
			</tr>
		';
return $output81;
};

$output54 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments79, $renderChildrenClosure80, $renderingContext);

$output54 .= '
	</table>
';
return $output54;
};

$output48 .= '';

$output48 .= '
';

return $output48;
}


}
#1433276602    34258     