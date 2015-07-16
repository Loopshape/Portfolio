<?php
class FluidCache_Standalone_partial_Action_Tool_ImportantActions_CoreUpdateButton_85043a53808d1049a665935eac626e33694bda56 extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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

$output0 .= '<h4>Core update</h4>

<p>
	The install tool can automatically update the TYPO3 CMS core to its latest
	minor release if certain criteria are met.
</p>

<div id="coreUpdate">
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments1 = array();
// Rendering Boolean node
$arguments1['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'enableCoreUpdate', $renderingContext));
$arguments1['then'] = NULL;
$arguments1['else'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$output3 = '';

$output3 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments4 = array();
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
return '
			<div id="messageTemplate">
				<div class="typo3-message">
					<div class="header-container">
						<div class="message-header">
							<strong></strong>
						</div>
					</div>
					<div class="message-body">
					</div>
				</div>
				<p></p>
			</div>
			<div id="buttonTemplate">
				<fieldset class="t3-install-form-submit">
					<ol>
						<li>
							<button class="btn btn-default" type="submit" name="coreUpdateCheckForUpdate" data-action="checkForUpdate">
								Check for core updates
							</button>
						</li>
					</ol>
				</fieldset>
			</div>
		';
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments4, $renderChildrenClosure5, $renderingContext);

$output3 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments6 = array();
$renderChildrenClosure7 = function() use ($renderingContext, $self) {
return '
			<div class="typo3-message message-notice">
				<div class="header-container">
					<div class="message-header">
						<strong>Disabled</strong>
					</div>
				</div>
				<div class="message-body">
					This feature is disabled in this installation (through the environment variable <code>TYPO3_DISABLE_CORE_UPDATER=1</code>)
				</div>
			</div>
		';
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments6, $renderChildrenClosure7, $renderingContext);

$output3 .= '
	';
return $output3;
};
$arguments1['__thenClosure'] = function() use ($renderingContext, $self) {
return '
			<div id="messageTemplate">
				<div class="typo3-message">
					<div class="header-container">
						<div class="message-header">
							<strong></strong>
						</div>
					</div>
					<div class="message-body">
					</div>
				</div>
				<p></p>
			</div>
			<div id="buttonTemplate">
				<fieldset class="t3-install-form-submit">
					<ol>
						<li>
							<button class="btn btn-default" type="submit" name="coreUpdateCheckForUpdate" data-action="checkForUpdate">
								Check for core updates
							</button>
						</li>
					</ol>
				</fieldset>
			</div>
		';
};
$arguments1['__elseClosure'] = function() use ($renderingContext, $self) {
return '
			<div class="typo3-message message-notice">
				<div class="header-container">
					<div class="message-header">
						<strong>Disabled</strong>
					</div>
				</div>
				<div class="message-body">
					This feature is disabled in this installation (through the environment variable <code>TYPO3_DISABLE_CORE_UPDATER=1</code>)
				</div>
			</div>
		';
};
$viewHelper8 = $self->getViewHelper('$viewHelper8', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper8->setArguments($arguments1);
$viewHelper8->setRenderingContext($renderingContext);
$viewHelper8->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper8->initializeArgumentsAndRender();

$output0 .= '
</div>';

return $output0;
}


}
#1436712773    4524      