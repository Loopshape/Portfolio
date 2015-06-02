<?php
class FluidCache_Metaseo_BackendPageSeo_layout_BackendStandard_2b2bcaf1022110832d926549866dc58408378d38 extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\ContainerViewHelper
$arguments1 = array();
$arguments1['pageTitle'] = '';
$arguments1['enableClickMenu'] = true;
$arguments1['loadPrototype'] = true;
$arguments1['loadScriptaculous'] = false;
$arguments1['scriptaculousModule'] = '';
$arguments1['loadExtJs'] = false;
$arguments1['loadExtJsTheme'] = true;
$arguments1['extJsAdapter'] = '';
$arguments1['enableExtJsDebug'] = false;
$arguments1['loadJQuery'] = false;
$arguments1['includeCssFiles'] = NULL;
$arguments1['includeJsFiles'] = NULL;
$arguments1['addJsInlineLabels'] = NULL;
$arguments1['includeCsh'] = true;
$arguments1['includeRequireJsModules'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$output3 = '';

$output3 .= '

	<div class="typo3-fullDoc">

		<div id="typo3-docheader">
			<div class="typo3-docheader-functions">
				<div class="left">
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\CshViewHelper
$arguments4 = array();
$arguments4['table'] = NULL;
$arguments4['field'] = '';
$arguments4['iconOnly'] = false;
$arguments4['styleAttributes'] = '';
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper6 = $self->getViewHelper('$viewHelper6', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\CshViewHelper');
$viewHelper6->setArguments($arguments4);
$viewHelper6->setRenderingContext($renderingContext);
$viewHelper6->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\CshViewHelper

$output3 .= $viewHelper6->initializeArgumentsAndRender();

$output3 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments7 = array();
$arguments7['section'] = 'button-toolbar';
// Rendering Boolean node
$arguments7['optional'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('true');
$arguments7['partial'] = NULL;
$arguments7['arguments'] = array (
);
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
return NULL;
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments7, $renderChildrenClosure8, $renderingContext);

$output3 .= '
				</div>
				<div class="right"></div>
			</div>
			<div class="typo3-docheader-buttons">
				<div class="left"></div>
				<div class="right">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\ShortcutViewHelper
$arguments9 = array();
$arguments9['getVars'] = array (
);
$arguments9['setVars'] = array (
);
$renderChildrenClosure10 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper11 = $self->getViewHelper('$viewHelper11', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\ShortcutViewHelper');
$viewHelper11->setArguments($arguments9);
$viewHelper11->setRenderingContext($renderingContext);
$viewHelper11->setRenderChildrenClosure($renderChildrenClosure10);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\ShortcutViewHelper

$output3 .= $viewHelper11->initializeArgumentsAndRender();

$output3 .= '</div>
			</div>
		</div>

		<div id="typo3-docbody">
			<div id="typo3-inner-docbody">
                ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments12 = array();
$arguments12['section'] = 'title';
// Rendering Boolean node
$arguments12['optional'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('true');
$arguments12['partial'] = NULL;
$arguments12['arguments'] = array (
);
$renderChildrenClosure13 = function() use ($renderingContext, $self) {
return NULL;
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments12, $renderChildrenClosure13, $renderingContext);

$output3 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FlashMessagesViewHelper
$arguments14 = array();
$arguments14['renderMode'] = 'div';
$arguments14['additionalAttributes'] = NULL;
$arguments14['data'] = NULL;
$arguments14['class'] = NULL;
$arguments14['dir'] = NULL;
$arguments14['id'] = NULL;
$arguments14['lang'] = NULL;
$arguments14['style'] = NULL;
$arguments14['title'] = NULL;
$arguments14['accesskey'] = NULL;
$arguments14['tabindex'] = NULL;
$arguments14['onclick'] = NULL;
$renderChildrenClosure15 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper16 = $self->getViewHelper('$viewHelper16', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\FlashMessagesViewHelper');
$viewHelper16->setArguments($arguments14);
$viewHelper16->setRenderingContext($renderingContext);
$viewHelper16->setRenderChildrenClosure($renderChildrenClosure15);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FlashMessagesViewHelper

$output3 .= $viewHelper16->initializeArgumentsAndRender();

$output3 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments17 = array();
$arguments17['section'] = 'content';
$arguments17['partial'] = NULL;
$arguments17['arguments'] = array (
);
$arguments17['optional'] = false;
$renderChildrenClosure18 = function() use ($renderingContext, $self) {
return NULL;
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments17, $renderChildrenClosure18, $renderingContext);

$output3 .= '
			</div>
		</div>

	</div>

';
return $output3;
};
$viewHelper19 = $self->getViewHelper('$viewHelper19', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\ContainerViewHelper');
$viewHelper19->setArguments($arguments1);
$viewHelper19->setRenderingContext($renderingContext);
$viewHelper19->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\ContainerViewHelper

$output0 .= $viewHelper19->initializeArgumentsAndRender();

$output0 .= '
';

return $output0;
}


}
#1433272570    6411      