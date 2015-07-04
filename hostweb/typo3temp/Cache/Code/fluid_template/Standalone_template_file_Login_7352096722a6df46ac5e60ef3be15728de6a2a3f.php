<?php
class FluidCache_Standalone_template_file_Login_7352096722a6df46ac5e60ef3be15728de6a2a3f extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
 * section loginForm
 */
public function section_762261a66d7648ab601f9687562d6f8d73ce3b01(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments1 = array();
// Rendering Boolean node
$arguments1['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'hasLoginError', $renderingContext));
$arguments1['then'] = NULL;
$arguments1['else'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$output3 = '';

$output3 .= '
		<div class="t3js-login-error" id="t3-login-error">
			<div class="alert alert-danger">
				<strong>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments4 = array();
$output5 = '';

$output5 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output5 .= 'error.login.title';
$arguments4['key'] = $output5;
$arguments4['id'] = NULL;
$arguments4['default'] = NULL;
$arguments4['htmlEscape'] = NULL;
$arguments4['arguments'] = NULL;
$arguments4['extensionName'] = NULL;
$renderChildrenClosure6 = function() use ($renderingContext, $self) {
return NULL;
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments4, $renderChildrenClosure6, $renderingContext);

$output3 .= '</strong>
				<p>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments7 = array();
$output8 = '';

$output8 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output8 .= 'error.login.description';
$arguments7['key'] = $output8;
$arguments7['id'] = NULL;
$arguments7['default'] = NULL;
$arguments7['htmlEscape'] = NULL;
$arguments7['arguments'] = NULL;
$arguments7['extensionName'] = NULL;
$renderChildrenClosure9 = function() use ($renderingContext, $self) {
return NULL;
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments7, $renderChildrenClosure9, $renderingContext);

$output3 .= '</p>
			</div>
		</div>
	';
return $output3;
};
$viewHelper10 = $self->getViewHelper('$viewHelper10', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper10->setArguments($arguments1);
$viewHelper10->setRenderingContext($renderingContext);
$viewHelper10->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper10->initializeArgumentsAndRender();

$output0 .= '
	<noscript>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper
$arguments11 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments12 = array();
$output13 = '';

$output13 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output13 .= 'error.javascript';
$arguments12['key'] = $output13;
$arguments12['id'] = NULL;
$arguments12['default'] = NULL;
$arguments12['htmlEscape'] = NULL;
$arguments12['arguments'] = NULL;
$arguments12['extensionName'] = NULL;
$renderChildrenClosure14 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments11['message'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments12, $renderChildrenClosure14, $renderingContext);
$arguments11['state'] = '2';
$arguments11['title'] = NULL;
$arguments11['iconName'] = NULL;
$arguments11['disableIcon'] = false;
$renderChildrenClosure15 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper16 = $self->getViewHelper('$viewHelper16', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper');
$viewHelper16->setArguments($arguments11);
$viewHelper16->setRenderingContext($renderingContext);
$viewHelper16->setRenderChildrenClosure($renderChildrenClosure15);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper

$output0 .= $viewHelper16->initializeArgumentsAndRender();

$output0 .= '
	</noscript>
	<div class="hidden t3js-login-error-nocookies">
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper
$arguments17 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments18 = array();
$output19 = '';

$output19 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output19 .= 'error.cookies';
$arguments18['key'] = $output19;
$arguments18['id'] = NULL;
$arguments18['default'] = NULL;
$arguments18['htmlEscape'] = NULL;
$arguments18['arguments'] = NULL;
$arguments18['extensionName'] = NULL;
$renderChildrenClosure20 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments17['message'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments18, $renderChildrenClosure20, $renderingContext);
$arguments17['state'] = '2';
$arguments17['title'] = NULL;
$arguments17['iconName'] = NULL;
$arguments17['disableIcon'] = false;
$renderChildrenClosure21 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper22 = $self->getViewHelper('$viewHelper22', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper');
$viewHelper22->setArguments($arguments17);
$viewHelper22->setRenderingContext($renderingContext);
$viewHelper22->setRenderChildrenClosure($renderChildrenClosure21);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper

$output0 .= $viewHelper22->initializeArgumentsAndRender();

$output0 .= '
	</div>
	<div class="typo3-login-form t3js-login-formfields">
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper
$arguments23 = array();
$arguments23['value'] = NULL;
$renderChildrenClosure24 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'formTag', $renderingContext);
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper::renderStatic($arguments23, $renderChildrenClosure24, $renderingContext);

$output0 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments25 = array();
// Rendering Boolean node
$arguments25['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'interfaceSelector', $renderingContext));
$arguments25['then'] = NULL;
$arguments25['else'] = NULL;
$renderChildrenClosure26 = function() use ($renderingContext, $self) {
$output27 = '';

$output27 .= '
				<div class="form-group t3js-login-interface-section" id="t3-login-interface-section">
					<div class="form-control-wrap">
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper
$arguments28 = array();
$arguments28['value'] = NULL;
$renderChildrenClosure29 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'interfaceSelector', $renderingContext);
};

$output27 .= TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper::renderStatic($arguments28, $renderChildrenClosure29, $renderingContext);

$output27 .= '
					</div>
				</div>
			';
return $output27;
};
$viewHelper30 = $self->getViewHelper('$viewHelper30', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper30->setArguments($arguments25);
$viewHelper30->setRenderingContext($renderingContext);
$viewHelper30->setRenderChildrenClosure($renderChildrenClosure26);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper30->initializeArgumentsAndRender();

$output0 .= '
			<div class="form-group t3js-login-username-section" id="t3-login-username-section">
				<div class="form-control-wrap">
					<div class="form-control-holder">
						<input type="text" id="t3-username" name="username" value="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments31 = array();
$arguments31['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'presetUsername', $renderingContext);
$arguments31['keepQuotes'] = false;
$arguments31['encoding'] = NULL;
$arguments31['doubleEncode'] = true;
$renderChildrenClosure32 = function() use ($renderingContext, $self) {
return NULL;
};
$value33 = ($arguments31['value'] !== NULL ? $arguments31['value'] : $renderChildrenClosure32());

$output0 .= (!is_string($value33) ? $value33 : htmlspecialchars($value33, ($arguments31['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments31['encoding'] !== NULL ? $arguments31['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments31['doubleEncode']));

$output0 .= '" placeholder="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments34 = array();
$output35 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments36 = array();
$arguments36['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);
$arguments36['keepQuotes'] = false;
$arguments36['encoding'] = NULL;
$arguments36['doubleEncode'] = true;
$renderChildrenClosure37 = function() use ($renderingContext, $self) {
return NULL;
};
$value38 = ($arguments36['value'] !== NULL ? $arguments36['value'] : $renderChildrenClosure37());

$output35 .= (!is_string($value38) ? $value38 : htmlspecialchars($value38, ($arguments36['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments36['encoding'] !== NULL ? $arguments36['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments36['doubleEncode']));

$output35 .= 'labels.username';
$arguments34['key'] = $output35;
$arguments34['id'] = NULL;
$arguments34['default'] = NULL;
$arguments34['htmlEscape'] = NULL;
$arguments34['arguments'] = NULL;
$arguments34['extensionName'] = NULL;
$renderChildrenClosure39 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments34, $renderChildrenClosure39, $renderingContext);

$output0 .= '" class="form-control input-login t3js-clearable t3js-login-username-field" autofocus="autofocus" required="required">
						<div class="form-notice-capslock hidden t3js-login-alert-capslock">
							<img src="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments40 = array();
$arguments40['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'images.capslock', $renderingContext);
$arguments40['keepQuotes'] = false;
$arguments40['encoding'] = NULL;
$arguments40['doubleEncode'] = true;
$renderChildrenClosure41 = function() use ($renderingContext, $self) {
return NULL;
};
$value42 = ($arguments40['value'] !== NULL ? $arguments40['value'] : $renderChildrenClosure41());

$output0 .= (!is_string($value42) ? $value42 : htmlspecialchars($value42, ($arguments40['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments40['encoding'] !== NULL ? $arguments40['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments40['doubleEncode']));

$output0 .= '" width="14" height="14" alt="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments43 = array();
$output44 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments45 = array();
$arguments45['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);
$arguments45['keepQuotes'] = false;
$arguments45['encoding'] = NULL;
$arguments45['doubleEncode'] = true;
$renderChildrenClosure46 = function() use ($renderingContext, $self) {
return NULL;
};
$value47 = ($arguments45['value'] !== NULL ? $arguments45['value'] : $renderChildrenClosure46());

$output44 .= (!is_string($value47) ? $value47 : htmlspecialchars($value47, ($arguments45['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments45['encoding'] !== NULL ? $arguments45['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments45['doubleEncode']));

$output44 .= 'error.capslock';
$arguments43['key'] = $output44;
$arguments43['id'] = NULL;
$arguments43['default'] = NULL;
$arguments43['htmlEscape'] = NULL;
$arguments43['arguments'] = NULL;
$arguments43['extensionName'] = NULL;
$renderChildrenClosure48 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments43, $renderChildrenClosure48, $renderingContext);

$output0 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments49 = array();
$output50 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments51 = array();
$arguments51['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);
$arguments51['keepQuotes'] = false;
$arguments51['encoding'] = NULL;
$arguments51['doubleEncode'] = true;
$renderChildrenClosure52 = function() use ($renderingContext, $self) {
return NULL;
};
$value53 = ($arguments51['value'] !== NULL ? $arguments51['value'] : $renderChildrenClosure52());

$output50 .= (!is_string($value53) ? $value53 : htmlspecialchars($value53, ($arguments51['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments51['encoding'] !== NULL ? $arguments51['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments51['doubleEncode']));

$output50 .= 'error.capslock';
$arguments49['key'] = $output50;
$arguments49['id'] = NULL;
$arguments49['default'] = NULL;
$arguments49['htmlEscape'] = NULL;
$arguments49['arguments'] = NULL;
$arguments49['extensionName'] = NULL;
$renderChildrenClosure54 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments49, $renderChildrenClosure54, $renderingContext);

$output0 .= '" />
						</div>
					</div>
				</div>
			</div>
			<div class="form-group t3js-login-password-section" id="t3-login-password-section">
				<div class="form-control-wrap">
					<div class="form-control-holder">
						<input type="password" id="t3-password" name="p_field" value="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments55 = array();
$arguments55['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'presetPassword', $renderingContext);
$arguments55['keepQuotes'] = false;
$arguments55['encoding'] = NULL;
$arguments55['doubleEncode'] = true;
$renderChildrenClosure56 = function() use ($renderingContext, $self) {
return NULL;
};
$value57 = ($arguments55['value'] !== NULL ? $arguments55['value'] : $renderChildrenClosure56());

$output0 .= (!is_string($value57) ? $value57 : htmlspecialchars($value57, ($arguments55['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments55['encoding'] !== NULL ? $arguments55['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments55['doubleEncode']));

$output0 .= '" placeholder="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments58 = array();
$output59 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments60 = array();
$arguments60['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);
$arguments60['keepQuotes'] = false;
$arguments60['encoding'] = NULL;
$arguments60['doubleEncode'] = true;
$renderChildrenClosure61 = function() use ($renderingContext, $self) {
return NULL;
};
$value62 = ($arguments60['value'] !== NULL ? $arguments60['value'] : $renderChildrenClosure61());

$output59 .= (!is_string($value62) ? $value62 : htmlspecialchars($value62, ($arguments60['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments60['encoding'] !== NULL ? $arguments60['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments60['doubleEncode']));

$output59 .= 'labels.password';
$arguments58['key'] = $output59;
$arguments58['id'] = NULL;
$arguments58['default'] = NULL;
$arguments58['htmlEscape'] = NULL;
$arguments58['arguments'] = NULL;
$arguments58['extensionName'] = NULL;
$renderChildrenClosure63 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments58, $renderChildrenClosure63, $renderingContext);

$output0 .= '" class="form-control input-login t3js-clearable t3js-login-password-field" required="required">
						<div class="form-notice-capslock hidden t3js-login-alert-capslock">
							<img src="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments64 = array();
$arguments64['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'images.capslock', $renderingContext);
$arguments64['keepQuotes'] = false;
$arguments64['encoding'] = NULL;
$arguments64['doubleEncode'] = true;
$renderChildrenClosure65 = function() use ($renderingContext, $self) {
return NULL;
};
$value66 = ($arguments64['value'] !== NULL ? $arguments64['value'] : $renderChildrenClosure65());

$output0 .= (!is_string($value66) ? $value66 : htmlspecialchars($value66, ($arguments64['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments64['encoding'] !== NULL ? $arguments64['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments64['doubleEncode']));

$output0 .= '" width="14" height="14" alt="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments67 = array();
$output68 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments69 = array();
$arguments69['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);
$arguments69['keepQuotes'] = false;
$arguments69['encoding'] = NULL;
$arguments69['doubleEncode'] = true;
$renderChildrenClosure70 = function() use ($renderingContext, $self) {
return NULL;
};
$value71 = ($arguments69['value'] !== NULL ? $arguments69['value'] : $renderChildrenClosure70());

$output68 .= (!is_string($value71) ? $value71 : htmlspecialchars($value71, ($arguments69['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments69['encoding'] !== NULL ? $arguments69['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments69['doubleEncode']));

$output68 .= 'error.capslock';
$arguments67['key'] = $output68;
$arguments67['id'] = NULL;
$arguments67['default'] = NULL;
$arguments67['htmlEscape'] = NULL;
$arguments67['arguments'] = NULL;
$arguments67['extensionName'] = NULL;
$renderChildrenClosure72 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments67, $renderChildrenClosure72, $renderingContext);

$output0 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments73 = array();
$output74 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments75 = array();
$arguments75['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);
$arguments75['keepQuotes'] = false;
$arguments75['encoding'] = NULL;
$arguments75['doubleEncode'] = true;
$renderChildrenClosure76 = function() use ($renderingContext, $self) {
return NULL;
};
$value77 = ($arguments75['value'] !== NULL ? $arguments75['value'] : $renderChildrenClosure76());

$output74 .= (!is_string($value77) ? $value77 : htmlspecialchars($value77, ($arguments75['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments75['encoding'] !== NULL ? $arguments75['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments75['doubleEncode']));

$output74 .= 'error.capslock';
$arguments73['key'] = $output74;
$arguments73['id'] = NULL;
$arguments73['default'] = NULL;
$arguments73['htmlEscape'] = NULL;
$arguments73['arguments'] = NULL;
$arguments73['extensionName'] = NULL;
$renderChildrenClosure78 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments73, $renderChildrenClosure78, $renderingContext);

$output0 .= '" />
						</div>
					</div>
				</div>
			</div>
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments79 = array();
// Rendering Boolean node
$arguments79['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'isOpenIdLoaded', $renderingContext));
$arguments79['then'] = NULL;
$arguments79['else'] = NULL;
$renderChildrenClosure80 = function() use ($renderingContext, $self) {
$output81 = '';

$output81 .= '
				<div class="form-group hidden t3js-login-openid-section" id="t3-login-openid_url-section">
					<div class="input-group">
						<input type="text" id="openid_url" name="openid_url" value="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments82 = array();
$arguments82['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'presetOpenId', $renderingContext);
$arguments82['keepQuotes'] = false;
$arguments82['encoding'] = NULL;
$arguments82['doubleEncode'] = true;
$renderChildrenClosure83 = function() use ($renderingContext, $self) {
return NULL;
};
$value84 = ($arguments82['value'] !== NULL ? $arguments82['value'] : $renderChildrenClosure83());

$output81 .= (!is_string($value84) ? $value84 : htmlspecialchars($value84, ($arguments82['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments82['encoding'] !== NULL ? $arguments82['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments82['doubleEncode']));

$output81 .= '" placeholder="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments85 = array();
$output86 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments87 = array();
$arguments87['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);
$arguments87['keepQuotes'] = false;
$arguments87['encoding'] = NULL;
$arguments87['doubleEncode'] = true;
$renderChildrenClosure88 = function() use ($renderingContext, $self) {
return NULL;
};
$value89 = ($arguments87['value'] !== NULL ? $arguments87['value'] : $renderChildrenClosure88());

$output86 .= (!is_string($value89) ? $value89 : htmlspecialchars($value89, ($arguments87['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments87['encoding'] !== NULL ? $arguments87['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments87['doubleEncode']));

$output86 .= 'labels.openId';
$arguments85['key'] = $output86;
$arguments85['id'] = NULL;
$arguments85['default'] = NULL;
$arguments85['htmlEscape'] = NULL;
$arguments85['arguments'] = NULL;
$arguments85['extensionName'] = NULL;
$renderChildrenClosure90 = function() use ($renderingContext, $self) {
return NULL;
};

$output81 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments85, $renderChildrenClosure90, $renderingContext);

$output81 .= '" class="form-control input-login t3js-clearable t3js-login-openid-field" />
						<div class="input-group-addon">
							<span class="fa fa-openid"></span>
						</div>
					</div>
				</div>
			';
return $output81;
};
$viewHelper91 = $self->getViewHelper('$viewHelper91', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper91->setArguments($arguments79);
$viewHelper91->setRenderingContext($renderingContext);
$viewHelper91->setRenderChildrenClosure($renderChildrenClosure80);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper91->initializeArgumentsAndRender();

$output0 .= '
			<div class="form-group" id="t3-login-submit-section">
				<button class="btn btn-block btn-login t3js-login-submit" id="t3-login-submit" type="submit" name="commandLI" data-loading-text="<i class=\'fa fa-circle-o-notch fa-spin\'></i> ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments92 = array();
$output93 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments94 = array();
$arguments94['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);
$arguments94['keepQuotes'] = false;
$arguments94['encoding'] = NULL;
$arguments94['doubleEncode'] = true;
$renderChildrenClosure95 = function() use ($renderingContext, $self) {
return NULL;
};
$value96 = ($arguments94['value'] !== NULL ? $arguments94['value'] : $renderChildrenClosure95());

$output93 .= (!is_string($value96) ? $value96 : htmlspecialchars($value96, ($arguments94['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments94['encoding'] !== NULL ? $arguments94['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments94['doubleEncode']));

$output93 .= 'login_process';
$arguments92['key'] = $output93;
$arguments92['id'] = NULL;
$arguments92['default'] = NULL;
$arguments92['htmlEscape'] = NULL;
$arguments92['arguments'] = NULL;
$arguments92['extensionName'] = NULL;
$renderChildrenClosure97 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments92, $renderChildrenClosure97, $renderingContext);

$output0 .= '" autocomplete="off">
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments98 = array();
$output99 = '';

$output99 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output99 .= 'labels.submitLogin';
$arguments98['key'] = $output99;
$arguments98['id'] = NULL;
$arguments98['default'] = NULL;
$arguments98['htmlEscape'] = NULL;
$arguments98['arguments'] = NULL;
$arguments98['extensionName'] = NULL;
$renderChildrenClosure100 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments98, $renderChildrenClosure100, $renderingContext);

$output0 .= '
				</button>
			</div>
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments101 = array();
// Rendering Boolean node
$arguments101['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'isOpenIdLoaded', $renderingContext));
$arguments101['then'] = NULL;
$arguments101['else'] = NULL;
$renderChildrenClosure102 = function() use ($renderingContext, $self) {
$output103 = '';

$output103 .= '
				<ul class="list-unstyled typo3-login-links">
					<li>
						<a class="t3js-login-switch-to-openid">
							<i class="fa fa-fw fa-openid"></i> <span>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments104 = array();
$output105 = '';

$output105 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output105 .= 'labels.switchToOpenId';
$arguments104['key'] = $output105;
$arguments104['id'] = NULL;
$arguments104['default'] = NULL;
$arguments104['htmlEscape'] = NULL;
$arguments104['arguments'] = NULL;
$arguments104['extensionName'] = NULL;
$renderChildrenClosure106 = function() use ($renderingContext, $self) {
return NULL;
};

$output103 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments104, $renderChildrenClosure106, $renderingContext);

$output103 .= '</span>
						</a>
						<a class="t3js-login-switch-to-default hidden">
							  <i class="fa fa-fw fa-key"></i> <span>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments107 = array();
$output108 = '';

$output108 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output108 .= 'labels.switchToDefault';
$arguments107['key'] = $output108;
$arguments107['id'] = NULL;
$arguments107['default'] = NULL;
$arguments107['htmlEscape'] = NULL;
$arguments107['arguments'] = NULL;
$arguments107['extensionName'] = NULL;
$renderChildrenClosure109 = function() use ($renderingContext, $self) {
return NULL;
};

$output103 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments107, $renderChildrenClosure109, $renderingContext);

$output103 .= '</span>
						</a>
					</li>
				</ul>
			';
return $output103;
};
$viewHelper110 = $self->getViewHelper('$viewHelper110', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper110->setArguments($arguments101);
$viewHelper110->setRenderingContext($renderingContext);
$viewHelper110->setRenderChildrenClosure($renderChildrenClosure102);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper110->initializeArgumentsAndRender();

$output0 .= '
		</form>
	</div>
';

return $output0;
}
/**
 * section logoutForm
 */
public function section_450f29899a096381764955a7956c99f9f694ad77(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output111 = '';

$output111 .= '
	<form action="index.php" method="post" name="loginform">
		<input type="hidden" name="login_status" value="logout" />
		<div class="t3-login-box-body">
			<div class="t3-login-logout-form">
				<div class="t3-login-username">
					<div class="t3-login-label t3-username">
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments112 = array();
$output113 = '';

$output113 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output113 .= 'labels.username';
$arguments112['key'] = $output113;
$arguments112['id'] = NULL;
$arguments112['default'] = NULL;
$arguments112['htmlEscape'] = NULL;
$arguments112['arguments'] = NULL;
$arguments112['extensionName'] = NULL;
$renderChildrenClosure114 = function() use ($renderingContext, $self) {
return NULL;
};

$output111 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments112, $renderChildrenClosure114, $renderingContext);

$output111 .= '
					</div>
					<div class="t3-username-current">
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments115 = array();
$arguments115['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.username', $renderingContext);
$arguments115['keepQuotes'] = false;
$arguments115['encoding'] = NULL;
$arguments115['doubleEncode'] = true;
$renderChildrenClosure116 = function() use ($renderingContext, $self) {
return NULL;
};
$value117 = ($arguments115['value'] !== NULL ? $arguments115['value'] : $renderChildrenClosure116());

$output111 .= (!is_string($value117) ? $value117 : htmlspecialchars($value117, ($arguments115['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments115['encoding'] !== NULL ? $arguments115['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments115['doubleEncode']));

$output111 .= '
					</div>
				</div>
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments118 = array();
// Rendering Boolean node
$arguments118['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'showInterfaceSelector', $renderingContext));
$arguments118['then'] = NULL;
$arguments118['else'] = NULL;
$renderChildrenClosure119 = function() use ($renderingContext, $self) {
$output120 = '';

$output120 .= '
					<div class="t3-login-interface">
						<div class="t3-login-label t3-interface-selector">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments121 = array();
$output122 = '';

$output122 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output122 .= 'labels.interface';
$arguments121['key'] = $output122;
$arguments121['id'] = NULL;
$arguments121['default'] = NULL;
$arguments121['htmlEscape'] = NULL;
$arguments121['arguments'] = NULL;
$arguments121['extensionName'] = NULL;
$renderChildrenClosure123 = function() use ($renderingContext, $self) {
return NULL;
};

$output120 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments121, $renderChildrenClosure123, $renderingContext);

$output120 .= '
						</div>
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper
$arguments124 = array();
$arguments124['value'] = NULL;
$renderChildrenClosure125 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'interfaceSelectorJump', $renderingContext);
};

$output120 .= TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper::renderStatic($arguments124, $renderChildrenClosure125, $renderingContext);

$output120 .= '
					</div>
				';
return $output120;
};
$viewHelper126 = $self->getViewHelper('$viewHelper126', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper126->setArguments($arguments118);
$viewHelper126->setRenderingContext($renderingContext);
$viewHelper126->setRenderChildrenClosure($renderChildrenClosure119);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output111 .= $viewHelper126->initializeArgumentsAndRender();

$output111 .= '
				<input type="hidden" name="p_field" value="" />
				<input class="btn btn-block btn-lg" type="submit" name="commandLO" value="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments127 = array();
$output128 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments129 = array();
$arguments129['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);
$arguments129['keepQuotes'] = false;
$arguments129['encoding'] = NULL;
$arguments129['doubleEncode'] = true;
$renderChildrenClosure130 = function() use ($renderingContext, $self) {
return NULL;
};
$value131 = ($arguments129['value'] !== NULL ? $arguments129['value'] : $renderChildrenClosure130());

$output128 .= (!is_string($value131) ? $value131 : htmlspecialchars($value131, ($arguments129['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments129['encoding'] !== NULL ? $arguments129['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments129['doubleEncode']));

$output128 .= 'labels.submitLogin';
$arguments127['key'] = $output128;
$arguments127['id'] = NULL;
$arguments127['default'] = NULL;
$arguments127['htmlEscape'] = NULL;
$arguments127['arguments'] = NULL;
$arguments127['extensionName'] = NULL;
$renderChildrenClosure132 = function() use ($renderingContext, $self) {
return NULL;
};

$output111 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments127, $renderChildrenClosure132, $renderingContext);

$output111 .= '" id="t3-login-submit" />
			</div>
		</div>
	</form>
';

return $output111;
}
/**
 * section loginNews
 */
public function section_c0e15b792df49d9c9cb89ccbaf6a653d16720773(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output133 = '';

$output133 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments134 = array();
// Rendering Boolean node
$arguments134['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'loginNewsItems', $renderingContext));
$arguments134['then'] = NULL;
$arguments134['else'] = NULL;
$renderChildrenClosure135 = function() use ($renderingContext, $self) {
$output136 = '';

$output136 .= '
		<div class="panel-carousel carousel slide t3js-login-news-carousel" id="loginNews" data-interval="0" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments137 = array();
$arguments137['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'loginNewsItems', $renderingContext);
$arguments137['as'] = 'item';
$arguments137['iteration'] = 'loginNewsIterator';
$arguments137['key'] = '';
$arguments137['reverse'] = false;
$renderChildrenClosure138 = function() use ($renderingContext, $self) {
$output139 = '';

$output139 .= '
				<div class="item';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments140 = array();
// Rendering Boolean node
$arguments140['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'loginNewsIterator.isFirst', $renderingContext));
$arguments140['then'] = ' active';
$arguments140['else'] = NULL;
$renderChildrenClosure141 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper142 = $self->getViewHelper('$viewHelper142', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper142->setArguments($arguments140);
$viewHelper142->setRenderingContext($renderingContext);
$viewHelper142->setRenderChildrenClosure($renderChildrenClosure141);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output139 .= $viewHelper142->initializeArgumentsAndRender();

$output139 .= '">
					<h3 class="typo3-login-news-heading">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments143 = array();
$arguments143['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.header', $renderingContext);
$arguments143['keepQuotes'] = false;
$arguments143['encoding'] = NULL;
$arguments143['doubleEncode'] = true;
$renderChildrenClosure144 = function() use ($renderingContext, $self) {
return NULL;
};
$value145 = ($arguments143['value'] !== NULL ? $arguments143['value'] : $renderChildrenClosure144());

$output139 .= (!is_string($value145) ? $value145 : htmlspecialchars($value145, ($arguments143['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments143['encoding'] !== NULL ? $arguments143['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments143['doubleEncode']));

$output139 .= '</h3>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper
$arguments146 = array();
$arguments146['parseFuncTSPath'] = 'lib.parseFunc_RTE';
$renderChildrenClosure147 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.content', $renderingContext);
};
$viewHelper148 = $self->getViewHelper('$viewHelper148', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper');
$viewHelper148->setArguments($arguments146);
$viewHelper148->setRenderingContext($renderingContext);
$viewHelper148->setRenderChildrenClosure($renderChildrenClosure147);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper

$output139 .= $viewHelper148->initializeArgumentsAndRender();

$output139 .= '
					<span class="text-muted">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments149 = array();
$arguments149['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.date', $renderingContext);
$arguments149['keepQuotes'] = false;
$arguments149['encoding'] = NULL;
$arguments149['doubleEncode'] = true;
$renderChildrenClosure150 = function() use ($renderingContext, $self) {
return NULL;
};
$value151 = ($arguments149['value'] !== NULL ? $arguments149['value'] : $renderChildrenClosure150());

$output139 .= (!is_string($value151) ? $value151 : htmlspecialchars($value151, ($arguments149['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments149['encoding'] !== NULL ? $arguments149['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments149['doubleEncode']));

$output139 .= '</span>
				</div>
				';
return $output139;
};

$output136 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments137, $renderChildrenClosure138, $renderingContext);

$output136 .= '
			</div>
			<a class="left typo3-login-carousel-control" href="#loginNews" role="button" data-slide="prev">
				<i class="fa fa-angle-left"></i>
				<span class="sr-only">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments152 = array();
$output153 = '';

$output153 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output153 .= 'labels.previous';
$arguments152['key'] = $output153;
$arguments152['id'] = NULL;
$arguments152['default'] = NULL;
$arguments152['htmlEscape'] = NULL;
$arguments152['arguments'] = NULL;
$arguments152['extensionName'] = NULL;
$renderChildrenClosure154 = function() use ($renderingContext, $self) {
return NULL;
};

$output136 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments152, $renderChildrenClosure154, $renderingContext);

$output136 .= '</span>
			</a>
			<a class="right typo3-login-carousel-control" href="#loginNews" role="button" data-slide="next">
				<i class="fa fa-angle-right"></i>
				<span class="sr-only">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments155 = array();
$output156 = '';

$output156 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output156 .= 'labels.next';
$arguments155['key'] = $output156;
$arguments155['id'] = NULL;
$arguments155['default'] = NULL;
$arguments155['htmlEscape'] = NULL;
$arguments155['arguments'] = NULL;
$arguments155['extensionName'] = NULL;
$renderChildrenClosure157 = function() use ($renderingContext, $self) {
return NULL;
};

$output136 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments155, $renderChildrenClosure157, $renderingContext);

$output136 .= '</span>
			</a>
		</div>
	';
return $output136;
};
$viewHelper158 = $self->getViewHelper('$viewHelper158', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper158->setArguments($arguments134);
$viewHelper158->setRenderingContext($renderingContext);
$viewHelper158->setRenderChildrenClosure($renderChildrenClosure135);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output133 .= $viewHelper158->initializeArgumentsAndRender();

$output133 .= '
';

return $output133;
}
/**
 * Main Render function
 */
public function render(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output159 = '';

$output159 .= '<div class="typo3-login">
	<div class="typo3-login-container">
		<div class="typo3-login-wrap">
			<div class="panel panel-lg panel-login">
				<div class="panel-body">
					<div class="typo3-login-logo">
						<img src="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments160 = array();
$arguments160['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'logo', $renderingContext);
$arguments160['keepQuotes'] = false;
$arguments160['encoding'] = NULL;
$arguments160['doubleEncode'] = true;
$renderChildrenClosure161 = function() use ($renderingContext, $self) {
return NULL;
};
$value162 = ($arguments160['value'] !== NULL ? $arguments160['value'] : $renderChildrenClosure161());

$output159 .= (!is_string($value162) ? $value162 : htmlspecialchars($value162, ($arguments160['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments160['encoding'] !== NULL ? $arguments160['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments160['doubleEncode']));

$output159 .= '" class="typo3-login-image" />
					</div>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments163 = array();
$arguments163['section'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'formType', $renderingContext);
$arguments163['arguments'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), '_all', $renderingContext);
$arguments163['partial'] = NULL;
$arguments163['optional'] = false;
$renderChildrenClosure164 = function() use ($renderingContext, $self) {
return NULL;
};

$output159 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments163, $renderChildrenClosure164, $renderingContext);

$output159 .= '
				</div>
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments165 = array();
$arguments165['section'] = 'loginNews';
$arguments165['arguments'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), '_all', $renderingContext);
$arguments165['partial'] = NULL;
$arguments165['optional'] = false;
$renderChildrenClosure166 = function() use ($renderingContext, $self) {
return NULL;
};

$output159 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments165, $renderChildrenClosure166, $renderingContext);

$output159 .= '
				<div class="panel-footer">
					<div class="login-copyright-wrap">
						<a href="#loginCopyright" class="typo3-login-copyright-link collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="loginCopyright">
							<span>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments167 = array();
$output168 = '';

$output168 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output168 .= 'copyright.link';
$arguments167['key'] = $output168;
$arguments167['id'] = NULL;
$arguments167['default'] = NULL;
$arguments167['htmlEscape'] = NULL;
$arguments167['arguments'] = NULL;
$arguments167['extensionName'] = NULL;
$renderChildrenClosure169 = function() use ($renderingContext, $self) {
return NULL;
};

$output159 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments167, $renderChildrenClosure169, $renderingContext);

$output159 .= '</span>
							<img src="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments170 = array();
$arguments170['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'images.typo3', $renderingContext);
$arguments170['keepQuotes'] = false;
$arguments170['encoding'] = NULL;
$arguments170['doubleEncode'] = true;
$renderChildrenClosure171 = function() use ($renderingContext, $self) {
return NULL;
};
$value172 = ($arguments170['value'] !== NULL ? $arguments170['value'] : $renderChildrenClosure171());

$output159 .= (!is_string($value172) ? $value172 : htmlspecialchars($value172, ($arguments170['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments170['encoding'] !== NULL ? $arguments170['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments170['doubleEncode']));

$output159 .= '" alt="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments173 = array();
$output174 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments175 = array();
$arguments175['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);
$arguments175['keepQuotes'] = false;
$arguments175['encoding'] = NULL;
$arguments175['doubleEncode'] = true;
$renderChildrenClosure176 = function() use ($renderingContext, $self) {
return NULL;
};
$value177 = ($arguments175['value'] !== NULL ? $arguments175['value'] : $renderChildrenClosure176());

$output174 .= (!is_string($value177) ? $value177 : htmlspecialchars($value177, ($arguments175['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments175['encoding'] !== NULL ? $arguments175['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments175['doubleEncode']));

$output174 .= 'typo3.logo';
$arguments173['key'] = $output174;
$arguments173['id'] = NULL;
$arguments173['default'] = NULL;
$arguments173['htmlEscape'] = NULL;
$arguments173['arguments'] = NULL;
$arguments173['extensionName'] = NULL;
$renderChildrenClosure178 = function() use ($renderingContext, $self) {
return NULL;
};

$output159 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments173, $renderChildrenClosure178, $renderingContext);

$output159 .= '" width="70" height="20" />
						</a>
						<div id="loginCopyright" class="collapse">
							<div class="typo3-login-copyright-text">
								<p>
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper
$arguments179 = array();
$arguments179['value'] = NULL;
$renderChildrenClosure180 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'copyright', $renderingContext);
};

$output159 .= TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper::renderStatic($arguments179, $renderChildrenClosure180, $renderingContext);

$output159 .= '
								</p>
								<ul class="list-unstyled">
									<li><a href="http://typo3.org" target="_blank" class="t3-login-link-typo3"><i class="fa fa-external-link"></i> TYPO3.org</a></li>
									<li><a href="http://typo3.org/donate/" target="_blank" class="t3-login-link-donate"><i class="fa fa-external-link"></i> ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments181 = array();
$output182 = '';

$output182 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output182 .= 'labels.donate';
$arguments181['key'] = $output182;
$arguments181['id'] = NULL;
$arguments181['default'] = NULL;
$arguments181['htmlEscape'] = NULL;
$arguments181['arguments'] = NULL;
$arguments181['extensionName'] = NULL;
$renderChildrenClosure183 = function() use ($renderingContext, $self) {
return NULL;
};

$output159 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments181, $renderChildrenClosure183, $renderingContext);

$output159 .= '</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments184 = array();
$arguments184['name'] = 'loginForm';
$renderChildrenClosure185 = function() use ($renderingContext, $self) {
$output186 = '';

$output186 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments187 = array();
// Rendering Boolean node
$arguments187['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'hasLoginError', $renderingContext));
$arguments187['then'] = NULL;
$arguments187['else'] = NULL;
$renderChildrenClosure188 = function() use ($renderingContext, $self) {
$output189 = '';

$output189 .= '
		<div class="t3js-login-error" id="t3-login-error">
			<div class="alert alert-danger">
				<strong>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments190 = array();
$output191 = '';

$output191 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output191 .= 'error.login.title';
$arguments190['key'] = $output191;
$arguments190['id'] = NULL;
$arguments190['default'] = NULL;
$arguments190['htmlEscape'] = NULL;
$arguments190['arguments'] = NULL;
$arguments190['extensionName'] = NULL;
$renderChildrenClosure192 = function() use ($renderingContext, $self) {
return NULL;
};

$output189 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments190, $renderChildrenClosure192, $renderingContext);

$output189 .= '</strong>
				<p>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments193 = array();
$output194 = '';

$output194 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output194 .= 'error.login.description';
$arguments193['key'] = $output194;
$arguments193['id'] = NULL;
$arguments193['default'] = NULL;
$arguments193['htmlEscape'] = NULL;
$arguments193['arguments'] = NULL;
$arguments193['extensionName'] = NULL;
$renderChildrenClosure195 = function() use ($renderingContext, $self) {
return NULL;
};

$output189 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments193, $renderChildrenClosure195, $renderingContext);

$output189 .= '</p>
			</div>
		</div>
	';
return $output189;
};
$viewHelper196 = $self->getViewHelper('$viewHelper196', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper196->setArguments($arguments187);
$viewHelper196->setRenderingContext($renderingContext);
$viewHelper196->setRenderChildrenClosure($renderChildrenClosure188);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output186 .= $viewHelper196->initializeArgumentsAndRender();

$output186 .= '
	<noscript>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper
$arguments197 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments198 = array();
$output199 = '';

$output199 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output199 .= 'error.javascript';
$arguments198['key'] = $output199;
$arguments198['id'] = NULL;
$arguments198['default'] = NULL;
$arguments198['htmlEscape'] = NULL;
$arguments198['arguments'] = NULL;
$arguments198['extensionName'] = NULL;
$renderChildrenClosure200 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments197['message'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments198, $renderChildrenClosure200, $renderingContext);
$arguments197['state'] = '2';
$arguments197['title'] = NULL;
$arguments197['iconName'] = NULL;
$arguments197['disableIcon'] = false;
$renderChildrenClosure201 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper202 = $self->getViewHelper('$viewHelper202', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper');
$viewHelper202->setArguments($arguments197);
$viewHelper202->setRenderingContext($renderingContext);
$viewHelper202->setRenderChildrenClosure($renderChildrenClosure201);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper

$output186 .= $viewHelper202->initializeArgumentsAndRender();

$output186 .= '
	</noscript>
	<div class="hidden t3js-login-error-nocookies">
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper
$arguments203 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments204 = array();
$output205 = '';

$output205 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output205 .= 'error.cookies';
$arguments204['key'] = $output205;
$arguments204['id'] = NULL;
$arguments204['default'] = NULL;
$arguments204['htmlEscape'] = NULL;
$arguments204['arguments'] = NULL;
$arguments204['extensionName'] = NULL;
$renderChildrenClosure206 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments203['message'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments204, $renderChildrenClosure206, $renderingContext);
$arguments203['state'] = '2';
$arguments203['title'] = NULL;
$arguments203['iconName'] = NULL;
$arguments203['disableIcon'] = false;
$renderChildrenClosure207 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper208 = $self->getViewHelper('$viewHelper208', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper');
$viewHelper208->setArguments($arguments203);
$viewHelper208->setRenderingContext($renderingContext);
$viewHelper208->setRenderChildrenClosure($renderChildrenClosure207);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper

$output186 .= $viewHelper208->initializeArgumentsAndRender();

$output186 .= '
	</div>
	<div class="typo3-login-form t3js-login-formfields">
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper
$arguments209 = array();
$arguments209['value'] = NULL;
$renderChildrenClosure210 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'formTag', $renderingContext);
};

$output186 .= TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper::renderStatic($arguments209, $renderChildrenClosure210, $renderingContext);

$output186 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments211 = array();
// Rendering Boolean node
$arguments211['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'interfaceSelector', $renderingContext));
$arguments211['then'] = NULL;
$arguments211['else'] = NULL;
$renderChildrenClosure212 = function() use ($renderingContext, $self) {
$output213 = '';

$output213 .= '
				<div class="form-group t3js-login-interface-section" id="t3-login-interface-section">
					<div class="form-control-wrap">
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper
$arguments214 = array();
$arguments214['value'] = NULL;
$renderChildrenClosure215 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'interfaceSelector', $renderingContext);
};

$output213 .= TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper::renderStatic($arguments214, $renderChildrenClosure215, $renderingContext);

$output213 .= '
					</div>
				</div>
			';
return $output213;
};
$viewHelper216 = $self->getViewHelper('$viewHelper216', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper216->setArguments($arguments211);
$viewHelper216->setRenderingContext($renderingContext);
$viewHelper216->setRenderChildrenClosure($renderChildrenClosure212);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output186 .= $viewHelper216->initializeArgumentsAndRender();

$output186 .= '
			<div class="form-group t3js-login-username-section" id="t3-login-username-section">
				<div class="form-control-wrap">
					<div class="form-control-holder">
						<input type="text" id="t3-username" name="username" value="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments217 = array();
$arguments217['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'presetUsername', $renderingContext);
$arguments217['keepQuotes'] = false;
$arguments217['encoding'] = NULL;
$arguments217['doubleEncode'] = true;
$renderChildrenClosure218 = function() use ($renderingContext, $self) {
return NULL;
};
$value219 = ($arguments217['value'] !== NULL ? $arguments217['value'] : $renderChildrenClosure218());

$output186 .= (!is_string($value219) ? $value219 : htmlspecialchars($value219, ($arguments217['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments217['encoding'] !== NULL ? $arguments217['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments217['doubleEncode']));

$output186 .= '" placeholder="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments220 = array();
$output221 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments222 = array();
$arguments222['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);
$arguments222['keepQuotes'] = false;
$arguments222['encoding'] = NULL;
$arguments222['doubleEncode'] = true;
$renderChildrenClosure223 = function() use ($renderingContext, $self) {
return NULL;
};
$value224 = ($arguments222['value'] !== NULL ? $arguments222['value'] : $renderChildrenClosure223());

$output221 .= (!is_string($value224) ? $value224 : htmlspecialchars($value224, ($arguments222['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments222['encoding'] !== NULL ? $arguments222['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments222['doubleEncode']));

$output221 .= 'labels.username';
$arguments220['key'] = $output221;
$arguments220['id'] = NULL;
$arguments220['default'] = NULL;
$arguments220['htmlEscape'] = NULL;
$arguments220['arguments'] = NULL;
$arguments220['extensionName'] = NULL;
$renderChildrenClosure225 = function() use ($renderingContext, $self) {
return NULL;
};

$output186 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments220, $renderChildrenClosure225, $renderingContext);

$output186 .= '" class="form-control input-login t3js-clearable t3js-login-username-field" autofocus="autofocus" required="required">
						<div class="form-notice-capslock hidden t3js-login-alert-capslock">
							<img src="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments226 = array();
$arguments226['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'images.capslock', $renderingContext);
$arguments226['keepQuotes'] = false;
$arguments226['encoding'] = NULL;
$arguments226['doubleEncode'] = true;
$renderChildrenClosure227 = function() use ($renderingContext, $self) {
return NULL;
};
$value228 = ($arguments226['value'] !== NULL ? $arguments226['value'] : $renderChildrenClosure227());

$output186 .= (!is_string($value228) ? $value228 : htmlspecialchars($value228, ($arguments226['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments226['encoding'] !== NULL ? $arguments226['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments226['doubleEncode']));

$output186 .= '" width="14" height="14" alt="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments229 = array();
$output230 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments231 = array();
$arguments231['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);
$arguments231['keepQuotes'] = false;
$arguments231['encoding'] = NULL;
$arguments231['doubleEncode'] = true;
$renderChildrenClosure232 = function() use ($renderingContext, $self) {
return NULL;
};
$value233 = ($arguments231['value'] !== NULL ? $arguments231['value'] : $renderChildrenClosure232());

$output230 .= (!is_string($value233) ? $value233 : htmlspecialchars($value233, ($arguments231['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments231['encoding'] !== NULL ? $arguments231['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments231['doubleEncode']));

$output230 .= 'error.capslock';
$arguments229['key'] = $output230;
$arguments229['id'] = NULL;
$arguments229['default'] = NULL;
$arguments229['htmlEscape'] = NULL;
$arguments229['arguments'] = NULL;
$arguments229['extensionName'] = NULL;
$renderChildrenClosure234 = function() use ($renderingContext, $self) {
return NULL;
};

$output186 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments229, $renderChildrenClosure234, $renderingContext);

$output186 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments235 = array();
$output236 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments237 = array();
$arguments237['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);
$arguments237['keepQuotes'] = false;
$arguments237['encoding'] = NULL;
$arguments237['doubleEncode'] = true;
$renderChildrenClosure238 = function() use ($renderingContext, $self) {
return NULL;
};
$value239 = ($arguments237['value'] !== NULL ? $arguments237['value'] : $renderChildrenClosure238());

$output236 .= (!is_string($value239) ? $value239 : htmlspecialchars($value239, ($arguments237['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments237['encoding'] !== NULL ? $arguments237['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments237['doubleEncode']));

$output236 .= 'error.capslock';
$arguments235['key'] = $output236;
$arguments235['id'] = NULL;
$arguments235['default'] = NULL;
$arguments235['htmlEscape'] = NULL;
$arguments235['arguments'] = NULL;
$arguments235['extensionName'] = NULL;
$renderChildrenClosure240 = function() use ($renderingContext, $self) {
return NULL;
};

$output186 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments235, $renderChildrenClosure240, $renderingContext);

$output186 .= '" />
						</div>
					</div>
				</div>
			</div>
			<div class="form-group t3js-login-password-section" id="t3-login-password-section">
				<div class="form-control-wrap">
					<div class="form-control-holder">
						<input type="password" id="t3-password" name="p_field" value="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments241 = array();
$arguments241['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'presetPassword', $renderingContext);
$arguments241['keepQuotes'] = false;
$arguments241['encoding'] = NULL;
$arguments241['doubleEncode'] = true;
$renderChildrenClosure242 = function() use ($renderingContext, $self) {
return NULL;
};
$value243 = ($arguments241['value'] !== NULL ? $arguments241['value'] : $renderChildrenClosure242());

$output186 .= (!is_string($value243) ? $value243 : htmlspecialchars($value243, ($arguments241['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments241['encoding'] !== NULL ? $arguments241['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments241['doubleEncode']));

$output186 .= '" placeholder="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments244 = array();
$output245 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments246 = array();
$arguments246['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);
$arguments246['keepQuotes'] = false;
$arguments246['encoding'] = NULL;
$arguments246['doubleEncode'] = true;
$renderChildrenClosure247 = function() use ($renderingContext, $self) {
return NULL;
};
$value248 = ($arguments246['value'] !== NULL ? $arguments246['value'] : $renderChildrenClosure247());

$output245 .= (!is_string($value248) ? $value248 : htmlspecialchars($value248, ($arguments246['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments246['encoding'] !== NULL ? $arguments246['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments246['doubleEncode']));

$output245 .= 'labels.password';
$arguments244['key'] = $output245;
$arguments244['id'] = NULL;
$arguments244['default'] = NULL;
$arguments244['htmlEscape'] = NULL;
$arguments244['arguments'] = NULL;
$arguments244['extensionName'] = NULL;
$renderChildrenClosure249 = function() use ($renderingContext, $self) {
return NULL;
};

$output186 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments244, $renderChildrenClosure249, $renderingContext);

$output186 .= '" class="form-control input-login t3js-clearable t3js-login-password-field" required="required">
						<div class="form-notice-capslock hidden t3js-login-alert-capslock">
							<img src="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments250 = array();
$arguments250['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'images.capslock', $renderingContext);
$arguments250['keepQuotes'] = false;
$arguments250['encoding'] = NULL;
$arguments250['doubleEncode'] = true;
$renderChildrenClosure251 = function() use ($renderingContext, $self) {
return NULL;
};
$value252 = ($arguments250['value'] !== NULL ? $arguments250['value'] : $renderChildrenClosure251());

$output186 .= (!is_string($value252) ? $value252 : htmlspecialchars($value252, ($arguments250['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments250['encoding'] !== NULL ? $arguments250['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments250['doubleEncode']));

$output186 .= '" width="14" height="14" alt="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments253 = array();
$output254 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments255 = array();
$arguments255['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);
$arguments255['keepQuotes'] = false;
$arguments255['encoding'] = NULL;
$arguments255['doubleEncode'] = true;
$renderChildrenClosure256 = function() use ($renderingContext, $self) {
return NULL;
};
$value257 = ($arguments255['value'] !== NULL ? $arguments255['value'] : $renderChildrenClosure256());

$output254 .= (!is_string($value257) ? $value257 : htmlspecialchars($value257, ($arguments255['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments255['encoding'] !== NULL ? $arguments255['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments255['doubleEncode']));

$output254 .= 'error.capslock';
$arguments253['key'] = $output254;
$arguments253['id'] = NULL;
$arguments253['default'] = NULL;
$arguments253['htmlEscape'] = NULL;
$arguments253['arguments'] = NULL;
$arguments253['extensionName'] = NULL;
$renderChildrenClosure258 = function() use ($renderingContext, $self) {
return NULL;
};

$output186 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments253, $renderChildrenClosure258, $renderingContext);

$output186 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments259 = array();
$output260 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments261 = array();
$arguments261['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);
$arguments261['keepQuotes'] = false;
$arguments261['encoding'] = NULL;
$arguments261['doubleEncode'] = true;
$renderChildrenClosure262 = function() use ($renderingContext, $self) {
return NULL;
};
$value263 = ($arguments261['value'] !== NULL ? $arguments261['value'] : $renderChildrenClosure262());

$output260 .= (!is_string($value263) ? $value263 : htmlspecialchars($value263, ($arguments261['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments261['encoding'] !== NULL ? $arguments261['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments261['doubleEncode']));

$output260 .= 'error.capslock';
$arguments259['key'] = $output260;
$arguments259['id'] = NULL;
$arguments259['default'] = NULL;
$arguments259['htmlEscape'] = NULL;
$arguments259['arguments'] = NULL;
$arguments259['extensionName'] = NULL;
$renderChildrenClosure264 = function() use ($renderingContext, $self) {
return NULL;
};

$output186 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments259, $renderChildrenClosure264, $renderingContext);

$output186 .= '" />
						</div>
					</div>
				</div>
			</div>
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments265 = array();
// Rendering Boolean node
$arguments265['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'isOpenIdLoaded', $renderingContext));
$arguments265['then'] = NULL;
$arguments265['else'] = NULL;
$renderChildrenClosure266 = function() use ($renderingContext, $self) {
$output267 = '';

$output267 .= '
				<div class="form-group hidden t3js-login-openid-section" id="t3-login-openid_url-section">
					<div class="input-group">
						<input type="text" id="openid_url" name="openid_url" value="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments268 = array();
$arguments268['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'presetOpenId', $renderingContext);
$arguments268['keepQuotes'] = false;
$arguments268['encoding'] = NULL;
$arguments268['doubleEncode'] = true;
$renderChildrenClosure269 = function() use ($renderingContext, $self) {
return NULL;
};
$value270 = ($arguments268['value'] !== NULL ? $arguments268['value'] : $renderChildrenClosure269());

$output267 .= (!is_string($value270) ? $value270 : htmlspecialchars($value270, ($arguments268['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments268['encoding'] !== NULL ? $arguments268['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments268['doubleEncode']));

$output267 .= '" placeholder="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments271 = array();
$output272 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments273 = array();
$arguments273['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);
$arguments273['keepQuotes'] = false;
$arguments273['encoding'] = NULL;
$arguments273['doubleEncode'] = true;
$renderChildrenClosure274 = function() use ($renderingContext, $self) {
return NULL;
};
$value275 = ($arguments273['value'] !== NULL ? $arguments273['value'] : $renderChildrenClosure274());

$output272 .= (!is_string($value275) ? $value275 : htmlspecialchars($value275, ($arguments273['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments273['encoding'] !== NULL ? $arguments273['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments273['doubleEncode']));

$output272 .= 'labels.openId';
$arguments271['key'] = $output272;
$arguments271['id'] = NULL;
$arguments271['default'] = NULL;
$arguments271['htmlEscape'] = NULL;
$arguments271['arguments'] = NULL;
$arguments271['extensionName'] = NULL;
$renderChildrenClosure276 = function() use ($renderingContext, $self) {
return NULL;
};

$output267 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments271, $renderChildrenClosure276, $renderingContext);

$output267 .= '" class="form-control input-login t3js-clearable t3js-login-openid-field" />
						<div class="input-group-addon">
							<span class="fa fa-openid"></span>
						</div>
					</div>
				</div>
			';
return $output267;
};
$viewHelper277 = $self->getViewHelper('$viewHelper277', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper277->setArguments($arguments265);
$viewHelper277->setRenderingContext($renderingContext);
$viewHelper277->setRenderChildrenClosure($renderChildrenClosure266);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output186 .= $viewHelper277->initializeArgumentsAndRender();

$output186 .= '
			<div class="form-group" id="t3-login-submit-section">
				<button class="btn btn-block btn-login t3js-login-submit" id="t3-login-submit" type="submit" name="commandLI" data-loading-text="<i class=\'fa fa-circle-o-notch fa-spin\'></i> ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments278 = array();
$output279 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments280 = array();
$arguments280['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);
$arguments280['keepQuotes'] = false;
$arguments280['encoding'] = NULL;
$arguments280['doubleEncode'] = true;
$renderChildrenClosure281 = function() use ($renderingContext, $self) {
return NULL;
};
$value282 = ($arguments280['value'] !== NULL ? $arguments280['value'] : $renderChildrenClosure281());

$output279 .= (!is_string($value282) ? $value282 : htmlspecialchars($value282, ($arguments280['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments280['encoding'] !== NULL ? $arguments280['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments280['doubleEncode']));

$output279 .= 'login_process';
$arguments278['key'] = $output279;
$arguments278['id'] = NULL;
$arguments278['default'] = NULL;
$arguments278['htmlEscape'] = NULL;
$arguments278['arguments'] = NULL;
$arguments278['extensionName'] = NULL;
$renderChildrenClosure283 = function() use ($renderingContext, $self) {
return NULL;
};

$output186 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments278, $renderChildrenClosure283, $renderingContext);

$output186 .= '" autocomplete="off">
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments284 = array();
$output285 = '';

$output285 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output285 .= 'labels.submitLogin';
$arguments284['key'] = $output285;
$arguments284['id'] = NULL;
$arguments284['default'] = NULL;
$arguments284['htmlEscape'] = NULL;
$arguments284['arguments'] = NULL;
$arguments284['extensionName'] = NULL;
$renderChildrenClosure286 = function() use ($renderingContext, $self) {
return NULL;
};

$output186 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments284, $renderChildrenClosure286, $renderingContext);

$output186 .= '
				</button>
			</div>
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments287 = array();
// Rendering Boolean node
$arguments287['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'isOpenIdLoaded', $renderingContext));
$arguments287['then'] = NULL;
$arguments287['else'] = NULL;
$renderChildrenClosure288 = function() use ($renderingContext, $self) {
$output289 = '';

$output289 .= '
				<ul class="list-unstyled typo3-login-links">
					<li>
						<a class="t3js-login-switch-to-openid">
							<i class="fa fa-fw fa-openid"></i> <span>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments290 = array();
$output291 = '';

$output291 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output291 .= 'labels.switchToOpenId';
$arguments290['key'] = $output291;
$arguments290['id'] = NULL;
$arguments290['default'] = NULL;
$arguments290['htmlEscape'] = NULL;
$arguments290['arguments'] = NULL;
$arguments290['extensionName'] = NULL;
$renderChildrenClosure292 = function() use ($renderingContext, $self) {
return NULL;
};

$output289 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments290, $renderChildrenClosure292, $renderingContext);

$output289 .= '</span>
						</a>
						<a class="t3js-login-switch-to-default hidden">
							  <i class="fa fa-fw fa-key"></i> <span>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments293 = array();
$output294 = '';

$output294 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output294 .= 'labels.switchToDefault';
$arguments293['key'] = $output294;
$arguments293['id'] = NULL;
$arguments293['default'] = NULL;
$arguments293['htmlEscape'] = NULL;
$arguments293['arguments'] = NULL;
$arguments293['extensionName'] = NULL;
$renderChildrenClosure295 = function() use ($renderingContext, $self) {
return NULL;
};

$output289 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments293, $renderChildrenClosure295, $renderingContext);

$output289 .= '</span>
						</a>
					</li>
				</ul>
			';
return $output289;
};
$viewHelper296 = $self->getViewHelper('$viewHelper296', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper296->setArguments($arguments287);
$viewHelper296->setRenderingContext($renderingContext);
$viewHelper296->setRenderChildrenClosure($renderChildrenClosure288);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output186 .= $viewHelper296->initializeArgumentsAndRender();

$output186 .= '
		</form>
	</div>
';
return $output186;
};

$output159 .= '';

$output159 .= '


';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments297 = array();
$arguments297['name'] = 'logoutForm';
$renderChildrenClosure298 = function() use ($renderingContext, $self) {
$output299 = '';

$output299 .= '
	<form action="index.php" method="post" name="loginform">
		<input type="hidden" name="login_status" value="logout" />
		<div class="t3-login-box-body">
			<div class="t3-login-logout-form">
				<div class="t3-login-username">
					<div class="t3-login-label t3-username">
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments300 = array();
$output301 = '';

$output301 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output301 .= 'labels.username';
$arguments300['key'] = $output301;
$arguments300['id'] = NULL;
$arguments300['default'] = NULL;
$arguments300['htmlEscape'] = NULL;
$arguments300['arguments'] = NULL;
$arguments300['extensionName'] = NULL;
$renderChildrenClosure302 = function() use ($renderingContext, $self) {
return NULL;
};

$output299 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments300, $renderChildrenClosure302, $renderingContext);

$output299 .= '
					</div>
					<div class="t3-username-current">
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments303 = array();
$arguments303['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'backendUser.username', $renderingContext);
$arguments303['keepQuotes'] = false;
$arguments303['encoding'] = NULL;
$arguments303['doubleEncode'] = true;
$renderChildrenClosure304 = function() use ($renderingContext, $self) {
return NULL;
};
$value305 = ($arguments303['value'] !== NULL ? $arguments303['value'] : $renderChildrenClosure304());

$output299 .= (!is_string($value305) ? $value305 : htmlspecialchars($value305, ($arguments303['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments303['encoding'] !== NULL ? $arguments303['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments303['doubleEncode']));

$output299 .= '
					</div>
				</div>
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments306 = array();
// Rendering Boolean node
$arguments306['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'showInterfaceSelector', $renderingContext));
$arguments306['then'] = NULL;
$arguments306['else'] = NULL;
$renderChildrenClosure307 = function() use ($renderingContext, $self) {
$output308 = '';

$output308 .= '
					<div class="t3-login-interface">
						<div class="t3-login-label t3-interface-selector">
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments309 = array();
$output310 = '';

$output310 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output310 .= 'labels.interface';
$arguments309['key'] = $output310;
$arguments309['id'] = NULL;
$arguments309['default'] = NULL;
$arguments309['htmlEscape'] = NULL;
$arguments309['arguments'] = NULL;
$arguments309['extensionName'] = NULL;
$renderChildrenClosure311 = function() use ($renderingContext, $self) {
return NULL;
};

$output308 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments309, $renderChildrenClosure311, $renderingContext);

$output308 .= '
						</div>
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper
$arguments312 = array();
$arguments312['value'] = NULL;
$renderChildrenClosure313 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'interfaceSelectorJump', $renderingContext);
};

$output308 .= TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper::renderStatic($arguments312, $renderChildrenClosure313, $renderingContext);

$output308 .= '
					</div>
				';
return $output308;
};
$viewHelper314 = $self->getViewHelper('$viewHelper314', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper314->setArguments($arguments306);
$viewHelper314->setRenderingContext($renderingContext);
$viewHelper314->setRenderChildrenClosure($renderChildrenClosure307);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output299 .= $viewHelper314->initializeArgumentsAndRender();

$output299 .= '
				<input type="hidden" name="p_field" value="" />
				<input class="btn btn-block btn-lg" type="submit" name="commandLO" value="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments315 = array();
$output316 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments317 = array();
$arguments317['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);
$arguments317['keepQuotes'] = false;
$arguments317['encoding'] = NULL;
$arguments317['doubleEncode'] = true;
$renderChildrenClosure318 = function() use ($renderingContext, $self) {
return NULL;
};
$value319 = ($arguments317['value'] !== NULL ? $arguments317['value'] : $renderChildrenClosure318());

$output316 .= (!is_string($value319) ? $value319 : htmlspecialchars($value319, ($arguments317['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments317['encoding'] !== NULL ? $arguments317['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments317['doubleEncode']));

$output316 .= 'labels.submitLogin';
$arguments315['key'] = $output316;
$arguments315['id'] = NULL;
$arguments315['default'] = NULL;
$arguments315['htmlEscape'] = NULL;
$arguments315['arguments'] = NULL;
$arguments315['extensionName'] = NULL;
$renderChildrenClosure320 = function() use ($renderingContext, $self) {
return NULL;
};

$output299 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments315, $renderChildrenClosure320, $renderingContext);

$output299 .= '" id="t3-login-submit" />
			</div>
		</div>
	</form>
';
return $output299;
};

$output159 .= '';

$output159 .= '


';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments321 = array();
$arguments321['name'] = 'loginNews';
$renderChildrenClosure322 = function() use ($renderingContext, $self) {
$output323 = '';

$output323 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments324 = array();
// Rendering Boolean node
$arguments324['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'loginNewsItems', $renderingContext));
$arguments324['then'] = NULL;
$arguments324['else'] = NULL;
$renderChildrenClosure325 = function() use ($renderingContext, $self) {
$output326 = '';

$output326 .= '
		<div class="panel-carousel carousel slide t3js-login-news-carousel" id="loginNews" data-interval="0" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments327 = array();
$arguments327['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'loginNewsItems', $renderingContext);
$arguments327['as'] = 'item';
$arguments327['iteration'] = 'loginNewsIterator';
$arguments327['key'] = '';
$arguments327['reverse'] = false;
$renderChildrenClosure328 = function() use ($renderingContext, $self) {
$output329 = '';

$output329 .= '
				<div class="item';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments330 = array();
// Rendering Boolean node
$arguments330['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'loginNewsIterator.isFirst', $renderingContext));
$arguments330['then'] = ' active';
$arguments330['else'] = NULL;
$renderChildrenClosure331 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper332 = $self->getViewHelper('$viewHelper332', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper332->setArguments($arguments330);
$viewHelper332->setRenderingContext($renderingContext);
$viewHelper332->setRenderChildrenClosure($renderChildrenClosure331);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output329 .= $viewHelper332->initializeArgumentsAndRender();

$output329 .= '">
					<h3 class="typo3-login-news-heading">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments333 = array();
$arguments333['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.header', $renderingContext);
$arguments333['keepQuotes'] = false;
$arguments333['encoding'] = NULL;
$arguments333['doubleEncode'] = true;
$renderChildrenClosure334 = function() use ($renderingContext, $self) {
return NULL;
};
$value335 = ($arguments333['value'] !== NULL ? $arguments333['value'] : $renderChildrenClosure334());

$output329 .= (!is_string($value335) ? $value335 : htmlspecialchars($value335, ($arguments333['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments333['encoding'] !== NULL ? $arguments333['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments333['doubleEncode']));

$output329 .= '</h3>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper
$arguments336 = array();
$arguments336['parseFuncTSPath'] = 'lib.parseFunc_RTE';
$renderChildrenClosure337 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.content', $renderingContext);
};
$viewHelper338 = $self->getViewHelper('$viewHelper338', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper');
$viewHelper338->setArguments($arguments336);
$viewHelper338->setRenderingContext($renderingContext);
$viewHelper338->setRenderChildrenClosure($renderChildrenClosure337);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper

$output329 .= $viewHelper338->initializeArgumentsAndRender();

$output329 .= '
					<span class="text-muted">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments339 = array();
$arguments339['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'item.date', $renderingContext);
$arguments339['keepQuotes'] = false;
$arguments339['encoding'] = NULL;
$arguments339['doubleEncode'] = true;
$renderChildrenClosure340 = function() use ($renderingContext, $self) {
return NULL;
};
$value341 = ($arguments339['value'] !== NULL ? $arguments339['value'] : $renderChildrenClosure340());

$output329 .= (!is_string($value341) ? $value341 : htmlspecialchars($value341, ($arguments339['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments339['encoding'] !== NULL ? $arguments339['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments339['doubleEncode']));

$output329 .= '</span>
				</div>
				';
return $output329;
};

$output326 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments327, $renderChildrenClosure328, $renderingContext);

$output326 .= '
			</div>
			<a class="left typo3-login-carousel-control" href="#loginNews" role="button" data-slide="prev">
				<i class="fa fa-angle-left"></i>
				<span class="sr-only">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments342 = array();
$output343 = '';

$output343 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output343 .= 'labels.previous';
$arguments342['key'] = $output343;
$arguments342['id'] = NULL;
$arguments342['default'] = NULL;
$arguments342['htmlEscape'] = NULL;
$arguments342['arguments'] = NULL;
$arguments342['extensionName'] = NULL;
$renderChildrenClosure344 = function() use ($renderingContext, $self) {
return NULL;
};

$output326 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments342, $renderChildrenClosure344, $renderingContext);

$output326 .= '</span>
			</a>
			<a class="right typo3-login-carousel-control" href="#loginNews" role="button" data-slide="next">
				<i class="fa fa-angle-right"></i>
				<span class="sr-only">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments345 = array();
$output346 = '';

$output346 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'labelPrefixPath', $renderingContext);

$output346 .= 'labels.next';
$arguments345['key'] = $output346;
$arguments345['id'] = NULL;
$arguments345['default'] = NULL;
$arguments345['htmlEscape'] = NULL;
$arguments345['arguments'] = NULL;
$arguments345['extensionName'] = NULL;
$renderChildrenClosure347 = function() use ($renderingContext, $self) {
return NULL;
};

$output326 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments345, $renderChildrenClosure347, $renderingContext);

$output326 .= '</span>
			</a>
		</div>
	';
return $output326;
};
$viewHelper348 = $self->getViewHelper('$viewHelper348', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper348->setArguments($arguments324);
$viewHelper348->setRenderingContext($renderingContext);
$viewHelper348->setRenderChildrenClosure($renderChildrenClosure325);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output323 .= $viewHelper348->initializeArgumentsAndRender();

$output323 .= '
';
return $output323;
};

$output159 .= '';

return $output159;
}


}
#1435880042    100565    