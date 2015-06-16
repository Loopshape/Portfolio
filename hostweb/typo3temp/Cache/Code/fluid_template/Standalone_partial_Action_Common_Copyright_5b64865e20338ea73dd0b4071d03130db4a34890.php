<?php
class FluidCache_Standalone_partial_Action_Common_Copyright_5b64865e20338ea73dd0b4071d03130db4a34890 extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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

<div id="t3-install-copyright">
	<p>
		<strong>TYPO3 CMS.</strong> Copyright © 1998-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments1 = array();
$arguments1['format'] = 'Y';
$arguments1['date'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'time', $renderingContext);
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments1, $renderChildrenClosure2, $renderingContext);

$output0 .= '
		Kasper Skårhøj. Extensions are copyright of their respective owners.
		Go to <a href="';
// Rendering ViewHelper TYPO3\CMS\Install\ViewHelpers\ConstantViewHelper
$arguments3 = array();
$arguments3['name'] = 'TYPO3_URL_GENERAL';
$renderChildrenClosure4 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper5 = $self->getViewHelper('$viewHelper5', $renderingContext, 'TYPO3\CMS\Install\ViewHelpers\ConstantViewHelper');
$viewHelper5->setArguments($arguments3);
$viewHelper5->setRenderingContext($renderingContext);
$viewHelper5->setRenderChildrenClosure($renderChildrenClosure4);
// End of ViewHelper TYPO3\CMS\Install\ViewHelpers\ConstantViewHelper

$output0 .= $viewHelper5->initializeArgumentsAndRender();

$output0 .= '">';
// Rendering ViewHelper TYPO3\CMS\Install\ViewHelpers\ConstantViewHelper
$arguments6 = array();
$arguments6['name'] = 'TYPO3_URL_GENERAL';
$renderChildrenClosure7 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper8 = $self->getViewHelper('$viewHelper8', $renderingContext, 'TYPO3\CMS\Install\ViewHelpers\ConstantViewHelper');
$viewHelper8->setArguments($arguments6);
$viewHelper8->setRenderingContext($renderingContext);
$viewHelper8->setRenderChildrenClosure($renderChildrenClosure7);
// End of ViewHelper TYPO3\CMS\Install\ViewHelpers\ConstantViewHelper

$output0 .= $viewHelper8->initializeArgumentsAndRender();

$output0 .= '</a> for details.
		TYPO3 comes with ABSOLUTELY NO WARRANTY; <a href="';
// Rendering ViewHelper TYPO3\CMS\Install\ViewHelpers\ConstantViewHelper
$arguments9 = array();
$arguments9['name'] = 'TYPO3_URL_LICENSE';
$renderChildrenClosure10 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper11 = $self->getViewHelper('$viewHelper11', $renderingContext, 'TYPO3\CMS\Install\ViewHelpers\ConstantViewHelper');
$viewHelper11->setArguments($arguments9);
$viewHelper11->setRenderingContext($renderingContext);
$viewHelper11->setRenderChildrenClosure($renderChildrenClosure10);
// End of ViewHelper TYPO3\CMS\Install\ViewHelpers\ConstantViewHelper

$output0 .= $viewHelper11->initializeArgumentsAndRender();

$output0 .= '">click</a> for details.
		This is free software, and you are welcome to redistribute it under certain conditions;
		<a href="';
// Rendering ViewHelper TYPO3\CMS\Install\ViewHelpers\ConstantViewHelper
$arguments12 = array();
$arguments12['name'] = 'TYPO3_URL_LICENSE';
$renderChildrenClosure13 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper14 = $self->getViewHelper('$viewHelper14', $renderingContext, 'TYPO3\CMS\Install\ViewHelpers\ConstantViewHelper');
$viewHelper14->setArguments($arguments12);
$viewHelper14->setRenderingContext($renderingContext);
$viewHelper14->setRenderChildrenClosure($renderChildrenClosure13);
// End of ViewHelper TYPO3\CMS\Install\ViewHelpers\ConstantViewHelper

$output0 .= $viewHelper14->initializeArgumentsAndRender();

$output0 .= '">click</a> for details.
		Obstructing the appearance of this notice is prohibited by law.
	</p>
	<p>
		<a href="';
// Rendering ViewHelper TYPO3\CMS\Install\ViewHelpers\ConstantViewHelper
$arguments15 = array();
$arguments15['name'] = 'TYPO3_URL_DONATE';
$renderChildrenClosure16 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper17 = $self->getViewHelper('$viewHelper17', $renderingContext, 'TYPO3\CMS\Install\ViewHelpers\ConstantViewHelper');
$viewHelper17->setArguments($arguments15);
$viewHelper17->setRenderingContext($renderingContext);
$viewHelper17->setRenderChildrenClosure($renderChildrenClosure16);
// End of ViewHelper TYPO3\CMS\Install\ViewHelpers\ConstantViewHelper

$output0 .= $viewHelper17->initializeArgumentsAndRender();

$output0 .= '"><strong>Donate</strong></a> |
		<a href="';
// Rendering ViewHelper TYPO3\CMS\Install\ViewHelpers\ConstantViewHelper
$arguments18 = array();
$arguments18['name'] = 'TYPO3_URL_ORG';
$renderChildrenClosure19 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper20 = $self->getViewHelper('$viewHelper20', $renderingContext, 'TYPO3\CMS\Install\ViewHelpers\ConstantViewHelper');
$viewHelper20->setArguments($arguments18);
$viewHelper20->setRenderingContext($renderingContext);
$viewHelper20->setRenderChildrenClosure($renderChildrenClosure19);
// End of ViewHelper TYPO3\CMS\Install\ViewHelpers\ConstantViewHelper

$output0 .= $viewHelper20->initializeArgumentsAndRender();

$output0 .= '">TYPO3.org</a>
	</p>
</div>';

return $output0;
}


}
#1434485491    5745      