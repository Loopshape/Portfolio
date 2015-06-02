<?php
class FluidCache_Beuser_BackendUser_partial_BackendUser_IndexListRow_4946d17ae5c19c9c1b25d04035cbb29b84aff702 extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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


<tr>
	<td class="col-icon">
		<a href="#" class="t3-js-clickmenutrigger" data-table="be_users" data-uid="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments1 = array();
$arguments1['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.uid', $renderingContext);
$arguments1['keepQuotes'] = false;
$arguments1['encoding'] = NULL;
$arguments1['doubleEncode'] = true;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
return NULL;
};
$value3 = ($arguments1['value'] !== NULL ? $arguments1['value'] : $renderChildrenClosure2());

$output0 .= (!is_string($value3) ? $value3 : htmlspecialchars($value3, ($arguments1['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments1['encoding'] !== NULL ? $arguments1['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments1['doubleEncode']));

$output0 .= '" data-listframe="1" title="id=';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments4 = array();
$arguments4['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.uid', $renderingContext);
$arguments4['keepQuotes'] = false;
$arguments4['encoding'] = NULL;
$arguments4['doubleEncode'] = true;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
return NULL;
};
$value6 = ($arguments4['value'] !== NULL ? $arguments4['value'] : $renderChildrenClosure5());

$output0 .= (!is_string($value6) ? $value6 : htmlspecialchars($value6, ($arguments4['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments4['encoding'] !== NULL ? $arguments4['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments4['doubleEncode']));

$output0 .= '">
			';
// Rendering ViewHelper TYPO3\CMS\Beuser\ViewHelpers\SpriteIconForRecordViewHelper
$arguments7 = array();
$arguments7['table'] = 'be_users';
$arguments7['object'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser', $renderingContext);
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper9 = $self->getViewHelper('$viewHelper9', $renderingContext, 'TYPO3\CMS\Beuser\ViewHelpers\SpriteIconForRecordViewHelper');
$viewHelper9->setArguments($arguments7);
$viewHelper9->setRenderingContext($renderingContext);
$viewHelper9->setRenderChildrenClosure($renderChildrenClosure8);
// End of ViewHelper TYPO3\CMS\Beuser\ViewHelpers\SpriteIconForRecordViewHelper

$output0 .= $viewHelper9->initializeArgumentsAndRender();

$output0 .= '
		</a>
	</td>
	<td class="col-title">
		<a href="';
// Rendering ViewHelper TYPO3\CMS\Beuser\ViewHelpers\EditRecordViewHelper
$arguments10 = array();
$output11 = '';

$output11 .= 'edit[be_users][';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments12 = array();
$arguments12['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.uid', $renderingContext);
$arguments12['keepQuotes'] = false;
$arguments12['encoding'] = NULL;
$arguments12['doubleEncode'] = true;
$renderChildrenClosure13 = function() use ($renderingContext, $self) {
return NULL;
};
$value14 = ($arguments12['value'] !== NULL ? $arguments12['value'] : $renderChildrenClosure13());

$output11 .= (!is_string($value14) ? $value14 : htmlspecialchars($value14, ($arguments12['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments12['encoding'] !== NULL ? $arguments12['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments12['doubleEncode']));

$output11 .= ']=edit&returnUrl=';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments15 = array();
$arguments15['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'returnUrl', $renderingContext);
$arguments15['keepQuotes'] = false;
$arguments15['encoding'] = NULL;
$arguments15['doubleEncode'] = true;
$renderChildrenClosure16 = function() use ($renderingContext, $self) {
return NULL;
};
$value17 = ($arguments15['value'] !== NULL ? $arguments15['value'] : $renderChildrenClosure16());

$output11 .= (!is_string($value17) ? $value17 : htmlspecialchars($value17, ($arguments15['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments15['encoding'] !== NULL ? $arguments15['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments15['doubleEncode']));
$arguments10['parameters'] = $output11;
$renderChildrenClosure18 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper19 = $self->getViewHelper('$viewHelper19', $renderingContext, 'TYPO3\CMS\Beuser\ViewHelpers\EditRecordViewHelper');
$viewHelper19->setArguments($arguments10);
$viewHelper19->setRenderingContext($renderingContext);
$viewHelper19->setRenderChildrenClosure($renderChildrenClosure18);
// End of ViewHelper TYPO3\CMS\Beuser\ViewHelpers\EditRecordViewHelper

$output0 .= $viewHelper19->initializeArgumentsAndRender();

$output0 .= '">
			<b>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments20 = array();
$arguments20['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.userName', $renderingContext);
$arguments20['keepQuotes'] = false;
$arguments20['encoding'] = NULL;
$arguments20['doubleEncode'] = true;
$renderChildrenClosure21 = function() use ($renderingContext, $self) {
return NULL;
};
$value22 = ($arguments20['value'] !== NULL ? $arguments20['value'] : $renderChildrenClosure21());

$output0 .= (!is_string($value22) ? $value22 : htmlspecialchars($value22, ($arguments20['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments20['encoding'] !== NULL ? $arguments20['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments20['doubleEncode']));

$output0 .= '</b><br />
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments23 = array();
$arguments23['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.realName', $renderingContext);
$arguments23['keepQuotes'] = false;
$arguments23['encoding'] = NULL;
$arguments23['doubleEncode'] = true;
$renderChildrenClosure24 = function() use ($renderingContext, $self) {
return NULL;
};
$value25 = ($arguments23['value'] !== NULL ? $arguments23['value'] : $renderChildrenClosure24());

$output0 .= (!is_string($value25) ? $value25 : htmlspecialchars($value25, ($arguments23['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments23['encoding'] !== NULL ? $arguments23['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments23['doubleEncode']));

$output0 .= '
		</a>
	</td>
	<td>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments26 = array();
// Rendering Boolean node
$arguments26['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.lastLoginDateAndTime', $renderingContext));
$arguments26['then'] = NULL;
$arguments26['else'] = NULL;
$renderChildrenClosure27 = function() use ($renderingContext, $self) {
$output28 = '';

$output28 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments29 = array();
$renderChildrenClosure30 = function() use ($renderingContext, $self) {
$output31 = '';

$output31 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments32 = array();
$output33 = '';

$output33 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'dateFormat', $renderingContext);

$output33 .= ' ';

$output33 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'timeFormat', $renderingContext);
$arguments32['format'] = $output33;
$arguments32['date'] = NULL;
$renderChildrenClosure34 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.lastLoginDateAndTime', $renderingContext);
};

$output31 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments32, $renderChildrenClosure34, $renderingContext);

$output31 .= '
			';
return $output31;
};

$output28 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments29, $renderChildrenClosure30, $renderingContext);

$output28 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments35 = array();
$renderChildrenClosure36 = function() use ($renderingContext, $self) {
$output37 = '';

$output37 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments38 = array();
$arguments38['key'] = 'never';
$arguments38['id'] = NULL;
$arguments38['default'] = NULL;
$arguments38['htmlEscape'] = NULL;
$arguments38['arguments'] = NULL;
$arguments38['extensionName'] = NULL;
$renderChildrenClosure39 = function() use ($renderingContext, $self) {
return NULL;
};

$output37 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments38, $renderChildrenClosure39, $renderingContext);

$output37 .= '
			';
return $output37;
};

$output28 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments35, $renderChildrenClosure36, $renderingContext);

$output28 .= '
		';
return $output28;
};
$arguments26['__thenClosure'] = function() use ($renderingContext, $self) {
$output40 = '';

$output40 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments41 = array();
$output42 = '';

$output42 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'dateFormat', $renderingContext);

$output42 .= ' ';

$output42 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'timeFormat', $renderingContext);
$arguments41['format'] = $output42;
$arguments41['date'] = NULL;
$renderChildrenClosure43 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.lastLoginDateAndTime', $renderingContext);
};

$output40 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments41, $renderChildrenClosure43, $renderingContext);

$output40 .= '
			';
return $output40;
};
$arguments26['__elseClosure'] = function() use ($renderingContext, $self) {
$output44 = '';

$output44 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments45 = array();
$arguments45['key'] = 'never';
$arguments45['id'] = NULL;
$arguments45['default'] = NULL;
$arguments45['htmlEscape'] = NULL;
$arguments45['arguments'] = NULL;
$arguments45['extensionName'] = NULL;
$renderChildrenClosure46 = function() use ($renderingContext, $self) {
return NULL;
};

$output44 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments45, $renderChildrenClosure46, $renderingContext);

$output44 .= '
			';
return $output44;
};
$viewHelper47 = $self->getViewHelper('$viewHelper47', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper47->setArguments($arguments26);
$viewHelper47->setRenderingContext($renderingContext);
$viewHelper47->setRenderChildrenClosure($renderChildrenClosure27);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper47->initializeArgumentsAndRender();

$output0 .= '
	</td>
	<td class="col-control">
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments48 = array();
$arguments48['action'] = 'addToCompareList';
// Rendering Array
$array49 = array();
$array49['uid'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.uid', $renderingContext);
$arguments48['arguments'] = $array49;
$arguments48['class'] = 'btn btn-default';
$arguments48['additionalAttributes'] = NULL;
$arguments48['data'] = NULL;
$arguments48['controller'] = NULL;
$arguments48['extensionName'] = NULL;
$arguments48['pluginName'] = NULL;
$arguments48['pageUid'] = NULL;
$arguments48['pageType'] = 0;
$arguments48['noCache'] = false;
$arguments48['noCacheHash'] = false;
$arguments48['section'] = '';
$arguments48['format'] = '';
$arguments48['linkAccessRestrictedPages'] = false;
$arguments48['additionalParams'] = array (
);
$arguments48['absolute'] = false;
$arguments48['addQueryString'] = false;
$arguments48['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments48['addQueryStringMethod'] = NULL;
$arguments48['dir'] = NULL;
$arguments48['id'] = NULL;
$arguments48['lang'] = NULL;
$arguments48['style'] = NULL;
$arguments48['title'] = NULL;
$arguments48['accesskey'] = NULL;
$arguments48['tabindex'] = NULL;
$arguments48['onclick'] = NULL;
$arguments48['name'] = NULL;
$arguments48['rel'] = NULL;
$arguments48['rev'] = NULL;
$arguments48['target'] = NULL;
$renderChildrenClosure50 = function() use ($renderingContext, $self) {
$output51 = '';
// Rendering ViewHelper TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper
$arguments52 = array();
$arguments52['iconName'] = 'actions-edit-add';
$arguments52['options'] = array (
);
$renderChildrenClosure53 = function() use ($renderingContext, $self) {
return NULL;
};

$output51 .= TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper::renderStatic($arguments52, $renderChildrenClosure53, $renderingContext);

$output51 .= ' ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments54 = array();
$arguments54['key'] = 'compare';
$arguments54['id'] = NULL;
$arguments54['default'] = NULL;
$arguments54['htmlEscape'] = NULL;
$arguments54['arguments'] = NULL;
$arguments54['extensionName'] = NULL;
$renderChildrenClosure55 = function() use ($renderingContext, $self) {
return NULL;
};

$output51 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments54, $renderChildrenClosure55, $renderingContext);
return $output51;
};
$viewHelper56 = $self->getViewHelper('$viewHelper56', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper56->setArguments($arguments48);
$viewHelper56->setRenderingContext($renderingContext);
$viewHelper56->setRenderChildrenClosure($renderChildrenClosure50);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper

$output0 .= $viewHelper56->initializeArgumentsAndRender();

$output0 .= '
		<div class="btn-group" role="group">
			<a class="btn btn-default" href="#" onclick="top.launchView(\'be_users\', \'';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments57 = array();
$arguments57['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.uid', $renderingContext);
$arguments57['keepQuotes'] = false;
$arguments57['encoding'] = NULL;
$arguments57['doubleEncode'] = true;
$renderChildrenClosure58 = function() use ($renderingContext, $self) {
return NULL;
};
$value59 = ($arguments57['value'] !== NULL ? $arguments57['value'] : $renderChildrenClosure58());

$output0 .= (!is_string($value59) ? $value59 : htmlspecialchars($value59, ($arguments57['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments57['encoding'] !== NULL ? $arguments57['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments57['doubleEncode']));

$output0 .= '\'); return false;">';
// Rendering ViewHelper TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper
$arguments60 = array();
$arguments60['iconName'] = 'actions-document-info';
$arguments60['options'] = array (
);
$renderChildrenClosure61 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper::renderStatic($arguments60, $renderChildrenClosure61, $renderingContext);

$output0 .= '</a>
			<a class="btn btn-default" href="';
// Rendering ViewHelper TYPO3\CMS\Beuser\ViewHelpers\EditRecordViewHelper
$arguments62 = array();
$output63 = '';

$output63 .= 'edit[be_users][';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments64 = array();
$arguments64['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.uid', $renderingContext);
$arguments64['keepQuotes'] = false;
$arguments64['encoding'] = NULL;
$arguments64['doubleEncode'] = true;
$renderChildrenClosure65 = function() use ($renderingContext, $self) {
return NULL;
};
$value66 = ($arguments64['value'] !== NULL ? $arguments64['value'] : $renderChildrenClosure65());

$output63 .= (!is_string($value66) ? $value66 : htmlspecialchars($value66, ($arguments64['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments64['encoding'] !== NULL ? $arguments64['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments64['doubleEncode']));

$output63 .= ']=edit&returnUrl=';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments67 = array();
$arguments67['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'returnUrl', $renderingContext);
$arguments67['keepQuotes'] = false;
$arguments67['encoding'] = NULL;
$arguments67['doubleEncode'] = true;
$renderChildrenClosure68 = function() use ($renderingContext, $self) {
return NULL;
};
$value69 = ($arguments67['value'] !== NULL ? $arguments67['value'] : $renderChildrenClosure68());

$output63 .= (!is_string($value69) ? $value69 : htmlspecialchars($value69, ($arguments67['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments67['encoding'] !== NULL ? $arguments67['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments67['doubleEncode']));
$arguments62['parameters'] = $output63;
$renderChildrenClosure70 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper71 = $self->getViewHelper('$viewHelper71', $renderingContext, 'TYPO3\CMS\Beuser\ViewHelpers\EditRecordViewHelper');
$viewHelper71->setArguments($arguments62);
$viewHelper71->setRenderingContext($renderingContext);
$viewHelper71->setRenderChildrenClosure($renderChildrenClosure70);
// End of ViewHelper TYPO3\CMS\Beuser\ViewHelpers\EditRecordViewHelper

$output0 .= $viewHelper71->initializeArgumentsAndRender();

$output0 .= '">';
// Rendering ViewHelper TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper
$arguments72 = array();
$arguments72['iconName'] = 'actions-document-open';
$arguments72['options'] = array (
);
$renderChildrenClosure73 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper::renderStatic($arguments72, $renderChildrenClosure73, $renderingContext);

$output0 .= '</a>
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments74 = array();
// Rendering Boolean node
$arguments74['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.currentlyLoggedIn', $renderingContext), 1);
$arguments74['then'] = NULL;
$arguments74['else'] = NULL;
$renderChildrenClosure75 = function() use ($renderingContext, $self) {
$output76 = '';

$output76 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments77 = array();
$renderChildrenClosure78 = function() use ($renderingContext, $self) {
$output79 = '';

$output79 .= '
					<span class="btn btn-default disabled">';
// Rendering ViewHelper TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper
$arguments80 = array();
$arguments80['iconName'] = 'empty-empty';
$arguments80['options'] = array (
);
$renderChildrenClosure81 = function() use ($renderingContext, $self) {
return NULL;
};

$output79 .= TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper::renderStatic($arguments80, $renderChildrenClosure81, $renderingContext);

$output79 .= '</span>
				';
return $output79;
};

$output76 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments77, $renderChildrenClosure78, $renderingContext);

$output76 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments82 = array();
$renderChildrenClosure83 = function() use ($renderingContext, $self) {
$output84 = '';

$output84 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments85 = array();
// Rendering Boolean node
$arguments85['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.isDisabled', $renderingContext), 1);
$arguments85['then'] = NULL;
$arguments85['else'] = NULL;
$renderChildrenClosure86 = function() use ($renderingContext, $self) {
$output87 = '';

$output87 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments88 = array();
$renderChildrenClosure89 = function() use ($renderingContext, $self) {
$output90 = '';

$output90 .= '
							<a class="btn btn-default" href="';
// Rendering ViewHelper TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper
$arguments91 = array();
$output92 = '';

$output92 .= 'data[be_users][';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments93 = array();
$arguments93['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.uid', $renderingContext);
$arguments93['keepQuotes'] = false;
$arguments93['encoding'] = NULL;
$arguments93['doubleEncode'] = true;
$renderChildrenClosure94 = function() use ($renderingContext, $self) {
return NULL;
};
$value95 = ($arguments93['value'] !== NULL ? $arguments93['value'] : $renderChildrenClosure94());

$output92 .= (!is_string($value95) ? $value95 : htmlspecialchars($value95, ($arguments93['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments93['encoding'] !== NULL ? $arguments93['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments93['doubleEncode']));

$output92 .= '][disable]=0';
$arguments91['parameters'] = $output92;
$arguments91['redirectUrl'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'redirectUrl', $renderingContext);
$renderChildrenClosure96 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper97 = $self->getViewHelper('$viewHelper97', $renderingContext, 'TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper');
$viewHelper97->setArguments($arguments91);
$viewHelper97->setRenderingContext($renderingContext);
$viewHelper97->setRenderChildrenClosure($renderChildrenClosure96);
// End of ViewHelper TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper

$output90 .= $viewHelper97->initializeArgumentsAndRender();

$output90 .= '">';
// Rendering ViewHelper TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper
$arguments98 = array();
$arguments98['iconName'] = 'actions-edit-unhide';
// Rendering Array
$array99 = array();
$array99['title'] = 'unhide';
$arguments98['options'] = $array99;
$renderChildrenClosure100 = function() use ($renderingContext, $self) {
return NULL;
};

$output90 .= TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper::renderStatic($arguments98, $renderChildrenClosure100, $renderingContext);

$output90 .= '</a>
						';
return $output90;
};

$output87 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments88, $renderChildrenClosure89, $renderingContext);

$output87 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments101 = array();
$renderChildrenClosure102 = function() use ($renderingContext, $self) {
$output103 = '';

$output103 .= '
							<a class="btn btn-default" href="';
// Rendering ViewHelper TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper
$arguments104 = array();
$output105 = '';

$output105 .= 'data[be_users][';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments106 = array();
$arguments106['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.uid', $renderingContext);
$arguments106['keepQuotes'] = false;
$arguments106['encoding'] = NULL;
$arguments106['doubleEncode'] = true;
$renderChildrenClosure107 = function() use ($renderingContext, $self) {
return NULL;
};
$value108 = ($arguments106['value'] !== NULL ? $arguments106['value'] : $renderChildrenClosure107());

$output105 .= (!is_string($value108) ? $value108 : htmlspecialchars($value108, ($arguments106['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments106['encoding'] !== NULL ? $arguments106['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments106['doubleEncode']));

$output105 .= '][disable]=1';
$arguments104['parameters'] = $output105;
$arguments104['redirectUrl'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'redirectUrl', $renderingContext);
$renderChildrenClosure109 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper110 = $self->getViewHelper('$viewHelper110', $renderingContext, 'TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper');
$viewHelper110->setArguments($arguments104);
$viewHelper110->setRenderingContext($renderingContext);
$viewHelper110->setRenderChildrenClosure($renderChildrenClosure109);
// End of ViewHelper TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper

$output103 .= $viewHelper110->initializeArgumentsAndRender();

$output103 .= '">';
// Rendering ViewHelper TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper
$arguments111 = array();
$arguments111['iconName'] = 'actions-edit-hide';
// Rendering Array
$array112 = array();
$array112['title'] = 'hide';
$arguments111['options'] = $array112;
$renderChildrenClosure113 = function() use ($renderingContext, $self) {
return NULL;
};

$output103 .= TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper::renderStatic($arguments111, $renderChildrenClosure113, $renderingContext);

$output103 .= '</a>
						';
return $output103;
};

$output87 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments101, $renderChildrenClosure102, $renderingContext);

$output87 .= '
					';
return $output87;
};
$arguments85['__thenClosure'] = function() use ($renderingContext, $self) {
$output114 = '';

$output114 .= '
							<a class="btn btn-default" href="';
// Rendering ViewHelper TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper
$arguments115 = array();
$output116 = '';

$output116 .= 'data[be_users][';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments117 = array();
$arguments117['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.uid', $renderingContext);
$arguments117['keepQuotes'] = false;
$arguments117['encoding'] = NULL;
$arguments117['doubleEncode'] = true;
$renderChildrenClosure118 = function() use ($renderingContext, $self) {
return NULL;
};
$value119 = ($arguments117['value'] !== NULL ? $arguments117['value'] : $renderChildrenClosure118());

$output116 .= (!is_string($value119) ? $value119 : htmlspecialchars($value119, ($arguments117['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments117['encoding'] !== NULL ? $arguments117['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments117['doubleEncode']));

$output116 .= '][disable]=0';
$arguments115['parameters'] = $output116;
$arguments115['redirectUrl'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'redirectUrl', $renderingContext);
$renderChildrenClosure120 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper121 = $self->getViewHelper('$viewHelper121', $renderingContext, 'TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper');
$viewHelper121->setArguments($arguments115);
$viewHelper121->setRenderingContext($renderingContext);
$viewHelper121->setRenderChildrenClosure($renderChildrenClosure120);
// End of ViewHelper TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper

$output114 .= $viewHelper121->initializeArgumentsAndRender();

$output114 .= '">';
// Rendering ViewHelper TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper
$arguments122 = array();
$arguments122['iconName'] = 'actions-edit-unhide';
// Rendering Array
$array123 = array();
$array123['title'] = 'unhide';
$arguments122['options'] = $array123;
$renderChildrenClosure124 = function() use ($renderingContext, $self) {
return NULL;
};

$output114 .= TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper::renderStatic($arguments122, $renderChildrenClosure124, $renderingContext);

$output114 .= '</a>
						';
return $output114;
};
$arguments85['__elseClosure'] = function() use ($renderingContext, $self) {
$output125 = '';

$output125 .= '
							<a class="btn btn-default" href="';
// Rendering ViewHelper TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper
$arguments126 = array();
$output127 = '';

$output127 .= 'data[be_users][';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments128 = array();
$arguments128['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.uid', $renderingContext);
$arguments128['keepQuotes'] = false;
$arguments128['encoding'] = NULL;
$arguments128['doubleEncode'] = true;
$renderChildrenClosure129 = function() use ($renderingContext, $self) {
return NULL;
};
$value130 = ($arguments128['value'] !== NULL ? $arguments128['value'] : $renderChildrenClosure129());

$output127 .= (!is_string($value130) ? $value130 : htmlspecialchars($value130, ($arguments128['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments128['encoding'] !== NULL ? $arguments128['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments128['doubleEncode']));

$output127 .= '][disable]=1';
$arguments126['parameters'] = $output127;
$arguments126['redirectUrl'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'redirectUrl', $renderingContext);
$renderChildrenClosure131 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper132 = $self->getViewHelper('$viewHelper132', $renderingContext, 'TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper');
$viewHelper132->setArguments($arguments126);
$viewHelper132->setRenderingContext($renderingContext);
$viewHelper132->setRenderChildrenClosure($renderChildrenClosure131);
// End of ViewHelper TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper

$output125 .= $viewHelper132->initializeArgumentsAndRender();

$output125 .= '">';
// Rendering ViewHelper TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper
$arguments133 = array();
$arguments133['iconName'] = 'actions-edit-hide';
// Rendering Array
$array134 = array();
$array134['title'] = 'hide';
$arguments133['options'] = $array134;
$renderChildrenClosure135 = function() use ($renderingContext, $self) {
return NULL;
};

$output125 .= TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper::renderStatic($arguments133, $renderChildrenClosure135, $renderingContext);

$output125 .= '</a>
						';
return $output125;
};
$viewHelper136 = $self->getViewHelper('$viewHelper136', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper136->setArguments($arguments85);
$viewHelper136->setRenderingContext($renderingContext);
$viewHelper136->setRenderChildrenClosure($renderChildrenClosure86);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output84 .= $viewHelper136->initializeArgumentsAndRender();

$output84 .= '
				';
return $output84;
};

$output76 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments82, $renderChildrenClosure83, $renderingContext);

$output76 .= '
			';
return $output76;
};
$arguments74['__thenClosure'] = function() use ($renderingContext, $self) {
$output137 = '';

$output137 .= '
					<span class="btn btn-default disabled">';
// Rendering ViewHelper TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper
$arguments138 = array();
$arguments138['iconName'] = 'empty-empty';
$arguments138['options'] = array (
);
$renderChildrenClosure139 = function() use ($renderingContext, $self) {
return NULL;
};

$output137 .= TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper::renderStatic($arguments138, $renderChildrenClosure139, $renderingContext);

$output137 .= '</span>
				';
return $output137;
};
$arguments74['__elseClosure'] = function() use ($renderingContext, $self) {
$output140 = '';

$output140 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments141 = array();
// Rendering Boolean node
$arguments141['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.isDisabled', $renderingContext), 1);
$arguments141['then'] = NULL;
$arguments141['else'] = NULL;
$renderChildrenClosure142 = function() use ($renderingContext, $self) {
$output143 = '';

$output143 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments144 = array();
$renderChildrenClosure145 = function() use ($renderingContext, $self) {
$output146 = '';

$output146 .= '
							<a class="btn btn-default" href="';
// Rendering ViewHelper TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper
$arguments147 = array();
$output148 = '';

$output148 .= 'data[be_users][';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments149 = array();
$arguments149['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.uid', $renderingContext);
$arguments149['keepQuotes'] = false;
$arguments149['encoding'] = NULL;
$arguments149['doubleEncode'] = true;
$renderChildrenClosure150 = function() use ($renderingContext, $self) {
return NULL;
};
$value151 = ($arguments149['value'] !== NULL ? $arguments149['value'] : $renderChildrenClosure150());

$output148 .= (!is_string($value151) ? $value151 : htmlspecialchars($value151, ($arguments149['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments149['encoding'] !== NULL ? $arguments149['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments149['doubleEncode']));

$output148 .= '][disable]=0';
$arguments147['parameters'] = $output148;
$arguments147['redirectUrl'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'redirectUrl', $renderingContext);
$renderChildrenClosure152 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper153 = $self->getViewHelper('$viewHelper153', $renderingContext, 'TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper');
$viewHelper153->setArguments($arguments147);
$viewHelper153->setRenderingContext($renderingContext);
$viewHelper153->setRenderChildrenClosure($renderChildrenClosure152);
// End of ViewHelper TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper

$output146 .= $viewHelper153->initializeArgumentsAndRender();

$output146 .= '">';
// Rendering ViewHelper TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper
$arguments154 = array();
$arguments154['iconName'] = 'actions-edit-unhide';
// Rendering Array
$array155 = array();
$array155['title'] = 'unhide';
$arguments154['options'] = $array155;
$renderChildrenClosure156 = function() use ($renderingContext, $self) {
return NULL;
};

$output146 .= TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper::renderStatic($arguments154, $renderChildrenClosure156, $renderingContext);

$output146 .= '</a>
						';
return $output146;
};

$output143 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments144, $renderChildrenClosure145, $renderingContext);

$output143 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments157 = array();
$renderChildrenClosure158 = function() use ($renderingContext, $self) {
$output159 = '';

$output159 .= '
							<a class="btn btn-default" href="';
// Rendering ViewHelper TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper
$arguments160 = array();
$output161 = '';

$output161 .= 'data[be_users][';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments162 = array();
$arguments162['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.uid', $renderingContext);
$arguments162['keepQuotes'] = false;
$arguments162['encoding'] = NULL;
$arguments162['doubleEncode'] = true;
$renderChildrenClosure163 = function() use ($renderingContext, $self) {
return NULL;
};
$value164 = ($arguments162['value'] !== NULL ? $arguments162['value'] : $renderChildrenClosure163());

$output161 .= (!is_string($value164) ? $value164 : htmlspecialchars($value164, ($arguments162['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments162['encoding'] !== NULL ? $arguments162['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments162['doubleEncode']));

$output161 .= '][disable]=1';
$arguments160['parameters'] = $output161;
$arguments160['redirectUrl'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'redirectUrl', $renderingContext);
$renderChildrenClosure165 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper166 = $self->getViewHelper('$viewHelper166', $renderingContext, 'TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper');
$viewHelper166->setArguments($arguments160);
$viewHelper166->setRenderingContext($renderingContext);
$viewHelper166->setRenderChildrenClosure($renderChildrenClosure165);
// End of ViewHelper TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper

$output159 .= $viewHelper166->initializeArgumentsAndRender();

$output159 .= '">';
// Rendering ViewHelper TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper
$arguments167 = array();
$arguments167['iconName'] = 'actions-edit-hide';
// Rendering Array
$array168 = array();
$array168['title'] = 'hide';
$arguments167['options'] = $array168;
$renderChildrenClosure169 = function() use ($renderingContext, $self) {
return NULL;
};

$output159 .= TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper::renderStatic($arguments167, $renderChildrenClosure169, $renderingContext);

$output159 .= '</a>
						';
return $output159;
};

$output143 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments157, $renderChildrenClosure158, $renderingContext);

$output143 .= '
					';
return $output143;
};
$arguments141['__thenClosure'] = function() use ($renderingContext, $self) {
$output170 = '';

$output170 .= '
							<a class="btn btn-default" href="';
// Rendering ViewHelper TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper
$arguments171 = array();
$output172 = '';

$output172 .= 'data[be_users][';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments173 = array();
$arguments173['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.uid', $renderingContext);
$arguments173['keepQuotes'] = false;
$arguments173['encoding'] = NULL;
$arguments173['doubleEncode'] = true;
$renderChildrenClosure174 = function() use ($renderingContext, $self) {
return NULL;
};
$value175 = ($arguments173['value'] !== NULL ? $arguments173['value'] : $renderChildrenClosure174());

$output172 .= (!is_string($value175) ? $value175 : htmlspecialchars($value175, ($arguments173['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments173['encoding'] !== NULL ? $arguments173['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments173['doubleEncode']));

$output172 .= '][disable]=0';
$arguments171['parameters'] = $output172;
$arguments171['redirectUrl'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'redirectUrl', $renderingContext);
$renderChildrenClosure176 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper177 = $self->getViewHelper('$viewHelper177', $renderingContext, 'TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper');
$viewHelper177->setArguments($arguments171);
$viewHelper177->setRenderingContext($renderingContext);
$viewHelper177->setRenderChildrenClosure($renderChildrenClosure176);
// End of ViewHelper TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper

$output170 .= $viewHelper177->initializeArgumentsAndRender();

$output170 .= '">';
// Rendering ViewHelper TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper
$arguments178 = array();
$arguments178['iconName'] = 'actions-edit-unhide';
// Rendering Array
$array179 = array();
$array179['title'] = 'unhide';
$arguments178['options'] = $array179;
$renderChildrenClosure180 = function() use ($renderingContext, $self) {
return NULL;
};

$output170 .= TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper::renderStatic($arguments178, $renderChildrenClosure180, $renderingContext);

$output170 .= '</a>
						';
return $output170;
};
$arguments141['__elseClosure'] = function() use ($renderingContext, $self) {
$output181 = '';

$output181 .= '
							<a class="btn btn-default" href="';
// Rendering ViewHelper TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper
$arguments182 = array();
$output183 = '';

$output183 .= 'data[be_users][';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments184 = array();
$arguments184['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.uid', $renderingContext);
$arguments184['keepQuotes'] = false;
$arguments184['encoding'] = NULL;
$arguments184['doubleEncode'] = true;
$renderChildrenClosure185 = function() use ($renderingContext, $self) {
return NULL;
};
$value186 = ($arguments184['value'] !== NULL ? $arguments184['value'] : $renderChildrenClosure185());

$output183 .= (!is_string($value186) ? $value186 : htmlspecialchars($value186, ($arguments184['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments184['encoding'] !== NULL ? $arguments184['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments184['doubleEncode']));

$output183 .= '][disable]=1';
$arguments182['parameters'] = $output183;
$arguments182['redirectUrl'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'redirectUrl', $renderingContext);
$renderChildrenClosure187 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper188 = $self->getViewHelper('$viewHelper188', $renderingContext, 'TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper');
$viewHelper188->setArguments($arguments182);
$viewHelper188->setRenderingContext($renderingContext);
$viewHelper188->setRenderChildrenClosure($renderChildrenClosure187);
// End of ViewHelper TYPO3\CMS\Beuser\ViewHelpers\IssueCommandViewHelper

$output181 .= $viewHelper188->initializeArgumentsAndRender();

$output181 .= '">';
// Rendering ViewHelper TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper
$arguments189 = array();
$arguments189['iconName'] = 'actions-edit-hide';
// Rendering Array
$array190 = array();
$array190['title'] = 'hide';
$arguments189['options'] = $array190;
$renderChildrenClosure191 = function() use ($renderingContext, $self) {
return NULL;
};

$output181 .= TYPO3\CMS\Backend\ViewHelpers\SpriteManagerIconViewHelper::renderStatic($arguments189, $renderChildrenClosure191, $renderingContext);

$output181 .= '</a>
						';
return $output181;
};
$viewHelper192 = $self->getViewHelper('$viewHelper192', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper192->setArguments($arguments141);
$viewHelper192->setRenderingContext($renderingContext);
$viewHelper192->setRenderChildrenClosure($renderChildrenClosure142);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output140 .= $viewHelper192->initializeArgumentsAndRender();

$output140 .= '
				';
return $output140;
};
$viewHelper193 = $self->getViewHelper('$viewHelper193', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper193->setArguments($arguments74);
$viewHelper193->setRenderingContext($renderingContext);
$viewHelper193->setRenderChildrenClosure($renderChildrenClosure75);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper193->initializeArgumentsAndRender();

$output0 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Beuser\ViewHelpers\RemoveUserViewHelper
$arguments194 = array();
$arguments194['backendUser'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser', $renderingContext);
$renderChildrenClosure195 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper196 = $self->getViewHelper('$viewHelper196', $renderingContext, 'TYPO3\CMS\Beuser\ViewHelpers\RemoveUserViewHelper');
$viewHelper196->setArguments($arguments194);
$viewHelper196->setRenderingContext($renderingContext);
$viewHelper196->setRenderChildrenClosure($renderChildrenClosure195);
// End of ViewHelper TYPO3\CMS\Beuser\ViewHelpers\RemoveUserViewHelper

$output0 .= $viewHelper196->initializeArgumentsAndRender();

$output0 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Beuser\ViewHelpers\SwitchUserViewHelper
$arguments197 = array();
$arguments197['backendUser'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser', $renderingContext);
$renderChildrenClosure198 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper199 = $self->getViewHelper('$viewHelper199', $renderingContext, 'TYPO3\CMS\Beuser\ViewHelpers\SwitchUserViewHelper');
$viewHelper199->setArguments($arguments197);
$viewHelper199->setRenderingContext($renderingContext);
$viewHelper199->setRenderChildrenClosure($renderChildrenClosure198);
// End of ViewHelper TYPO3\CMS\Beuser\ViewHelpers\SwitchUserViewHelper

$output0 .= $viewHelper199->initializeArgumentsAndRender();

$output0 .= '
		</div>
	</td>
</tr>
';

return $output0;
}


}
#1433275667    49039     