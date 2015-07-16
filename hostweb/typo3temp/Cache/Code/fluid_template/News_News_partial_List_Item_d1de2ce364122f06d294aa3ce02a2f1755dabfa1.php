<?php
class FluidCache_News_News_partial_List_Item_d1de2ce364122f06d294aa3ce02a2f1755dabfa1 extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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

$output0 .= '<!--
	=====================
		Partials/List/Item.html
-->
<div class="article articletype-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments1 = array();
$arguments1['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.type', $renderingContext);
$arguments1['keepQuotes'] = false;
$arguments1['encoding'] = NULL;
$arguments1['doubleEncode'] = true;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
return NULL;
};
$value3 = ($arguments1['value'] !== NULL ? $arguments1['value'] : $renderChildrenClosure2());

$output0 .= (!is_string($value3) ? $value3 : htmlspecialchars($value3, ($arguments1['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments1['encoding'] !== NULL ? $arguments1['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments1['doubleEncode']));
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments4 = array();
// Rendering Boolean node
$arguments4['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.istopnews', $renderingContext));
$arguments4['then'] = ' topnews';
$arguments4['else'] = NULL;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper6 = $self->getViewHelper('$viewHelper6', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper6->setArguments($arguments4);
$viewHelper6->setRenderingContext($renderingContext);
$viewHelper6->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper6->initializeArgumentsAndRender();

$output0 .= '">
	';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\ExcludeDisplayedNewsViewHelper
$arguments7 = array();
$arguments7['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper9 = $self->getViewHelper('$viewHelper9', $renderingContext, 'GeorgRinger\News\ViewHelpers\ExcludeDisplayedNewsViewHelper');
$viewHelper9->setArguments($arguments7);
$viewHelper9->setRenderingContext($renderingContext);
$viewHelper9->setRenderChildrenClosure($renderChildrenClosure8);
// End of ViewHelper GeorgRinger\News\ViewHelpers\ExcludeDisplayedNewsViewHelper

$output0 .= $viewHelper9->initializeArgumentsAndRender();

$output0 .= '
	<!-- header -->
	<div class="header">
		<h3>
			';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments10 = array();
$arguments10['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments10['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments10['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments10['additionalAttributes'] = NULL;
$arguments10['data'] = NULL;
$arguments10['uriOnly'] = false;
$arguments10['configuration'] = array (
);
$arguments10['content'] = '';
$arguments10['class'] = NULL;
$arguments10['dir'] = NULL;
$arguments10['id'] = NULL;
$arguments10['lang'] = NULL;
$arguments10['style'] = NULL;
$arguments10['accesskey'] = NULL;
$arguments10['tabindex'] = NULL;
$arguments10['onclick'] = NULL;
$arguments10['target'] = NULL;
$arguments10['rel'] = NULL;
$renderChildrenClosure11 = function() use ($renderingContext, $self) {
$output12 = '';

$output12 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments13 = array();
$arguments13['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments13['keepQuotes'] = false;
$arguments13['encoding'] = NULL;
$arguments13['doubleEncode'] = true;
$renderChildrenClosure14 = function() use ($renderingContext, $self) {
return NULL;
};
$value15 = ($arguments13['value'] !== NULL ? $arguments13['value'] : $renderChildrenClosure14());

$output12 .= (!is_string($value15) ? $value15 : htmlspecialchars($value15, ($arguments13['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments13['encoding'] !== NULL ? $arguments13['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments13['doubleEncode']));

$output12 .= '
			';
return $output12;
};
$viewHelper16 = $self->getViewHelper('$viewHelper16', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper16->setArguments($arguments10);
$viewHelper16->setRenderingContext($renderingContext);
$viewHelper16->setRenderChildrenClosure($renderChildrenClosure11);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output0 .= $viewHelper16->initializeArgumentsAndRender();

$output0 .= '
		</h3>
	</div>

	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments17 = array();
// Rendering Boolean node
$arguments17['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.falMedia', $renderingContext));
$arguments17['then'] = NULL;
$arguments17['else'] = NULL;
$renderChildrenClosure18 = function() use ($renderingContext, $self) {
$output19 = '';

$output19 .= '
		<!-- fal media preview element -->
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments20 = array();
$renderChildrenClosure21 = function() use ($renderingContext, $self) {
$output22 = '';

$output22 .= '
			<div class="news-img-wrap">
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments23 = array();
// Rendering Boolean node
$arguments23['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.falMediaPreviews', $renderingContext));
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
						';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments29 = array();
$arguments29['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments29['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments29['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments29['additionalAttributes'] = NULL;
$arguments29['data'] = NULL;
$arguments29['uriOnly'] = false;
$arguments29['configuration'] = array (
);
$arguments29['content'] = '';
$arguments29['class'] = NULL;
$arguments29['dir'] = NULL;
$arguments29['id'] = NULL;
$arguments29['lang'] = NULL;
$arguments29['style'] = NULL;
$arguments29['accesskey'] = NULL;
$arguments29['tabindex'] = NULL;
$arguments29['onclick'] = NULL;
$arguments29['target'] = NULL;
$arguments29['rel'] = NULL;
$renderChildrenClosure30 = function() use ($renderingContext, $self) {
$output31 = '';

$output31 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper
$arguments32 = array();
// Rendering Array
$array33 = array();
$array33['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.falMediaPreviews.0', $renderingContext);
$arguments32['map'] = $array33;
$renderChildrenClosure34 = function() use ($renderingContext, $self) {
$output35 = '';

$output35 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments36 = array();
// Rendering Boolean node
$arguments36['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.type', $renderingContext), 2);
$arguments36['then'] = NULL;
$arguments36['else'] = NULL;
$renderChildrenClosure37 = function() use ($renderingContext, $self) {
$output38 = '';

$output38 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments39 = array();
$arguments39['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.uid', $renderingContext);
// Rendering Boolean node
$arguments39['treatIdAsReference'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('1');
$arguments39['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.title', $renderingContext);
$arguments39['alt'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.alternative', $renderingContext);
$arguments39['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments39['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments39['additionalAttributes'] = NULL;
$arguments39['data'] = NULL;
$arguments39['width'] = NULL;
$arguments39['height'] = NULL;
$arguments39['minWidth'] = NULL;
$arguments39['minHeight'] = NULL;
$arguments39['image'] = NULL;
$arguments39['crop'] = NULL;
$arguments39['class'] = NULL;
$arguments39['dir'] = NULL;
$arguments39['id'] = NULL;
$arguments39['lang'] = NULL;
$arguments39['style'] = NULL;
$arguments39['accesskey'] = NULL;
$arguments39['tabindex'] = NULL;
$arguments39['onclick'] = NULL;
$arguments39['ismap'] = NULL;
$arguments39['longdesc'] = NULL;
$arguments39['usemap'] = NULL;
$renderChildrenClosure40 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper41 = $self->getViewHelper('$viewHelper41', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper41->setArguments($arguments39);
$viewHelper41->setRenderingContext($renderingContext);
$viewHelper41->setRenderChildrenClosure($renderChildrenClosure40);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output38 .= $viewHelper41->initializeArgumentsAndRender();

$output38 .= '
								';
return $output38;
};
$viewHelper42 = $self->getViewHelper('$viewHelper42', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper42->setArguments($arguments36);
$viewHelper42->setRenderingContext($renderingContext);
$viewHelper42->setRenderChildrenClosure($renderChildrenClosure37);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output35 .= $viewHelper42->initializeArgumentsAndRender();

$output35 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments43 = array();
// Rendering Boolean node
$arguments43['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.type', $renderingContext), 4);
$arguments43['then'] = NULL;
$arguments43['else'] = NULL;
$renderChildrenClosure44 = function() use ($renderingContext, $self) {
$output45 = '';

$output45 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments46 = array();
$arguments46['partial'] = 'Detail/FalMediaVideo';
// Rendering Array
$array47 = array();
$array47['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement', $renderingContext);
$arguments46['arguments'] = $array47;
$arguments46['section'] = NULL;
$arguments46['optional'] = false;
$renderChildrenClosure48 = function() use ($renderingContext, $self) {
return NULL;
};

$output45 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments46, $renderChildrenClosure48, $renderingContext);

$output45 .= '
								';
return $output45;
};
$viewHelper49 = $self->getViewHelper('$viewHelper49', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper49->setArguments($arguments43);
$viewHelper49->setRenderingContext($renderingContext);
$viewHelper49->setRenderChildrenClosure($renderChildrenClosure44);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output35 .= $viewHelper49->initializeArgumentsAndRender();

$output35 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments50 = array();
// Rendering Boolean node
$arguments50['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.type', $renderingContext), 5);
$arguments50['then'] = NULL;
$arguments50['else'] = NULL;
$renderChildrenClosure51 = function() use ($renderingContext, $self) {
$output52 = '';

$output52 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments53 = array();
$arguments53['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.uid', $renderingContext);
// Rendering Boolean node
$arguments53['treatIdAsReference'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('1');
$arguments53['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.title', $renderingContext);
$arguments53['alt'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.alternative', $renderingContext);
$arguments53['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments53['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments53['additionalAttributes'] = NULL;
$arguments53['data'] = NULL;
$arguments53['width'] = NULL;
$arguments53['height'] = NULL;
$arguments53['minWidth'] = NULL;
$arguments53['minHeight'] = NULL;
$arguments53['image'] = NULL;
$arguments53['crop'] = NULL;
$arguments53['class'] = NULL;
$arguments53['dir'] = NULL;
$arguments53['id'] = NULL;
$arguments53['lang'] = NULL;
$arguments53['style'] = NULL;
$arguments53['accesskey'] = NULL;
$arguments53['tabindex'] = NULL;
$arguments53['onclick'] = NULL;
$arguments53['ismap'] = NULL;
$arguments53['longdesc'] = NULL;
$arguments53['usemap'] = NULL;
$renderChildrenClosure54 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper55 = $self->getViewHelper('$viewHelper55', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper55->setArguments($arguments53);
$viewHelper55->setRenderingContext($renderingContext);
$viewHelper55->setRenderChildrenClosure($renderChildrenClosure54);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output52 .= $viewHelper55->initializeArgumentsAndRender();

$output52 .= '
								';
return $output52;
};
$viewHelper56 = $self->getViewHelper('$viewHelper56', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper56->setArguments($arguments50);
$viewHelper56->setRenderingContext($renderingContext);
$viewHelper56->setRenderChildrenClosure($renderChildrenClosure51);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output35 .= $viewHelper56->initializeArgumentsAndRender();

$output35 .= '
							';
return $output35;
};

$output31 .= TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper::renderStatic($arguments32, $renderChildrenClosure34, $renderingContext);

$output31 .= '
						';
return $output31;
};
$viewHelper57 = $self->getViewHelper('$viewHelper57', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper57->setArguments($arguments29);
$viewHelper57->setRenderingContext($renderingContext);
$viewHelper57->setRenderChildrenClosure($renderChildrenClosure30);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output28 .= $viewHelper57->initializeArgumentsAndRender();

$output28 .= '
					';
return $output28;
};

$output25 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments26, $renderChildrenClosure27, $renderingContext);

$output25 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments58 = array();
$renderChildrenClosure59 = function() use ($renderingContext, $self) {
$output60 = '';

$output60 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments61 = array();
// Rendering Boolean node
$arguments61['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.displayDummyIfNoMedia', $renderingContext));
$arguments61['then'] = NULL;
$arguments61['else'] = NULL;
$renderChildrenClosure62 = function() use ($renderingContext, $self) {
$output63 = '';

$output63 .= '
							<span class="no-media-element">
								';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments64 = array();
$arguments64['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments64['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments64['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments64['additionalAttributes'] = NULL;
$arguments64['data'] = NULL;
$arguments64['uriOnly'] = false;
$arguments64['configuration'] = array (
);
$arguments64['content'] = '';
$arguments64['class'] = NULL;
$arguments64['dir'] = NULL;
$arguments64['id'] = NULL;
$arguments64['lang'] = NULL;
$arguments64['style'] = NULL;
$arguments64['accesskey'] = NULL;
$arguments64['tabindex'] = NULL;
$arguments64['onclick'] = NULL;
$arguments64['target'] = NULL;
$arguments64['rel'] = NULL;
$renderChildrenClosure65 = function() use ($renderingContext, $self) {
$output66 = '';

$output66 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments67 = array();
$arguments67['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.dummyImage', $renderingContext);
$arguments67['title'] = '';
$arguments67['alt'] = '';
$arguments67['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments67['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments67['additionalAttributes'] = NULL;
$arguments67['data'] = NULL;
$arguments67['width'] = NULL;
$arguments67['height'] = NULL;
$arguments67['minWidth'] = NULL;
$arguments67['minHeight'] = NULL;
$arguments67['treatIdAsReference'] = false;
$arguments67['image'] = NULL;
$arguments67['crop'] = NULL;
$arguments67['class'] = NULL;
$arguments67['dir'] = NULL;
$arguments67['id'] = NULL;
$arguments67['lang'] = NULL;
$arguments67['style'] = NULL;
$arguments67['accesskey'] = NULL;
$arguments67['tabindex'] = NULL;
$arguments67['onclick'] = NULL;
$arguments67['ismap'] = NULL;
$arguments67['longdesc'] = NULL;
$arguments67['usemap'] = NULL;
$renderChildrenClosure68 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper69 = $self->getViewHelper('$viewHelper69', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper69->setArguments($arguments67);
$viewHelper69->setRenderingContext($renderingContext);
$viewHelper69->setRenderChildrenClosure($renderChildrenClosure68);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output66 .= $viewHelper69->initializeArgumentsAndRender();

$output66 .= '
								';
return $output66;
};
$viewHelper70 = $self->getViewHelper('$viewHelper70', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper70->setArguments($arguments64);
$viewHelper70->setRenderingContext($renderingContext);
$viewHelper70->setRenderChildrenClosure($renderChildrenClosure65);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output63 .= $viewHelper70->initializeArgumentsAndRender();

$output63 .= '
							</span>
						';
return $output63;
};
$viewHelper71 = $self->getViewHelper('$viewHelper71', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper71->setArguments($arguments61);
$viewHelper71->setRenderingContext($renderingContext);
$viewHelper71->setRenderChildrenClosure($renderChildrenClosure62);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output60 .= $viewHelper71->initializeArgumentsAndRender();

$output60 .= '
					';
return $output60;
};

$output25 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments58, $renderChildrenClosure59, $renderingContext);

$output25 .= '
				';
return $output25;
};
$arguments23['__thenClosure'] = function() use ($renderingContext, $self) {
$output72 = '';

$output72 .= '
						';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments73 = array();
$arguments73['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments73['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments73['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments73['additionalAttributes'] = NULL;
$arguments73['data'] = NULL;
$arguments73['uriOnly'] = false;
$arguments73['configuration'] = array (
);
$arguments73['content'] = '';
$arguments73['class'] = NULL;
$arguments73['dir'] = NULL;
$arguments73['id'] = NULL;
$arguments73['lang'] = NULL;
$arguments73['style'] = NULL;
$arguments73['accesskey'] = NULL;
$arguments73['tabindex'] = NULL;
$arguments73['onclick'] = NULL;
$arguments73['target'] = NULL;
$arguments73['rel'] = NULL;
$renderChildrenClosure74 = function() use ($renderingContext, $self) {
$output75 = '';

$output75 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper
$arguments76 = array();
// Rendering Array
$array77 = array();
$array77['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.falMediaPreviews.0', $renderingContext);
$arguments76['map'] = $array77;
$renderChildrenClosure78 = function() use ($renderingContext, $self) {
$output79 = '';

$output79 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments80 = array();
// Rendering Boolean node
$arguments80['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.type', $renderingContext), 2);
$arguments80['then'] = NULL;
$arguments80['else'] = NULL;
$renderChildrenClosure81 = function() use ($renderingContext, $self) {
$output82 = '';

$output82 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments83 = array();
$arguments83['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.uid', $renderingContext);
// Rendering Boolean node
$arguments83['treatIdAsReference'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('1');
$arguments83['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.title', $renderingContext);
$arguments83['alt'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.alternative', $renderingContext);
$arguments83['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments83['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments83['additionalAttributes'] = NULL;
$arguments83['data'] = NULL;
$arguments83['width'] = NULL;
$arguments83['height'] = NULL;
$arguments83['minWidth'] = NULL;
$arguments83['minHeight'] = NULL;
$arguments83['image'] = NULL;
$arguments83['crop'] = NULL;
$arguments83['class'] = NULL;
$arguments83['dir'] = NULL;
$arguments83['id'] = NULL;
$arguments83['lang'] = NULL;
$arguments83['style'] = NULL;
$arguments83['accesskey'] = NULL;
$arguments83['tabindex'] = NULL;
$arguments83['onclick'] = NULL;
$arguments83['ismap'] = NULL;
$arguments83['longdesc'] = NULL;
$arguments83['usemap'] = NULL;
$renderChildrenClosure84 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper85 = $self->getViewHelper('$viewHelper85', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper85->setArguments($arguments83);
$viewHelper85->setRenderingContext($renderingContext);
$viewHelper85->setRenderChildrenClosure($renderChildrenClosure84);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output82 .= $viewHelper85->initializeArgumentsAndRender();

$output82 .= '
								';
return $output82;
};
$viewHelper86 = $self->getViewHelper('$viewHelper86', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper86->setArguments($arguments80);
$viewHelper86->setRenderingContext($renderingContext);
$viewHelper86->setRenderChildrenClosure($renderChildrenClosure81);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output79 .= $viewHelper86->initializeArgumentsAndRender();

$output79 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments87 = array();
// Rendering Boolean node
$arguments87['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.type', $renderingContext), 4);
$arguments87['then'] = NULL;
$arguments87['else'] = NULL;
$renderChildrenClosure88 = function() use ($renderingContext, $self) {
$output89 = '';

$output89 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments90 = array();
$arguments90['partial'] = 'Detail/FalMediaVideo';
// Rendering Array
$array91 = array();
$array91['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement', $renderingContext);
$arguments90['arguments'] = $array91;
$arguments90['section'] = NULL;
$arguments90['optional'] = false;
$renderChildrenClosure92 = function() use ($renderingContext, $self) {
return NULL;
};

$output89 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments90, $renderChildrenClosure92, $renderingContext);

$output89 .= '
								';
return $output89;
};
$viewHelper93 = $self->getViewHelper('$viewHelper93', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper93->setArguments($arguments87);
$viewHelper93->setRenderingContext($renderingContext);
$viewHelper93->setRenderChildrenClosure($renderChildrenClosure88);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output79 .= $viewHelper93->initializeArgumentsAndRender();

$output79 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments94 = array();
// Rendering Boolean node
$arguments94['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.type', $renderingContext), 5);
$arguments94['then'] = NULL;
$arguments94['else'] = NULL;
$renderChildrenClosure95 = function() use ($renderingContext, $self) {
$output96 = '';

$output96 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments97 = array();
$arguments97['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.uid', $renderingContext);
// Rendering Boolean node
$arguments97['treatIdAsReference'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('1');
$arguments97['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.title', $renderingContext);
$arguments97['alt'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.alternative', $renderingContext);
$arguments97['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments97['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments97['additionalAttributes'] = NULL;
$arguments97['data'] = NULL;
$arguments97['width'] = NULL;
$arguments97['height'] = NULL;
$arguments97['minWidth'] = NULL;
$arguments97['minHeight'] = NULL;
$arguments97['image'] = NULL;
$arguments97['crop'] = NULL;
$arguments97['class'] = NULL;
$arguments97['dir'] = NULL;
$arguments97['id'] = NULL;
$arguments97['lang'] = NULL;
$arguments97['style'] = NULL;
$arguments97['accesskey'] = NULL;
$arguments97['tabindex'] = NULL;
$arguments97['onclick'] = NULL;
$arguments97['ismap'] = NULL;
$arguments97['longdesc'] = NULL;
$arguments97['usemap'] = NULL;
$renderChildrenClosure98 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper99 = $self->getViewHelper('$viewHelper99', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper99->setArguments($arguments97);
$viewHelper99->setRenderingContext($renderingContext);
$viewHelper99->setRenderChildrenClosure($renderChildrenClosure98);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output96 .= $viewHelper99->initializeArgumentsAndRender();

$output96 .= '
								';
return $output96;
};
$viewHelper100 = $self->getViewHelper('$viewHelper100', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper100->setArguments($arguments94);
$viewHelper100->setRenderingContext($renderingContext);
$viewHelper100->setRenderChildrenClosure($renderChildrenClosure95);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output79 .= $viewHelper100->initializeArgumentsAndRender();

$output79 .= '
							';
return $output79;
};

$output75 .= TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper::renderStatic($arguments76, $renderChildrenClosure78, $renderingContext);

$output75 .= '
						';
return $output75;
};
$viewHelper101 = $self->getViewHelper('$viewHelper101', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper101->setArguments($arguments73);
$viewHelper101->setRenderingContext($renderingContext);
$viewHelper101->setRenderChildrenClosure($renderChildrenClosure74);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output72 .= $viewHelper101->initializeArgumentsAndRender();

$output72 .= '
					';
return $output72;
};
$arguments23['__elseClosure'] = function() use ($renderingContext, $self) {
$output102 = '';

$output102 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments103 = array();
// Rendering Boolean node
$arguments103['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.displayDummyIfNoMedia', $renderingContext));
$arguments103['then'] = NULL;
$arguments103['else'] = NULL;
$renderChildrenClosure104 = function() use ($renderingContext, $self) {
$output105 = '';

$output105 .= '
							<span class="no-media-element">
								';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments106 = array();
$arguments106['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments106['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments106['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments106['additionalAttributes'] = NULL;
$arguments106['data'] = NULL;
$arguments106['uriOnly'] = false;
$arguments106['configuration'] = array (
);
$arguments106['content'] = '';
$arguments106['class'] = NULL;
$arguments106['dir'] = NULL;
$arguments106['id'] = NULL;
$arguments106['lang'] = NULL;
$arguments106['style'] = NULL;
$arguments106['accesskey'] = NULL;
$arguments106['tabindex'] = NULL;
$arguments106['onclick'] = NULL;
$arguments106['target'] = NULL;
$arguments106['rel'] = NULL;
$renderChildrenClosure107 = function() use ($renderingContext, $self) {
$output108 = '';

$output108 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments109 = array();
$arguments109['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.dummyImage', $renderingContext);
$arguments109['title'] = '';
$arguments109['alt'] = '';
$arguments109['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments109['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments109['additionalAttributes'] = NULL;
$arguments109['data'] = NULL;
$arguments109['width'] = NULL;
$arguments109['height'] = NULL;
$arguments109['minWidth'] = NULL;
$arguments109['minHeight'] = NULL;
$arguments109['treatIdAsReference'] = false;
$arguments109['image'] = NULL;
$arguments109['crop'] = NULL;
$arguments109['class'] = NULL;
$arguments109['dir'] = NULL;
$arguments109['id'] = NULL;
$arguments109['lang'] = NULL;
$arguments109['style'] = NULL;
$arguments109['accesskey'] = NULL;
$arguments109['tabindex'] = NULL;
$arguments109['onclick'] = NULL;
$arguments109['ismap'] = NULL;
$arguments109['longdesc'] = NULL;
$arguments109['usemap'] = NULL;
$renderChildrenClosure110 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper111 = $self->getViewHelper('$viewHelper111', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper111->setArguments($arguments109);
$viewHelper111->setRenderingContext($renderingContext);
$viewHelper111->setRenderChildrenClosure($renderChildrenClosure110);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output108 .= $viewHelper111->initializeArgumentsAndRender();

$output108 .= '
								';
return $output108;
};
$viewHelper112 = $self->getViewHelper('$viewHelper112', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper112->setArguments($arguments106);
$viewHelper112->setRenderingContext($renderingContext);
$viewHelper112->setRenderChildrenClosure($renderChildrenClosure107);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output105 .= $viewHelper112->initializeArgumentsAndRender();

$output105 .= '
							</span>
						';
return $output105;
};
$viewHelper113 = $self->getViewHelper('$viewHelper113', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper113->setArguments($arguments103);
$viewHelper113->setRenderingContext($renderingContext);
$viewHelper113->setRenderChildrenClosure($renderChildrenClosure104);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output102 .= $viewHelper113->initializeArgumentsAndRender();

$output102 .= '
					';
return $output102;
};
$viewHelper114 = $self->getViewHelper('$viewHelper114', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper114->setArguments($arguments23);
$viewHelper114->setRenderingContext($renderingContext);
$viewHelper114->setRenderChildrenClosure($renderChildrenClosure24);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output22 .= $viewHelper114->initializeArgumentsAndRender();

$output22 .= '

			</div>
		';
return $output22;
};

$output19 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments20, $renderChildrenClosure21, $renderingContext);

$output19 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments115 = array();
$renderChildrenClosure116 = function() use ($renderingContext, $self) {
$output117 = '';

$output117 .= '

			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments118 = array();
// Rendering Boolean node
$arguments118['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.media', $renderingContext));
$arguments118['then'] = NULL;
$arguments118['else'] = NULL;
$renderChildrenClosure119 = function() use ($renderingContext, $self) {
$output120 = '';

$output120 .= '
				<!-- media preview element -->
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments121 = array();
$renderChildrenClosure122 = function() use ($renderingContext, $self) {
$output123 = '';

$output123 .= '
					<div class="news-img-wrap">
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments124 = array();
// Rendering Boolean node
$arguments124['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.mediaPreviews', $renderingContext));
$arguments124['then'] = NULL;
$arguments124['else'] = NULL;
$renderChildrenClosure125 = function() use ($renderingContext, $self) {
$output126 = '';

$output126 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments127 = array();
$renderChildrenClosure128 = function() use ($renderingContext, $self) {
$output129 = '';

$output129 .= '
								';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments130 = array();
$arguments130['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments130['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments130['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments130['additionalAttributes'] = NULL;
$arguments130['data'] = NULL;
$arguments130['uriOnly'] = false;
$arguments130['configuration'] = array (
);
$arguments130['content'] = '';
$arguments130['class'] = NULL;
$arguments130['dir'] = NULL;
$arguments130['id'] = NULL;
$arguments130['lang'] = NULL;
$arguments130['style'] = NULL;
$arguments130['accesskey'] = NULL;
$arguments130['tabindex'] = NULL;
$arguments130['onclick'] = NULL;
$arguments130['target'] = NULL;
$arguments130['rel'] = NULL;
$renderChildrenClosure131 = function() use ($renderingContext, $self) {
$output132 = '';

$output132 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper
$arguments133 = array();
// Rendering Array
$array134 = array();
$array134['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.mediaPreviews.0', $renderingContext);
$arguments133['map'] = $array134;
$renderChildrenClosure135 = function() use ($renderingContext, $self) {
$output136 = '';

$output136 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments137 = array();
// Rendering Boolean node
$arguments137['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 0);
$arguments137['then'] = NULL;
$arguments137['else'] = NULL;
$renderChildrenClosure138 = function() use ($renderingContext, $self) {
$output139 = '';

$output139 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments140 = array();
$output141 = '';

$output141 .= 'uploads/tx_news/';

$output141 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.image', $renderingContext);
$arguments140['src'] = $output141;
$arguments140['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.title', $renderingContext);
$arguments140['alt'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.alt', $renderingContext);
$arguments140['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments140['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments140['additionalAttributes'] = NULL;
$arguments140['data'] = NULL;
$arguments140['width'] = NULL;
$arguments140['height'] = NULL;
$arguments140['minWidth'] = NULL;
$arguments140['minHeight'] = NULL;
$arguments140['treatIdAsReference'] = false;
$arguments140['image'] = NULL;
$arguments140['crop'] = NULL;
$arguments140['class'] = NULL;
$arguments140['dir'] = NULL;
$arguments140['id'] = NULL;
$arguments140['lang'] = NULL;
$arguments140['style'] = NULL;
$arguments140['accesskey'] = NULL;
$arguments140['tabindex'] = NULL;
$arguments140['onclick'] = NULL;
$arguments140['ismap'] = NULL;
$arguments140['longdesc'] = NULL;
$arguments140['usemap'] = NULL;
$renderChildrenClosure142 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper143 = $self->getViewHelper('$viewHelper143', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper143->setArguments($arguments140);
$viewHelper143->setRenderingContext($renderingContext);
$viewHelper143->setRenderChildrenClosure($renderChildrenClosure142);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output139 .= $viewHelper143->initializeArgumentsAndRender();

$output139 .= '
										';
return $output139;
};
$viewHelper144 = $self->getViewHelper('$viewHelper144', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper144->setArguments($arguments137);
$viewHelper144->setRenderingContext($renderingContext);
$viewHelper144->setRenderChildrenClosure($renderChildrenClosure138);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output136 .= $viewHelper144->initializeArgumentsAndRender();

$output136 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments145 = array();
// Rendering Boolean node
$arguments145['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 1);
$arguments145['then'] = NULL;
$arguments145['else'] = NULL;
$renderChildrenClosure146 = function() use ($renderingContext, $self) {
$output147 = '';

$output147 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments148 = array();
$arguments148['partial'] = 'Detail/MediaVideo';
// Rendering Array
$array149 = array();
$array149['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement', $renderingContext);
$arguments148['arguments'] = $array149;
$arguments148['section'] = NULL;
$arguments148['optional'] = false;
$renderChildrenClosure150 = function() use ($renderingContext, $self) {
return NULL;
};

$output147 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments148, $renderChildrenClosure150, $renderingContext);

$output147 .= '
										';
return $output147;
};
$viewHelper151 = $self->getViewHelper('$viewHelper151', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper151->setArguments($arguments145);
$viewHelper151->setRenderingContext($renderingContext);
$viewHelper151->setRenderChildrenClosure($renderChildrenClosure146);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output136 .= $viewHelper151->initializeArgumentsAndRender();

$output136 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments152 = array();
// Rendering Boolean node
$arguments152['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 2);
$arguments152['then'] = NULL;
$arguments152['else'] = NULL;
$renderChildrenClosure153 = function() use ($renderingContext, $self) {
$output154 = '';

$output154 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments155 = array();
$arguments155['partial'] = 'Detail/MediaHtml';
// Rendering Array
$array156 = array();
$array156['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement', $renderingContext);
$arguments155['arguments'] = $array156;
$arguments155['section'] = NULL;
$arguments155['optional'] = false;
$renderChildrenClosure157 = function() use ($renderingContext, $self) {
return NULL;
};

$output154 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments155, $renderChildrenClosure157, $renderingContext);

$output154 .= '
										';
return $output154;
};
$viewHelper158 = $self->getViewHelper('$viewHelper158', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper158->setArguments($arguments152);
$viewHelper158->setRenderingContext($renderingContext);
$viewHelper158->setRenderChildrenClosure($renderChildrenClosure153);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output136 .= $viewHelper158->initializeArgumentsAndRender();

$output136 .= '
									';
return $output136;
};

$output132 .= TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper::renderStatic($arguments133, $renderChildrenClosure135, $renderingContext);

$output132 .= '
								';
return $output132;
};
$viewHelper159 = $self->getViewHelper('$viewHelper159', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper159->setArguments($arguments130);
$viewHelper159->setRenderingContext($renderingContext);
$viewHelper159->setRenderChildrenClosure($renderChildrenClosure131);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output129 .= $viewHelper159->initializeArgumentsAndRender();

$output129 .= '
							';
return $output129;
};

$output126 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments127, $renderChildrenClosure128, $renderingContext);

$output126 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments160 = array();
$renderChildrenClosure161 = function() use ($renderingContext, $self) {
$output162 = '';

$output162 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments163 = array();
// Rendering Boolean node
$arguments163['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.displayDummyIfNoMedia', $renderingContext));
$arguments163['then'] = NULL;
$arguments163['else'] = NULL;
$renderChildrenClosure164 = function() use ($renderingContext, $self) {
$output165 = '';

$output165 .= '
									<span class="no-media-element">
										';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments166 = array();
$arguments166['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments166['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments166['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments166['additionalAttributes'] = NULL;
$arguments166['data'] = NULL;
$arguments166['uriOnly'] = false;
$arguments166['configuration'] = array (
);
$arguments166['content'] = '';
$arguments166['class'] = NULL;
$arguments166['dir'] = NULL;
$arguments166['id'] = NULL;
$arguments166['lang'] = NULL;
$arguments166['style'] = NULL;
$arguments166['accesskey'] = NULL;
$arguments166['tabindex'] = NULL;
$arguments166['onclick'] = NULL;
$arguments166['target'] = NULL;
$arguments166['rel'] = NULL;
$renderChildrenClosure167 = function() use ($renderingContext, $self) {
$output168 = '';

$output168 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments169 = array();
$arguments169['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.dummyImage', $renderingContext);
$arguments169['title'] = '';
$arguments169['alt'] = '';
$arguments169['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments169['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments169['additionalAttributes'] = NULL;
$arguments169['data'] = NULL;
$arguments169['width'] = NULL;
$arguments169['height'] = NULL;
$arguments169['minWidth'] = NULL;
$arguments169['minHeight'] = NULL;
$arguments169['treatIdAsReference'] = false;
$arguments169['image'] = NULL;
$arguments169['crop'] = NULL;
$arguments169['class'] = NULL;
$arguments169['dir'] = NULL;
$arguments169['id'] = NULL;
$arguments169['lang'] = NULL;
$arguments169['style'] = NULL;
$arguments169['accesskey'] = NULL;
$arguments169['tabindex'] = NULL;
$arguments169['onclick'] = NULL;
$arguments169['ismap'] = NULL;
$arguments169['longdesc'] = NULL;
$arguments169['usemap'] = NULL;
$renderChildrenClosure170 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper171 = $self->getViewHelper('$viewHelper171', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper171->setArguments($arguments169);
$viewHelper171->setRenderingContext($renderingContext);
$viewHelper171->setRenderChildrenClosure($renderChildrenClosure170);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output168 .= $viewHelper171->initializeArgumentsAndRender();

$output168 .= '
										';
return $output168;
};
$viewHelper172 = $self->getViewHelper('$viewHelper172', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper172->setArguments($arguments166);
$viewHelper172->setRenderingContext($renderingContext);
$viewHelper172->setRenderChildrenClosure($renderChildrenClosure167);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output165 .= $viewHelper172->initializeArgumentsAndRender();

$output165 .= '
									</span>
								';
return $output165;
};
$viewHelper173 = $self->getViewHelper('$viewHelper173', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper173->setArguments($arguments163);
$viewHelper173->setRenderingContext($renderingContext);
$viewHelper173->setRenderChildrenClosure($renderChildrenClosure164);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output162 .= $viewHelper173->initializeArgumentsAndRender();

$output162 .= '
							';
return $output162;
};

$output126 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments160, $renderChildrenClosure161, $renderingContext);

$output126 .= '
						';
return $output126;
};
$arguments124['__thenClosure'] = function() use ($renderingContext, $self) {
$output174 = '';

$output174 .= '
								';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments175 = array();
$arguments175['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments175['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments175['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments175['additionalAttributes'] = NULL;
$arguments175['data'] = NULL;
$arguments175['uriOnly'] = false;
$arguments175['configuration'] = array (
);
$arguments175['content'] = '';
$arguments175['class'] = NULL;
$arguments175['dir'] = NULL;
$arguments175['id'] = NULL;
$arguments175['lang'] = NULL;
$arguments175['style'] = NULL;
$arguments175['accesskey'] = NULL;
$arguments175['tabindex'] = NULL;
$arguments175['onclick'] = NULL;
$arguments175['target'] = NULL;
$arguments175['rel'] = NULL;
$renderChildrenClosure176 = function() use ($renderingContext, $self) {
$output177 = '';

$output177 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper
$arguments178 = array();
// Rendering Array
$array179 = array();
$array179['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.mediaPreviews.0', $renderingContext);
$arguments178['map'] = $array179;
$renderChildrenClosure180 = function() use ($renderingContext, $self) {
$output181 = '';

$output181 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments182 = array();
// Rendering Boolean node
$arguments182['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 0);
$arguments182['then'] = NULL;
$arguments182['else'] = NULL;
$renderChildrenClosure183 = function() use ($renderingContext, $self) {
$output184 = '';

$output184 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments185 = array();
$output186 = '';

$output186 .= 'uploads/tx_news/';

$output186 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.image', $renderingContext);
$arguments185['src'] = $output186;
$arguments185['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.title', $renderingContext);
$arguments185['alt'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.alt', $renderingContext);
$arguments185['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments185['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments185['additionalAttributes'] = NULL;
$arguments185['data'] = NULL;
$arguments185['width'] = NULL;
$arguments185['height'] = NULL;
$arguments185['minWidth'] = NULL;
$arguments185['minHeight'] = NULL;
$arguments185['treatIdAsReference'] = false;
$arguments185['image'] = NULL;
$arguments185['crop'] = NULL;
$arguments185['class'] = NULL;
$arguments185['dir'] = NULL;
$arguments185['id'] = NULL;
$arguments185['lang'] = NULL;
$arguments185['style'] = NULL;
$arguments185['accesskey'] = NULL;
$arguments185['tabindex'] = NULL;
$arguments185['onclick'] = NULL;
$arguments185['ismap'] = NULL;
$arguments185['longdesc'] = NULL;
$arguments185['usemap'] = NULL;
$renderChildrenClosure187 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper188 = $self->getViewHelper('$viewHelper188', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper188->setArguments($arguments185);
$viewHelper188->setRenderingContext($renderingContext);
$viewHelper188->setRenderChildrenClosure($renderChildrenClosure187);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output184 .= $viewHelper188->initializeArgumentsAndRender();

$output184 .= '
										';
return $output184;
};
$viewHelper189 = $self->getViewHelper('$viewHelper189', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper189->setArguments($arguments182);
$viewHelper189->setRenderingContext($renderingContext);
$viewHelper189->setRenderChildrenClosure($renderChildrenClosure183);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output181 .= $viewHelper189->initializeArgumentsAndRender();

$output181 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments190 = array();
// Rendering Boolean node
$arguments190['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 1);
$arguments190['then'] = NULL;
$arguments190['else'] = NULL;
$renderChildrenClosure191 = function() use ($renderingContext, $self) {
$output192 = '';

$output192 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments193 = array();
$arguments193['partial'] = 'Detail/MediaVideo';
// Rendering Array
$array194 = array();
$array194['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement', $renderingContext);
$arguments193['arguments'] = $array194;
$arguments193['section'] = NULL;
$arguments193['optional'] = false;
$renderChildrenClosure195 = function() use ($renderingContext, $self) {
return NULL;
};

$output192 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments193, $renderChildrenClosure195, $renderingContext);

$output192 .= '
										';
return $output192;
};
$viewHelper196 = $self->getViewHelper('$viewHelper196', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper196->setArguments($arguments190);
$viewHelper196->setRenderingContext($renderingContext);
$viewHelper196->setRenderChildrenClosure($renderChildrenClosure191);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output181 .= $viewHelper196->initializeArgumentsAndRender();

$output181 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments197 = array();
// Rendering Boolean node
$arguments197['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 2);
$arguments197['then'] = NULL;
$arguments197['else'] = NULL;
$renderChildrenClosure198 = function() use ($renderingContext, $self) {
$output199 = '';

$output199 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments200 = array();
$arguments200['partial'] = 'Detail/MediaHtml';
// Rendering Array
$array201 = array();
$array201['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement', $renderingContext);
$arguments200['arguments'] = $array201;
$arguments200['section'] = NULL;
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

$output181 .= $viewHelper203->initializeArgumentsAndRender();

$output181 .= '
									';
return $output181;
};

$output177 .= TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper::renderStatic($arguments178, $renderChildrenClosure180, $renderingContext);

$output177 .= '
								';
return $output177;
};
$viewHelper204 = $self->getViewHelper('$viewHelper204', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper204->setArguments($arguments175);
$viewHelper204->setRenderingContext($renderingContext);
$viewHelper204->setRenderChildrenClosure($renderChildrenClosure176);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output174 .= $viewHelper204->initializeArgumentsAndRender();

$output174 .= '
							';
return $output174;
};
$arguments124['__elseClosure'] = function() use ($renderingContext, $self) {
$output205 = '';

$output205 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments206 = array();
// Rendering Boolean node
$arguments206['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.displayDummyIfNoMedia', $renderingContext));
$arguments206['then'] = NULL;
$arguments206['else'] = NULL;
$renderChildrenClosure207 = function() use ($renderingContext, $self) {
$output208 = '';

$output208 .= '
									<span class="no-media-element">
										';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments209 = array();
$arguments209['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments209['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments209['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments209['additionalAttributes'] = NULL;
$arguments209['data'] = NULL;
$arguments209['uriOnly'] = false;
$arguments209['configuration'] = array (
);
$arguments209['content'] = '';
$arguments209['class'] = NULL;
$arguments209['dir'] = NULL;
$arguments209['id'] = NULL;
$arguments209['lang'] = NULL;
$arguments209['style'] = NULL;
$arguments209['accesskey'] = NULL;
$arguments209['tabindex'] = NULL;
$arguments209['onclick'] = NULL;
$arguments209['target'] = NULL;
$arguments209['rel'] = NULL;
$renderChildrenClosure210 = function() use ($renderingContext, $self) {
$output211 = '';

$output211 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments212 = array();
$arguments212['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.dummyImage', $renderingContext);
$arguments212['title'] = '';
$arguments212['alt'] = '';
$arguments212['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments212['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments212['additionalAttributes'] = NULL;
$arguments212['data'] = NULL;
$arguments212['width'] = NULL;
$arguments212['height'] = NULL;
$arguments212['minWidth'] = NULL;
$arguments212['minHeight'] = NULL;
$arguments212['treatIdAsReference'] = false;
$arguments212['image'] = NULL;
$arguments212['crop'] = NULL;
$arguments212['class'] = NULL;
$arguments212['dir'] = NULL;
$arguments212['id'] = NULL;
$arguments212['lang'] = NULL;
$arguments212['style'] = NULL;
$arguments212['accesskey'] = NULL;
$arguments212['tabindex'] = NULL;
$arguments212['onclick'] = NULL;
$arguments212['ismap'] = NULL;
$arguments212['longdesc'] = NULL;
$arguments212['usemap'] = NULL;
$renderChildrenClosure213 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper214 = $self->getViewHelper('$viewHelper214', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper214->setArguments($arguments212);
$viewHelper214->setRenderingContext($renderingContext);
$viewHelper214->setRenderChildrenClosure($renderChildrenClosure213);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output211 .= $viewHelper214->initializeArgumentsAndRender();

$output211 .= '
										';
return $output211;
};
$viewHelper215 = $self->getViewHelper('$viewHelper215', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper215->setArguments($arguments209);
$viewHelper215->setRenderingContext($renderingContext);
$viewHelper215->setRenderChildrenClosure($renderChildrenClosure210);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output208 .= $viewHelper215->initializeArgumentsAndRender();

$output208 .= '
									</span>
								';
return $output208;
};
$viewHelper216 = $self->getViewHelper('$viewHelper216', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper216->setArguments($arguments206);
$viewHelper216->setRenderingContext($renderingContext);
$viewHelper216->setRenderChildrenClosure($renderChildrenClosure207);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output205 .= $viewHelper216->initializeArgumentsAndRender();

$output205 .= '
							';
return $output205;
};
$viewHelper217 = $self->getViewHelper('$viewHelper217', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper217->setArguments($arguments124);
$viewHelper217->setRenderingContext($renderingContext);
$viewHelper217->setRenderChildrenClosure($renderChildrenClosure125);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output123 .= $viewHelper217->initializeArgumentsAndRender();

$output123 .= '

					</div>
				';
return $output123;
};

$output120 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments121, $renderChildrenClosure122, $renderingContext);

$output120 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments218 = array();
$renderChildrenClosure219 = function() use ($renderingContext, $self) {
$output220 = '';

$output220 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments221 = array();
// Rendering Boolean node
$arguments221['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.displayDummyIfNoMedia', $renderingContext));
$arguments221['then'] = NULL;
$arguments221['else'] = NULL;
$renderChildrenClosure222 = function() use ($renderingContext, $self) {
$output223 = '';

$output223 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments224 = array();
$renderChildrenClosure225 = function() use ($renderingContext, $self) {
$output226 = '';

$output226 .= '
							<div class="news-img-wrap">
								';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments227 = array();
$arguments227['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments227['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments227['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments227['additionalAttributes'] = NULL;
$arguments227['data'] = NULL;
$arguments227['uriOnly'] = false;
$arguments227['configuration'] = array (
);
$arguments227['content'] = '';
$arguments227['class'] = NULL;
$arguments227['dir'] = NULL;
$arguments227['id'] = NULL;
$arguments227['lang'] = NULL;
$arguments227['style'] = NULL;
$arguments227['accesskey'] = NULL;
$arguments227['tabindex'] = NULL;
$arguments227['onclick'] = NULL;
$arguments227['target'] = NULL;
$arguments227['rel'] = NULL;
$renderChildrenClosure228 = function() use ($renderingContext, $self) {
$output229 = '';

$output229 .= '
									<span class="no-media-element">
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments230 = array();
$arguments230['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.dummyImage', $renderingContext);
$arguments230['title'] = '';
$arguments230['alt'] = '';
$arguments230['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments230['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments230['additionalAttributes'] = NULL;
$arguments230['data'] = NULL;
$arguments230['width'] = NULL;
$arguments230['height'] = NULL;
$arguments230['minWidth'] = NULL;
$arguments230['minHeight'] = NULL;
$arguments230['treatIdAsReference'] = false;
$arguments230['image'] = NULL;
$arguments230['crop'] = NULL;
$arguments230['class'] = NULL;
$arguments230['dir'] = NULL;
$arguments230['id'] = NULL;
$arguments230['lang'] = NULL;
$arguments230['style'] = NULL;
$arguments230['accesskey'] = NULL;
$arguments230['tabindex'] = NULL;
$arguments230['onclick'] = NULL;
$arguments230['ismap'] = NULL;
$arguments230['longdesc'] = NULL;
$arguments230['usemap'] = NULL;
$renderChildrenClosure231 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper232 = $self->getViewHelper('$viewHelper232', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper232->setArguments($arguments230);
$viewHelper232->setRenderingContext($renderingContext);
$viewHelper232->setRenderChildrenClosure($renderChildrenClosure231);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output229 .= $viewHelper232->initializeArgumentsAndRender();

$output229 .= '
									</span>
								';
return $output229;
};
$viewHelper233 = $self->getViewHelper('$viewHelper233', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper233->setArguments($arguments227);
$viewHelper233->setRenderingContext($renderingContext);
$viewHelper233->setRenderChildrenClosure($renderChildrenClosure228);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output226 .= $viewHelper233->initializeArgumentsAndRender();

$output226 .= '
							</div>
						';
return $output226;
};

$output223 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments224, $renderChildrenClosure225, $renderingContext);

$output223 .= '
					';
return $output223;
};
$arguments221['__thenClosure'] = function() use ($renderingContext, $self) {
$output234 = '';

$output234 .= '
							<div class="news-img-wrap">
								';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments235 = array();
$arguments235['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments235['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments235['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments235['additionalAttributes'] = NULL;
$arguments235['data'] = NULL;
$arguments235['uriOnly'] = false;
$arguments235['configuration'] = array (
);
$arguments235['content'] = '';
$arguments235['class'] = NULL;
$arguments235['dir'] = NULL;
$arguments235['id'] = NULL;
$arguments235['lang'] = NULL;
$arguments235['style'] = NULL;
$arguments235['accesskey'] = NULL;
$arguments235['tabindex'] = NULL;
$arguments235['onclick'] = NULL;
$arguments235['target'] = NULL;
$arguments235['rel'] = NULL;
$renderChildrenClosure236 = function() use ($renderingContext, $self) {
$output237 = '';

$output237 .= '
									<span class="no-media-element">
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments238 = array();
$arguments238['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.dummyImage', $renderingContext);
$arguments238['title'] = '';
$arguments238['alt'] = '';
$arguments238['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments238['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments238['additionalAttributes'] = NULL;
$arguments238['data'] = NULL;
$arguments238['width'] = NULL;
$arguments238['height'] = NULL;
$arguments238['minWidth'] = NULL;
$arguments238['minHeight'] = NULL;
$arguments238['treatIdAsReference'] = false;
$arguments238['image'] = NULL;
$arguments238['crop'] = NULL;
$arguments238['class'] = NULL;
$arguments238['dir'] = NULL;
$arguments238['id'] = NULL;
$arguments238['lang'] = NULL;
$arguments238['style'] = NULL;
$arguments238['accesskey'] = NULL;
$arguments238['tabindex'] = NULL;
$arguments238['onclick'] = NULL;
$arguments238['ismap'] = NULL;
$arguments238['longdesc'] = NULL;
$arguments238['usemap'] = NULL;
$renderChildrenClosure239 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper240 = $self->getViewHelper('$viewHelper240', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper240->setArguments($arguments238);
$viewHelper240->setRenderingContext($renderingContext);
$viewHelper240->setRenderChildrenClosure($renderChildrenClosure239);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output237 .= $viewHelper240->initializeArgumentsAndRender();

$output237 .= '
									</span>
								';
return $output237;
};
$viewHelper241 = $self->getViewHelper('$viewHelper241', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper241->setArguments($arguments235);
$viewHelper241->setRenderingContext($renderingContext);
$viewHelper241->setRenderChildrenClosure($renderChildrenClosure236);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output234 .= $viewHelper241->initializeArgumentsAndRender();

$output234 .= '
							</div>
						';
return $output234;
};
$viewHelper242 = $self->getViewHelper('$viewHelper242', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper242->setArguments($arguments221);
$viewHelper242->setRenderingContext($renderingContext);
$viewHelper242->setRenderChildrenClosure($renderChildrenClosure222);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output220 .= $viewHelper242->initializeArgumentsAndRender();

$output220 .= '
				';
return $output220;
};

$output120 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments218, $renderChildrenClosure219, $renderingContext);

$output120 .= '
			';
return $output120;
};
$arguments118['__thenClosure'] = function() use ($renderingContext, $self) {
$output243 = '';

$output243 .= '
					<div class="news-img-wrap">
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments244 = array();
// Rendering Boolean node
$arguments244['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.mediaPreviews', $renderingContext));
$arguments244['then'] = NULL;
$arguments244['else'] = NULL;
$renderChildrenClosure245 = function() use ($renderingContext, $self) {
$output246 = '';

$output246 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments247 = array();
$renderChildrenClosure248 = function() use ($renderingContext, $self) {
$output249 = '';

$output249 .= '
								';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments250 = array();
$arguments250['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments250['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments250['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments250['additionalAttributes'] = NULL;
$arguments250['data'] = NULL;
$arguments250['uriOnly'] = false;
$arguments250['configuration'] = array (
);
$arguments250['content'] = '';
$arguments250['class'] = NULL;
$arguments250['dir'] = NULL;
$arguments250['id'] = NULL;
$arguments250['lang'] = NULL;
$arguments250['style'] = NULL;
$arguments250['accesskey'] = NULL;
$arguments250['tabindex'] = NULL;
$arguments250['onclick'] = NULL;
$arguments250['target'] = NULL;
$arguments250['rel'] = NULL;
$renderChildrenClosure251 = function() use ($renderingContext, $self) {
$output252 = '';

$output252 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper
$arguments253 = array();
// Rendering Array
$array254 = array();
$array254['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.mediaPreviews.0', $renderingContext);
$arguments253['map'] = $array254;
$renderChildrenClosure255 = function() use ($renderingContext, $self) {
$output256 = '';

$output256 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments257 = array();
// Rendering Boolean node
$arguments257['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 0);
$arguments257['then'] = NULL;
$arguments257['else'] = NULL;
$renderChildrenClosure258 = function() use ($renderingContext, $self) {
$output259 = '';

$output259 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments260 = array();
$output261 = '';

$output261 .= 'uploads/tx_news/';

$output261 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.image', $renderingContext);
$arguments260['src'] = $output261;
$arguments260['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.title', $renderingContext);
$arguments260['alt'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.alt', $renderingContext);
$arguments260['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments260['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments260['additionalAttributes'] = NULL;
$arguments260['data'] = NULL;
$arguments260['width'] = NULL;
$arguments260['height'] = NULL;
$arguments260['minWidth'] = NULL;
$arguments260['minHeight'] = NULL;
$arguments260['treatIdAsReference'] = false;
$arguments260['image'] = NULL;
$arguments260['crop'] = NULL;
$arguments260['class'] = NULL;
$arguments260['dir'] = NULL;
$arguments260['id'] = NULL;
$arguments260['lang'] = NULL;
$arguments260['style'] = NULL;
$arguments260['accesskey'] = NULL;
$arguments260['tabindex'] = NULL;
$arguments260['onclick'] = NULL;
$arguments260['ismap'] = NULL;
$arguments260['longdesc'] = NULL;
$arguments260['usemap'] = NULL;
$renderChildrenClosure262 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper263 = $self->getViewHelper('$viewHelper263', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper263->setArguments($arguments260);
$viewHelper263->setRenderingContext($renderingContext);
$viewHelper263->setRenderChildrenClosure($renderChildrenClosure262);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output259 .= $viewHelper263->initializeArgumentsAndRender();

$output259 .= '
										';
return $output259;
};
$viewHelper264 = $self->getViewHelper('$viewHelper264', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper264->setArguments($arguments257);
$viewHelper264->setRenderingContext($renderingContext);
$viewHelper264->setRenderChildrenClosure($renderChildrenClosure258);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output256 .= $viewHelper264->initializeArgumentsAndRender();

$output256 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments265 = array();
// Rendering Boolean node
$arguments265['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 1);
$arguments265['then'] = NULL;
$arguments265['else'] = NULL;
$renderChildrenClosure266 = function() use ($renderingContext, $self) {
$output267 = '';

$output267 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments268 = array();
$arguments268['partial'] = 'Detail/MediaVideo';
// Rendering Array
$array269 = array();
$array269['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement', $renderingContext);
$arguments268['arguments'] = $array269;
$arguments268['section'] = NULL;
$arguments268['optional'] = false;
$renderChildrenClosure270 = function() use ($renderingContext, $self) {
return NULL;
};

$output267 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments268, $renderChildrenClosure270, $renderingContext);

$output267 .= '
										';
return $output267;
};
$viewHelper271 = $self->getViewHelper('$viewHelper271', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper271->setArguments($arguments265);
$viewHelper271->setRenderingContext($renderingContext);
$viewHelper271->setRenderChildrenClosure($renderChildrenClosure266);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output256 .= $viewHelper271->initializeArgumentsAndRender();

$output256 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments272 = array();
// Rendering Boolean node
$arguments272['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 2);
$arguments272['then'] = NULL;
$arguments272['else'] = NULL;
$renderChildrenClosure273 = function() use ($renderingContext, $self) {
$output274 = '';

$output274 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments275 = array();
$arguments275['partial'] = 'Detail/MediaHtml';
// Rendering Array
$array276 = array();
$array276['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement', $renderingContext);
$arguments275['arguments'] = $array276;
$arguments275['section'] = NULL;
$arguments275['optional'] = false;
$renderChildrenClosure277 = function() use ($renderingContext, $self) {
return NULL;
};

$output274 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments275, $renderChildrenClosure277, $renderingContext);

$output274 .= '
										';
return $output274;
};
$viewHelper278 = $self->getViewHelper('$viewHelper278', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper278->setArguments($arguments272);
$viewHelper278->setRenderingContext($renderingContext);
$viewHelper278->setRenderChildrenClosure($renderChildrenClosure273);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output256 .= $viewHelper278->initializeArgumentsAndRender();

$output256 .= '
									';
return $output256;
};

$output252 .= TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper::renderStatic($arguments253, $renderChildrenClosure255, $renderingContext);

$output252 .= '
								';
return $output252;
};
$viewHelper279 = $self->getViewHelper('$viewHelper279', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper279->setArguments($arguments250);
$viewHelper279->setRenderingContext($renderingContext);
$viewHelper279->setRenderChildrenClosure($renderChildrenClosure251);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output249 .= $viewHelper279->initializeArgumentsAndRender();

$output249 .= '
							';
return $output249;
};

$output246 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments247, $renderChildrenClosure248, $renderingContext);

$output246 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments280 = array();
$renderChildrenClosure281 = function() use ($renderingContext, $self) {
$output282 = '';

$output282 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments283 = array();
// Rendering Boolean node
$arguments283['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.displayDummyIfNoMedia', $renderingContext));
$arguments283['then'] = NULL;
$arguments283['else'] = NULL;
$renderChildrenClosure284 = function() use ($renderingContext, $self) {
$output285 = '';

$output285 .= '
									<span class="no-media-element">
										';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments286 = array();
$arguments286['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments286['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments286['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments286['additionalAttributes'] = NULL;
$arguments286['data'] = NULL;
$arguments286['uriOnly'] = false;
$arguments286['configuration'] = array (
);
$arguments286['content'] = '';
$arguments286['class'] = NULL;
$arguments286['dir'] = NULL;
$arguments286['id'] = NULL;
$arguments286['lang'] = NULL;
$arguments286['style'] = NULL;
$arguments286['accesskey'] = NULL;
$arguments286['tabindex'] = NULL;
$arguments286['onclick'] = NULL;
$arguments286['target'] = NULL;
$arguments286['rel'] = NULL;
$renderChildrenClosure287 = function() use ($renderingContext, $self) {
$output288 = '';

$output288 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments289 = array();
$arguments289['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.dummyImage', $renderingContext);
$arguments289['title'] = '';
$arguments289['alt'] = '';
$arguments289['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments289['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments289['additionalAttributes'] = NULL;
$arguments289['data'] = NULL;
$arguments289['width'] = NULL;
$arguments289['height'] = NULL;
$arguments289['minWidth'] = NULL;
$arguments289['minHeight'] = NULL;
$arguments289['treatIdAsReference'] = false;
$arguments289['image'] = NULL;
$arguments289['crop'] = NULL;
$arguments289['class'] = NULL;
$arguments289['dir'] = NULL;
$arguments289['id'] = NULL;
$arguments289['lang'] = NULL;
$arguments289['style'] = NULL;
$arguments289['accesskey'] = NULL;
$arguments289['tabindex'] = NULL;
$arguments289['onclick'] = NULL;
$arguments289['ismap'] = NULL;
$arguments289['longdesc'] = NULL;
$arguments289['usemap'] = NULL;
$renderChildrenClosure290 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper291 = $self->getViewHelper('$viewHelper291', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper291->setArguments($arguments289);
$viewHelper291->setRenderingContext($renderingContext);
$viewHelper291->setRenderChildrenClosure($renderChildrenClosure290);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output288 .= $viewHelper291->initializeArgumentsAndRender();

$output288 .= '
										';
return $output288;
};
$viewHelper292 = $self->getViewHelper('$viewHelper292', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper292->setArguments($arguments286);
$viewHelper292->setRenderingContext($renderingContext);
$viewHelper292->setRenderChildrenClosure($renderChildrenClosure287);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output285 .= $viewHelper292->initializeArgumentsAndRender();

$output285 .= '
									</span>
								';
return $output285;
};
$viewHelper293 = $self->getViewHelper('$viewHelper293', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper293->setArguments($arguments283);
$viewHelper293->setRenderingContext($renderingContext);
$viewHelper293->setRenderChildrenClosure($renderChildrenClosure284);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output282 .= $viewHelper293->initializeArgumentsAndRender();

$output282 .= '
							';
return $output282;
};

$output246 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments280, $renderChildrenClosure281, $renderingContext);

$output246 .= '
						';
return $output246;
};
$arguments244['__thenClosure'] = function() use ($renderingContext, $self) {
$output294 = '';

$output294 .= '
								';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments295 = array();
$arguments295['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments295['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments295['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments295['additionalAttributes'] = NULL;
$arguments295['data'] = NULL;
$arguments295['uriOnly'] = false;
$arguments295['configuration'] = array (
);
$arguments295['content'] = '';
$arguments295['class'] = NULL;
$arguments295['dir'] = NULL;
$arguments295['id'] = NULL;
$arguments295['lang'] = NULL;
$arguments295['style'] = NULL;
$arguments295['accesskey'] = NULL;
$arguments295['tabindex'] = NULL;
$arguments295['onclick'] = NULL;
$arguments295['target'] = NULL;
$arguments295['rel'] = NULL;
$renderChildrenClosure296 = function() use ($renderingContext, $self) {
$output297 = '';

$output297 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper
$arguments298 = array();
// Rendering Array
$array299 = array();
$array299['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.mediaPreviews.0', $renderingContext);
$arguments298['map'] = $array299;
$renderChildrenClosure300 = function() use ($renderingContext, $self) {
$output301 = '';

$output301 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments302 = array();
// Rendering Boolean node
$arguments302['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 0);
$arguments302['then'] = NULL;
$arguments302['else'] = NULL;
$renderChildrenClosure303 = function() use ($renderingContext, $self) {
$output304 = '';

$output304 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments305 = array();
$output306 = '';

$output306 .= 'uploads/tx_news/';

$output306 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.image', $renderingContext);
$arguments305['src'] = $output306;
$arguments305['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.title', $renderingContext);
$arguments305['alt'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.alt', $renderingContext);
$arguments305['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments305['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments305['additionalAttributes'] = NULL;
$arguments305['data'] = NULL;
$arguments305['width'] = NULL;
$arguments305['height'] = NULL;
$arguments305['minWidth'] = NULL;
$arguments305['minHeight'] = NULL;
$arguments305['treatIdAsReference'] = false;
$arguments305['image'] = NULL;
$arguments305['crop'] = NULL;
$arguments305['class'] = NULL;
$arguments305['dir'] = NULL;
$arguments305['id'] = NULL;
$arguments305['lang'] = NULL;
$arguments305['style'] = NULL;
$arguments305['accesskey'] = NULL;
$arguments305['tabindex'] = NULL;
$arguments305['onclick'] = NULL;
$arguments305['ismap'] = NULL;
$arguments305['longdesc'] = NULL;
$arguments305['usemap'] = NULL;
$renderChildrenClosure307 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper308 = $self->getViewHelper('$viewHelper308', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper308->setArguments($arguments305);
$viewHelper308->setRenderingContext($renderingContext);
$viewHelper308->setRenderChildrenClosure($renderChildrenClosure307);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output304 .= $viewHelper308->initializeArgumentsAndRender();

$output304 .= '
										';
return $output304;
};
$viewHelper309 = $self->getViewHelper('$viewHelper309', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper309->setArguments($arguments302);
$viewHelper309->setRenderingContext($renderingContext);
$viewHelper309->setRenderChildrenClosure($renderChildrenClosure303);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output301 .= $viewHelper309->initializeArgumentsAndRender();

$output301 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments310 = array();
// Rendering Boolean node
$arguments310['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 1);
$arguments310['then'] = NULL;
$arguments310['else'] = NULL;
$renderChildrenClosure311 = function() use ($renderingContext, $self) {
$output312 = '';

$output312 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments313 = array();
$arguments313['partial'] = 'Detail/MediaVideo';
// Rendering Array
$array314 = array();
$array314['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement', $renderingContext);
$arguments313['arguments'] = $array314;
$arguments313['section'] = NULL;
$arguments313['optional'] = false;
$renderChildrenClosure315 = function() use ($renderingContext, $self) {
return NULL;
};

$output312 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments313, $renderChildrenClosure315, $renderingContext);

$output312 .= '
										';
return $output312;
};
$viewHelper316 = $self->getViewHelper('$viewHelper316', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper316->setArguments($arguments310);
$viewHelper316->setRenderingContext($renderingContext);
$viewHelper316->setRenderChildrenClosure($renderChildrenClosure311);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output301 .= $viewHelper316->initializeArgumentsAndRender();

$output301 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments317 = array();
// Rendering Boolean node
$arguments317['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 2);
$arguments317['then'] = NULL;
$arguments317['else'] = NULL;
$renderChildrenClosure318 = function() use ($renderingContext, $self) {
$output319 = '';

$output319 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments320 = array();
$arguments320['partial'] = 'Detail/MediaHtml';
// Rendering Array
$array321 = array();
$array321['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement', $renderingContext);
$arguments320['arguments'] = $array321;
$arguments320['section'] = NULL;
$arguments320['optional'] = false;
$renderChildrenClosure322 = function() use ($renderingContext, $self) {
return NULL;
};

$output319 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments320, $renderChildrenClosure322, $renderingContext);

$output319 .= '
										';
return $output319;
};
$viewHelper323 = $self->getViewHelper('$viewHelper323', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper323->setArguments($arguments317);
$viewHelper323->setRenderingContext($renderingContext);
$viewHelper323->setRenderChildrenClosure($renderChildrenClosure318);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output301 .= $viewHelper323->initializeArgumentsAndRender();

$output301 .= '
									';
return $output301;
};

$output297 .= TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper::renderStatic($arguments298, $renderChildrenClosure300, $renderingContext);

$output297 .= '
								';
return $output297;
};
$viewHelper324 = $self->getViewHelper('$viewHelper324', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper324->setArguments($arguments295);
$viewHelper324->setRenderingContext($renderingContext);
$viewHelper324->setRenderChildrenClosure($renderChildrenClosure296);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output294 .= $viewHelper324->initializeArgumentsAndRender();

$output294 .= '
							';
return $output294;
};
$arguments244['__elseClosure'] = function() use ($renderingContext, $self) {
$output325 = '';

$output325 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments326 = array();
// Rendering Boolean node
$arguments326['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.displayDummyIfNoMedia', $renderingContext));
$arguments326['then'] = NULL;
$arguments326['else'] = NULL;
$renderChildrenClosure327 = function() use ($renderingContext, $self) {
$output328 = '';

$output328 .= '
									<span class="no-media-element">
										';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments329 = array();
$arguments329['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments329['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments329['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments329['additionalAttributes'] = NULL;
$arguments329['data'] = NULL;
$arguments329['uriOnly'] = false;
$arguments329['configuration'] = array (
);
$arguments329['content'] = '';
$arguments329['class'] = NULL;
$arguments329['dir'] = NULL;
$arguments329['id'] = NULL;
$arguments329['lang'] = NULL;
$arguments329['style'] = NULL;
$arguments329['accesskey'] = NULL;
$arguments329['tabindex'] = NULL;
$arguments329['onclick'] = NULL;
$arguments329['target'] = NULL;
$arguments329['rel'] = NULL;
$renderChildrenClosure330 = function() use ($renderingContext, $self) {
$output331 = '';

$output331 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments332 = array();
$arguments332['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.dummyImage', $renderingContext);
$arguments332['title'] = '';
$arguments332['alt'] = '';
$arguments332['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments332['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments332['additionalAttributes'] = NULL;
$arguments332['data'] = NULL;
$arguments332['width'] = NULL;
$arguments332['height'] = NULL;
$arguments332['minWidth'] = NULL;
$arguments332['minHeight'] = NULL;
$arguments332['treatIdAsReference'] = false;
$arguments332['image'] = NULL;
$arguments332['crop'] = NULL;
$arguments332['class'] = NULL;
$arguments332['dir'] = NULL;
$arguments332['id'] = NULL;
$arguments332['lang'] = NULL;
$arguments332['style'] = NULL;
$arguments332['accesskey'] = NULL;
$arguments332['tabindex'] = NULL;
$arguments332['onclick'] = NULL;
$arguments332['ismap'] = NULL;
$arguments332['longdesc'] = NULL;
$arguments332['usemap'] = NULL;
$renderChildrenClosure333 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper334 = $self->getViewHelper('$viewHelper334', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper334->setArguments($arguments332);
$viewHelper334->setRenderingContext($renderingContext);
$viewHelper334->setRenderChildrenClosure($renderChildrenClosure333);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output331 .= $viewHelper334->initializeArgumentsAndRender();

$output331 .= '
										';
return $output331;
};
$viewHelper335 = $self->getViewHelper('$viewHelper335', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper335->setArguments($arguments329);
$viewHelper335->setRenderingContext($renderingContext);
$viewHelper335->setRenderChildrenClosure($renderChildrenClosure330);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output328 .= $viewHelper335->initializeArgumentsAndRender();

$output328 .= '
									</span>
								';
return $output328;
};
$viewHelper336 = $self->getViewHelper('$viewHelper336', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper336->setArguments($arguments326);
$viewHelper336->setRenderingContext($renderingContext);
$viewHelper336->setRenderChildrenClosure($renderChildrenClosure327);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output325 .= $viewHelper336->initializeArgumentsAndRender();

$output325 .= '
							';
return $output325;
};
$viewHelper337 = $self->getViewHelper('$viewHelper337', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper337->setArguments($arguments244);
$viewHelper337->setRenderingContext($renderingContext);
$viewHelper337->setRenderChildrenClosure($renderChildrenClosure245);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output243 .= $viewHelper337->initializeArgumentsAndRender();

$output243 .= '

					</div>
				';
return $output243;
};
$arguments118['__elseClosure'] = function() use ($renderingContext, $self) {
$output338 = '';

$output338 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments339 = array();
// Rendering Boolean node
$arguments339['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.displayDummyIfNoMedia', $renderingContext));
$arguments339['then'] = NULL;
$arguments339['else'] = NULL;
$renderChildrenClosure340 = function() use ($renderingContext, $self) {
$output341 = '';

$output341 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments342 = array();
$renderChildrenClosure343 = function() use ($renderingContext, $self) {
$output344 = '';

$output344 .= '
							<div class="news-img-wrap">
								';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments345 = array();
$arguments345['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments345['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments345['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments345['additionalAttributes'] = NULL;
$arguments345['data'] = NULL;
$arguments345['uriOnly'] = false;
$arguments345['configuration'] = array (
);
$arguments345['content'] = '';
$arguments345['class'] = NULL;
$arguments345['dir'] = NULL;
$arguments345['id'] = NULL;
$arguments345['lang'] = NULL;
$arguments345['style'] = NULL;
$arguments345['accesskey'] = NULL;
$arguments345['tabindex'] = NULL;
$arguments345['onclick'] = NULL;
$arguments345['target'] = NULL;
$arguments345['rel'] = NULL;
$renderChildrenClosure346 = function() use ($renderingContext, $self) {
$output347 = '';

$output347 .= '
									<span class="no-media-element">
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments348 = array();
$arguments348['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.dummyImage', $renderingContext);
$arguments348['title'] = '';
$arguments348['alt'] = '';
$arguments348['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments348['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments348['additionalAttributes'] = NULL;
$arguments348['data'] = NULL;
$arguments348['width'] = NULL;
$arguments348['height'] = NULL;
$arguments348['minWidth'] = NULL;
$arguments348['minHeight'] = NULL;
$arguments348['treatIdAsReference'] = false;
$arguments348['image'] = NULL;
$arguments348['crop'] = NULL;
$arguments348['class'] = NULL;
$arguments348['dir'] = NULL;
$arguments348['id'] = NULL;
$arguments348['lang'] = NULL;
$arguments348['style'] = NULL;
$arguments348['accesskey'] = NULL;
$arguments348['tabindex'] = NULL;
$arguments348['onclick'] = NULL;
$arguments348['ismap'] = NULL;
$arguments348['longdesc'] = NULL;
$arguments348['usemap'] = NULL;
$renderChildrenClosure349 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper350 = $self->getViewHelper('$viewHelper350', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper350->setArguments($arguments348);
$viewHelper350->setRenderingContext($renderingContext);
$viewHelper350->setRenderChildrenClosure($renderChildrenClosure349);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output347 .= $viewHelper350->initializeArgumentsAndRender();

$output347 .= '
									</span>
								';
return $output347;
};
$viewHelper351 = $self->getViewHelper('$viewHelper351', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper351->setArguments($arguments345);
$viewHelper351->setRenderingContext($renderingContext);
$viewHelper351->setRenderChildrenClosure($renderChildrenClosure346);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output344 .= $viewHelper351->initializeArgumentsAndRender();

$output344 .= '
							</div>
						';
return $output344;
};

$output341 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments342, $renderChildrenClosure343, $renderingContext);

$output341 .= '
					';
return $output341;
};
$arguments339['__thenClosure'] = function() use ($renderingContext, $self) {
$output352 = '';

$output352 .= '
							<div class="news-img-wrap">
								';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments353 = array();
$arguments353['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments353['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments353['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments353['additionalAttributes'] = NULL;
$arguments353['data'] = NULL;
$arguments353['uriOnly'] = false;
$arguments353['configuration'] = array (
);
$arguments353['content'] = '';
$arguments353['class'] = NULL;
$arguments353['dir'] = NULL;
$arguments353['id'] = NULL;
$arguments353['lang'] = NULL;
$arguments353['style'] = NULL;
$arguments353['accesskey'] = NULL;
$arguments353['tabindex'] = NULL;
$arguments353['onclick'] = NULL;
$arguments353['target'] = NULL;
$arguments353['rel'] = NULL;
$renderChildrenClosure354 = function() use ($renderingContext, $self) {
$output355 = '';

$output355 .= '
									<span class="no-media-element">
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments356 = array();
$arguments356['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.dummyImage', $renderingContext);
$arguments356['title'] = '';
$arguments356['alt'] = '';
$arguments356['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments356['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments356['additionalAttributes'] = NULL;
$arguments356['data'] = NULL;
$arguments356['width'] = NULL;
$arguments356['height'] = NULL;
$arguments356['minWidth'] = NULL;
$arguments356['minHeight'] = NULL;
$arguments356['treatIdAsReference'] = false;
$arguments356['image'] = NULL;
$arguments356['crop'] = NULL;
$arguments356['class'] = NULL;
$arguments356['dir'] = NULL;
$arguments356['id'] = NULL;
$arguments356['lang'] = NULL;
$arguments356['style'] = NULL;
$arguments356['accesskey'] = NULL;
$arguments356['tabindex'] = NULL;
$arguments356['onclick'] = NULL;
$arguments356['ismap'] = NULL;
$arguments356['longdesc'] = NULL;
$arguments356['usemap'] = NULL;
$renderChildrenClosure357 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper358 = $self->getViewHelper('$viewHelper358', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper358->setArguments($arguments356);
$viewHelper358->setRenderingContext($renderingContext);
$viewHelper358->setRenderChildrenClosure($renderChildrenClosure357);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output355 .= $viewHelper358->initializeArgumentsAndRender();

$output355 .= '
									</span>
								';
return $output355;
};
$viewHelper359 = $self->getViewHelper('$viewHelper359', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper359->setArguments($arguments353);
$viewHelper359->setRenderingContext($renderingContext);
$viewHelper359->setRenderChildrenClosure($renderChildrenClosure354);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output352 .= $viewHelper359->initializeArgumentsAndRender();

$output352 .= '
							</div>
						';
return $output352;
};
$viewHelper360 = $self->getViewHelper('$viewHelper360', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper360->setArguments($arguments339);
$viewHelper360->setRenderingContext($renderingContext);
$viewHelper360->setRenderChildrenClosure($renderChildrenClosure340);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output338 .= $viewHelper360->initializeArgumentsAndRender();

$output338 .= '
				';
return $output338;
};
$viewHelper361 = $self->getViewHelper('$viewHelper361', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper361->setArguments($arguments118);
$viewHelper361->setRenderingContext($renderingContext);
$viewHelper361->setRenderChildrenClosure($renderChildrenClosure119);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output117 .= $viewHelper361->initializeArgumentsAndRender();

$output117 .= '

		';
return $output117;
};

$output19 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments115, $renderChildrenClosure116, $renderingContext);

$output19 .= '
	';
return $output19;
};
$arguments17['__thenClosure'] = function() use ($renderingContext, $self) {
$output362 = '';

$output362 .= '
			<div class="news-img-wrap">
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments363 = array();
// Rendering Boolean node
$arguments363['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.falMediaPreviews', $renderingContext));
$arguments363['then'] = NULL;
$arguments363['else'] = NULL;
$renderChildrenClosure364 = function() use ($renderingContext, $self) {
$output365 = '';

$output365 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments366 = array();
$renderChildrenClosure367 = function() use ($renderingContext, $self) {
$output368 = '';

$output368 .= '
						';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments369 = array();
$arguments369['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments369['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments369['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments369['additionalAttributes'] = NULL;
$arguments369['data'] = NULL;
$arguments369['uriOnly'] = false;
$arguments369['configuration'] = array (
);
$arguments369['content'] = '';
$arguments369['class'] = NULL;
$arguments369['dir'] = NULL;
$arguments369['id'] = NULL;
$arguments369['lang'] = NULL;
$arguments369['style'] = NULL;
$arguments369['accesskey'] = NULL;
$arguments369['tabindex'] = NULL;
$arguments369['onclick'] = NULL;
$arguments369['target'] = NULL;
$arguments369['rel'] = NULL;
$renderChildrenClosure370 = function() use ($renderingContext, $self) {
$output371 = '';

$output371 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper
$arguments372 = array();
// Rendering Array
$array373 = array();
$array373['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.falMediaPreviews.0', $renderingContext);
$arguments372['map'] = $array373;
$renderChildrenClosure374 = function() use ($renderingContext, $self) {
$output375 = '';

$output375 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments376 = array();
// Rendering Boolean node
$arguments376['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.type', $renderingContext), 2);
$arguments376['then'] = NULL;
$arguments376['else'] = NULL;
$renderChildrenClosure377 = function() use ($renderingContext, $self) {
$output378 = '';

$output378 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments379 = array();
$arguments379['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.uid', $renderingContext);
// Rendering Boolean node
$arguments379['treatIdAsReference'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('1');
$arguments379['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.title', $renderingContext);
$arguments379['alt'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.alternative', $renderingContext);
$arguments379['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments379['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments379['additionalAttributes'] = NULL;
$arguments379['data'] = NULL;
$arguments379['width'] = NULL;
$arguments379['height'] = NULL;
$arguments379['minWidth'] = NULL;
$arguments379['minHeight'] = NULL;
$arguments379['image'] = NULL;
$arguments379['crop'] = NULL;
$arguments379['class'] = NULL;
$arguments379['dir'] = NULL;
$arguments379['id'] = NULL;
$arguments379['lang'] = NULL;
$arguments379['style'] = NULL;
$arguments379['accesskey'] = NULL;
$arguments379['tabindex'] = NULL;
$arguments379['onclick'] = NULL;
$arguments379['ismap'] = NULL;
$arguments379['longdesc'] = NULL;
$arguments379['usemap'] = NULL;
$renderChildrenClosure380 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper381 = $self->getViewHelper('$viewHelper381', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper381->setArguments($arguments379);
$viewHelper381->setRenderingContext($renderingContext);
$viewHelper381->setRenderChildrenClosure($renderChildrenClosure380);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output378 .= $viewHelper381->initializeArgumentsAndRender();

$output378 .= '
								';
return $output378;
};
$viewHelper382 = $self->getViewHelper('$viewHelper382', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper382->setArguments($arguments376);
$viewHelper382->setRenderingContext($renderingContext);
$viewHelper382->setRenderChildrenClosure($renderChildrenClosure377);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output375 .= $viewHelper382->initializeArgumentsAndRender();

$output375 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments383 = array();
// Rendering Boolean node
$arguments383['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.type', $renderingContext), 4);
$arguments383['then'] = NULL;
$arguments383['else'] = NULL;
$renderChildrenClosure384 = function() use ($renderingContext, $self) {
$output385 = '';

$output385 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments386 = array();
$arguments386['partial'] = 'Detail/FalMediaVideo';
// Rendering Array
$array387 = array();
$array387['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement', $renderingContext);
$arguments386['arguments'] = $array387;
$arguments386['section'] = NULL;
$arguments386['optional'] = false;
$renderChildrenClosure388 = function() use ($renderingContext, $self) {
return NULL;
};

$output385 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments386, $renderChildrenClosure388, $renderingContext);

$output385 .= '
								';
return $output385;
};
$viewHelper389 = $self->getViewHelper('$viewHelper389', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper389->setArguments($arguments383);
$viewHelper389->setRenderingContext($renderingContext);
$viewHelper389->setRenderChildrenClosure($renderChildrenClosure384);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output375 .= $viewHelper389->initializeArgumentsAndRender();

$output375 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments390 = array();
// Rendering Boolean node
$arguments390['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.type', $renderingContext), 5);
$arguments390['then'] = NULL;
$arguments390['else'] = NULL;
$renderChildrenClosure391 = function() use ($renderingContext, $self) {
$output392 = '';

$output392 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments393 = array();
$arguments393['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.uid', $renderingContext);
// Rendering Boolean node
$arguments393['treatIdAsReference'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('1');
$arguments393['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.title', $renderingContext);
$arguments393['alt'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.alternative', $renderingContext);
$arguments393['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments393['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments393['additionalAttributes'] = NULL;
$arguments393['data'] = NULL;
$arguments393['width'] = NULL;
$arguments393['height'] = NULL;
$arguments393['minWidth'] = NULL;
$arguments393['minHeight'] = NULL;
$arguments393['image'] = NULL;
$arguments393['crop'] = NULL;
$arguments393['class'] = NULL;
$arguments393['dir'] = NULL;
$arguments393['id'] = NULL;
$arguments393['lang'] = NULL;
$arguments393['style'] = NULL;
$arguments393['accesskey'] = NULL;
$arguments393['tabindex'] = NULL;
$arguments393['onclick'] = NULL;
$arguments393['ismap'] = NULL;
$arguments393['longdesc'] = NULL;
$arguments393['usemap'] = NULL;
$renderChildrenClosure394 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper395 = $self->getViewHelper('$viewHelper395', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper395->setArguments($arguments393);
$viewHelper395->setRenderingContext($renderingContext);
$viewHelper395->setRenderChildrenClosure($renderChildrenClosure394);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output392 .= $viewHelper395->initializeArgumentsAndRender();

$output392 .= '
								';
return $output392;
};
$viewHelper396 = $self->getViewHelper('$viewHelper396', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper396->setArguments($arguments390);
$viewHelper396->setRenderingContext($renderingContext);
$viewHelper396->setRenderChildrenClosure($renderChildrenClosure391);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output375 .= $viewHelper396->initializeArgumentsAndRender();

$output375 .= '
							';
return $output375;
};

$output371 .= TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper::renderStatic($arguments372, $renderChildrenClosure374, $renderingContext);

$output371 .= '
						';
return $output371;
};
$viewHelper397 = $self->getViewHelper('$viewHelper397', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper397->setArguments($arguments369);
$viewHelper397->setRenderingContext($renderingContext);
$viewHelper397->setRenderChildrenClosure($renderChildrenClosure370);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output368 .= $viewHelper397->initializeArgumentsAndRender();

$output368 .= '
					';
return $output368;
};

$output365 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments366, $renderChildrenClosure367, $renderingContext);

$output365 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments398 = array();
$renderChildrenClosure399 = function() use ($renderingContext, $self) {
$output400 = '';

$output400 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments401 = array();
// Rendering Boolean node
$arguments401['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.displayDummyIfNoMedia', $renderingContext));
$arguments401['then'] = NULL;
$arguments401['else'] = NULL;
$renderChildrenClosure402 = function() use ($renderingContext, $self) {
$output403 = '';

$output403 .= '
							<span class="no-media-element">
								';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments404 = array();
$arguments404['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments404['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments404['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments404['additionalAttributes'] = NULL;
$arguments404['data'] = NULL;
$arguments404['uriOnly'] = false;
$arguments404['configuration'] = array (
);
$arguments404['content'] = '';
$arguments404['class'] = NULL;
$arguments404['dir'] = NULL;
$arguments404['id'] = NULL;
$arguments404['lang'] = NULL;
$arguments404['style'] = NULL;
$arguments404['accesskey'] = NULL;
$arguments404['tabindex'] = NULL;
$arguments404['onclick'] = NULL;
$arguments404['target'] = NULL;
$arguments404['rel'] = NULL;
$renderChildrenClosure405 = function() use ($renderingContext, $self) {
$output406 = '';

$output406 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments407 = array();
$arguments407['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.dummyImage', $renderingContext);
$arguments407['title'] = '';
$arguments407['alt'] = '';
$arguments407['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments407['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments407['additionalAttributes'] = NULL;
$arguments407['data'] = NULL;
$arguments407['width'] = NULL;
$arguments407['height'] = NULL;
$arguments407['minWidth'] = NULL;
$arguments407['minHeight'] = NULL;
$arguments407['treatIdAsReference'] = false;
$arguments407['image'] = NULL;
$arguments407['crop'] = NULL;
$arguments407['class'] = NULL;
$arguments407['dir'] = NULL;
$arguments407['id'] = NULL;
$arguments407['lang'] = NULL;
$arguments407['style'] = NULL;
$arguments407['accesskey'] = NULL;
$arguments407['tabindex'] = NULL;
$arguments407['onclick'] = NULL;
$arguments407['ismap'] = NULL;
$arguments407['longdesc'] = NULL;
$arguments407['usemap'] = NULL;
$renderChildrenClosure408 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper409 = $self->getViewHelper('$viewHelper409', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper409->setArguments($arguments407);
$viewHelper409->setRenderingContext($renderingContext);
$viewHelper409->setRenderChildrenClosure($renderChildrenClosure408);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output406 .= $viewHelper409->initializeArgumentsAndRender();

$output406 .= '
								';
return $output406;
};
$viewHelper410 = $self->getViewHelper('$viewHelper410', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper410->setArguments($arguments404);
$viewHelper410->setRenderingContext($renderingContext);
$viewHelper410->setRenderChildrenClosure($renderChildrenClosure405);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output403 .= $viewHelper410->initializeArgumentsAndRender();

$output403 .= '
							</span>
						';
return $output403;
};
$viewHelper411 = $self->getViewHelper('$viewHelper411', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper411->setArguments($arguments401);
$viewHelper411->setRenderingContext($renderingContext);
$viewHelper411->setRenderChildrenClosure($renderChildrenClosure402);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output400 .= $viewHelper411->initializeArgumentsAndRender();

$output400 .= '
					';
return $output400;
};

$output365 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments398, $renderChildrenClosure399, $renderingContext);

$output365 .= '
				';
return $output365;
};
$arguments363['__thenClosure'] = function() use ($renderingContext, $self) {
$output412 = '';

$output412 .= '
						';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments413 = array();
$arguments413['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments413['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments413['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments413['additionalAttributes'] = NULL;
$arguments413['data'] = NULL;
$arguments413['uriOnly'] = false;
$arguments413['configuration'] = array (
);
$arguments413['content'] = '';
$arguments413['class'] = NULL;
$arguments413['dir'] = NULL;
$arguments413['id'] = NULL;
$arguments413['lang'] = NULL;
$arguments413['style'] = NULL;
$arguments413['accesskey'] = NULL;
$arguments413['tabindex'] = NULL;
$arguments413['onclick'] = NULL;
$arguments413['target'] = NULL;
$arguments413['rel'] = NULL;
$renderChildrenClosure414 = function() use ($renderingContext, $self) {
$output415 = '';

$output415 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper
$arguments416 = array();
// Rendering Array
$array417 = array();
$array417['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.falMediaPreviews.0', $renderingContext);
$arguments416['map'] = $array417;
$renderChildrenClosure418 = function() use ($renderingContext, $self) {
$output419 = '';

$output419 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments420 = array();
// Rendering Boolean node
$arguments420['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.type', $renderingContext), 2);
$arguments420['then'] = NULL;
$arguments420['else'] = NULL;
$renderChildrenClosure421 = function() use ($renderingContext, $self) {
$output422 = '';

$output422 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments423 = array();
$arguments423['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.uid', $renderingContext);
// Rendering Boolean node
$arguments423['treatIdAsReference'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('1');
$arguments423['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.title', $renderingContext);
$arguments423['alt'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.alternative', $renderingContext);
$arguments423['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments423['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments423['additionalAttributes'] = NULL;
$arguments423['data'] = NULL;
$arguments423['width'] = NULL;
$arguments423['height'] = NULL;
$arguments423['minWidth'] = NULL;
$arguments423['minHeight'] = NULL;
$arguments423['image'] = NULL;
$arguments423['crop'] = NULL;
$arguments423['class'] = NULL;
$arguments423['dir'] = NULL;
$arguments423['id'] = NULL;
$arguments423['lang'] = NULL;
$arguments423['style'] = NULL;
$arguments423['accesskey'] = NULL;
$arguments423['tabindex'] = NULL;
$arguments423['onclick'] = NULL;
$arguments423['ismap'] = NULL;
$arguments423['longdesc'] = NULL;
$arguments423['usemap'] = NULL;
$renderChildrenClosure424 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper425 = $self->getViewHelper('$viewHelper425', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper425->setArguments($arguments423);
$viewHelper425->setRenderingContext($renderingContext);
$viewHelper425->setRenderChildrenClosure($renderChildrenClosure424);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output422 .= $viewHelper425->initializeArgumentsAndRender();

$output422 .= '
								';
return $output422;
};
$viewHelper426 = $self->getViewHelper('$viewHelper426', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper426->setArguments($arguments420);
$viewHelper426->setRenderingContext($renderingContext);
$viewHelper426->setRenderChildrenClosure($renderChildrenClosure421);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output419 .= $viewHelper426->initializeArgumentsAndRender();

$output419 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments427 = array();
// Rendering Boolean node
$arguments427['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.type', $renderingContext), 4);
$arguments427['then'] = NULL;
$arguments427['else'] = NULL;
$renderChildrenClosure428 = function() use ($renderingContext, $self) {
$output429 = '';

$output429 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments430 = array();
$arguments430['partial'] = 'Detail/FalMediaVideo';
// Rendering Array
$array431 = array();
$array431['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement', $renderingContext);
$arguments430['arguments'] = $array431;
$arguments430['section'] = NULL;
$arguments430['optional'] = false;
$renderChildrenClosure432 = function() use ($renderingContext, $self) {
return NULL;
};

$output429 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments430, $renderChildrenClosure432, $renderingContext);

$output429 .= '
								';
return $output429;
};
$viewHelper433 = $self->getViewHelper('$viewHelper433', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper433->setArguments($arguments427);
$viewHelper433->setRenderingContext($renderingContext);
$viewHelper433->setRenderChildrenClosure($renderChildrenClosure428);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output419 .= $viewHelper433->initializeArgumentsAndRender();

$output419 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments434 = array();
// Rendering Boolean node
$arguments434['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.type', $renderingContext), 5);
$arguments434['then'] = NULL;
$arguments434['else'] = NULL;
$renderChildrenClosure435 = function() use ($renderingContext, $self) {
$output436 = '';

$output436 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments437 = array();
$arguments437['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.uid', $renderingContext);
// Rendering Boolean node
$arguments437['treatIdAsReference'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('1');
$arguments437['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.title', $renderingContext);
$arguments437['alt'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.originalResource.alternative', $renderingContext);
$arguments437['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments437['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments437['additionalAttributes'] = NULL;
$arguments437['data'] = NULL;
$arguments437['width'] = NULL;
$arguments437['height'] = NULL;
$arguments437['minWidth'] = NULL;
$arguments437['minHeight'] = NULL;
$arguments437['image'] = NULL;
$arguments437['crop'] = NULL;
$arguments437['class'] = NULL;
$arguments437['dir'] = NULL;
$arguments437['id'] = NULL;
$arguments437['lang'] = NULL;
$arguments437['style'] = NULL;
$arguments437['accesskey'] = NULL;
$arguments437['tabindex'] = NULL;
$arguments437['onclick'] = NULL;
$arguments437['ismap'] = NULL;
$arguments437['longdesc'] = NULL;
$arguments437['usemap'] = NULL;
$renderChildrenClosure438 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper439 = $self->getViewHelper('$viewHelper439', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper439->setArguments($arguments437);
$viewHelper439->setRenderingContext($renderingContext);
$viewHelper439->setRenderChildrenClosure($renderChildrenClosure438);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output436 .= $viewHelper439->initializeArgumentsAndRender();

$output436 .= '
								';
return $output436;
};
$viewHelper440 = $self->getViewHelper('$viewHelper440', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper440->setArguments($arguments434);
$viewHelper440->setRenderingContext($renderingContext);
$viewHelper440->setRenderChildrenClosure($renderChildrenClosure435);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output419 .= $viewHelper440->initializeArgumentsAndRender();

$output419 .= '
							';
return $output419;
};

$output415 .= TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper::renderStatic($arguments416, $renderChildrenClosure418, $renderingContext);

$output415 .= '
						';
return $output415;
};
$viewHelper441 = $self->getViewHelper('$viewHelper441', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper441->setArguments($arguments413);
$viewHelper441->setRenderingContext($renderingContext);
$viewHelper441->setRenderChildrenClosure($renderChildrenClosure414);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output412 .= $viewHelper441->initializeArgumentsAndRender();

$output412 .= '
					';
return $output412;
};
$arguments363['__elseClosure'] = function() use ($renderingContext, $self) {
$output442 = '';

$output442 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments443 = array();
// Rendering Boolean node
$arguments443['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.displayDummyIfNoMedia', $renderingContext));
$arguments443['then'] = NULL;
$arguments443['else'] = NULL;
$renderChildrenClosure444 = function() use ($renderingContext, $self) {
$output445 = '';

$output445 .= '
							<span class="no-media-element">
								';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments446 = array();
$arguments446['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments446['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments446['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments446['additionalAttributes'] = NULL;
$arguments446['data'] = NULL;
$arguments446['uriOnly'] = false;
$arguments446['configuration'] = array (
);
$arguments446['content'] = '';
$arguments446['class'] = NULL;
$arguments446['dir'] = NULL;
$arguments446['id'] = NULL;
$arguments446['lang'] = NULL;
$arguments446['style'] = NULL;
$arguments446['accesskey'] = NULL;
$arguments446['tabindex'] = NULL;
$arguments446['onclick'] = NULL;
$arguments446['target'] = NULL;
$arguments446['rel'] = NULL;
$renderChildrenClosure447 = function() use ($renderingContext, $self) {
$output448 = '';

$output448 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments449 = array();
$arguments449['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.dummyImage', $renderingContext);
$arguments449['title'] = '';
$arguments449['alt'] = '';
$arguments449['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments449['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments449['additionalAttributes'] = NULL;
$arguments449['data'] = NULL;
$arguments449['width'] = NULL;
$arguments449['height'] = NULL;
$arguments449['minWidth'] = NULL;
$arguments449['minHeight'] = NULL;
$arguments449['treatIdAsReference'] = false;
$arguments449['image'] = NULL;
$arguments449['crop'] = NULL;
$arguments449['class'] = NULL;
$arguments449['dir'] = NULL;
$arguments449['id'] = NULL;
$arguments449['lang'] = NULL;
$arguments449['style'] = NULL;
$arguments449['accesskey'] = NULL;
$arguments449['tabindex'] = NULL;
$arguments449['onclick'] = NULL;
$arguments449['ismap'] = NULL;
$arguments449['longdesc'] = NULL;
$arguments449['usemap'] = NULL;
$renderChildrenClosure450 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper451 = $self->getViewHelper('$viewHelper451', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper451->setArguments($arguments449);
$viewHelper451->setRenderingContext($renderingContext);
$viewHelper451->setRenderChildrenClosure($renderChildrenClosure450);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output448 .= $viewHelper451->initializeArgumentsAndRender();

$output448 .= '
								';
return $output448;
};
$viewHelper452 = $self->getViewHelper('$viewHelper452', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper452->setArguments($arguments446);
$viewHelper452->setRenderingContext($renderingContext);
$viewHelper452->setRenderChildrenClosure($renderChildrenClosure447);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output445 .= $viewHelper452->initializeArgumentsAndRender();

$output445 .= '
							</span>
						';
return $output445;
};
$viewHelper453 = $self->getViewHelper('$viewHelper453', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper453->setArguments($arguments443);
$viewHelper453->setRenderingContext($renderingContext);
$viewHelper453->setRenderChildrenClosure($renderChildrenClosure444);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output442 .= $viewHelper453->initializeArgumentsAndRender();

$output442 .= '
					';
return $output442;
};
$viewHelper454 = $self->getViewHelper('$viewHelper454', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper454->setArguments($arguments363);
$viewHelper454->setRenderingContext($renderingContext);
$viewHelper454->setRenderChildrenClosure($renderChildrenClosure364);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output362 .= $viewHelper454->initializeArgumentsAndRender();

$output362 .= '

			</div>
		';
return $output362;
};
$arguments17['__elseClosure'] = function() use ($renderingContext, $self) {
$output455 = '';

$output455 .= '

			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments456 = array();
// Rendering Boolean node
$arguments456['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.media', $renderingContext));
$arguments456['then'] = NULL;
$arguments456['else'] = NULL;
$renderChildrenClosure457 = function() use ($renderingContext, $self) {
$output458 = '';

$output458 .= '
				<!-- media preview element -->
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments459 = array();
$renderChildrenClosure460 = function() use ($renderingContext, $self) {
$output461 = '';

$output461 .= '
					<div class="news-img-wrap">
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments462 = array();
// Rendering Boolean node
$arguments462['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.mediaPreviews', $renderingContext));
$arguments462['then'] = NULL;
$arguments462['else'] = NULL;
$renderChildrenClosure463 = function() use ($renderingContext, $self) {
$output464 = '';

$output464 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments465 = array();
$renderChildrenClosure466 = function() use ($renderingContext, $self) {
$output467 = '';

$output467 .= '
								';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments468 = array();
$arguments468['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments468['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments468['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments468['additionalAttributes'] = NULL;
$arguments468['data'] = NULL;
$arguments468['uriOnly'] = false;
$arguments468['configuration'] = array (
);
$arguments468['content'] = '';
$arguments468['class'] = NULL;
$arguments468['dir'] = NULL;
$arguments468['id'] = NULL;
$arguments468['lang'] = NULL;
$arguments468['style'] = NULL;
$arguments468['accesskey'] = NULL;
$arguments468['tabindex'] = NULL;
$arguments468['onclick'] = NULL;
$arguments468['target'] = NULL;
$arguments468['rel'] = NULL;
$renderChildrenClosure469 = function() use ($renderingContext, $self) {
$output470 = '';

$output470 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper
$arguments471 = array();
// Rendering Array
$array472 = array();
$array472['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.mediaPreviews.0', $renderingContext);
$arguments471['map'] = $array472;
$renderChildrenClosure473 = function() use ($renderingContext, $self) {
$output474 = '';

$output474 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments475 = array();
// Rendering Boolean node
$arguments475['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 0);
$arguments475['then'] = NULL;
$arguments475['else'] = NULL;
$renderChildrenClosure476 = function() use ($renderingContext, $self) {
$output477 = '';

$output477 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments478 = array();
$output479 = '';

$output479 .= 'uploads/tx_news/';

$output479 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.image', $renderingContext);
$arguments478['src'] = $output479;
$arguments478['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.title', $renderingContext);
$arguments478['alt'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.alt', $renderingContext);
$arguments478['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments478['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments478['additionalAttributes'] = NULL;
$arguments478['data'] = NULL;
$arguments478['width'] = NULL;
$arguments478['height'] = NULL;
$arguments478['minWidth'] = NULL;
$arguments478['minHeight'] = NULL;
$arguments478['treatIdAsReference'] = false;
$arguments478['image'] = NULL;
$arguments478['crop'] = NULL;
$arguments478['class'] = NULL;
$arguments478['dir'] = NULL;
$arguments478['id'] = NULL;
$arguments478['lang'] = NULL;
$arguments478['style'] = NULL;
$arguments478['accesskey'] = NULL;
$arguments478['tabindex'] = NULL;
$arguments478['onclick'] = NULL;
$arguments478['ismap'] = NULL;
$arguments478['longdesc'] = NULL;
$arguments478['usemap'] = NULL;
$renderChildrenClosure480 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper481 = $self->getViewHelper('$viewHelper481', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper481->setArguments($arguments478);
$viewHelper481->setRenderingContext($renderingContext);
$viewHelper481->setRenderChildrenClosure($renderChildrenClosure480);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output477 .= $viewHelper481->initializeArgumentsAndRender();

$output477 .= '
										';
return $output477;
};
$viewHelper482 = $self->getViewHelper('$viewHelper482', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper482->setArguments($arguments475);
$viewHelper482->setRenderingContext($renderingContext);
$viewHelper482->setRenderChildrenClosure($renderChildrenClosure476);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output474 .= $viewHelper482->initializeArgumentsAndRender();

$output474 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments483 = array();
// Rendering Boolean node
$arguments483['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 1);
$arguments483['then'] = NULL;
$arguments483['else'] = NULL;
$renderChildrenClosure484 = function() use ($renderingContext, $self) {
$output485 = '';

$output485 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments486 = array();
$arguments486['partial'] = 'Detail/MediaVideo';
// Rendering Array
$array487 = array();
$array487['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement', $renderingContext);
$arguments486['arguments'] = $array487;
$arguments486['section'] = NULL;
$arguments486['optional'] = false;
$renderChildrenClosure488 = function() use ($renderingContext, $self) {
return NULL;
};

$output485 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments486, $renderChildrenClosure488, $renderingContext);

$output485 .= '
										';
return $output485;
};
$viewHelper489 = $self->getViewHelper('$viewHelper489', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper489->setArguments($arguments483);
$viewHelper489->setRenderingContext($renderingContext);
$viewHelper489->setRenderChildrenClosure($renderChildrenClosure484);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output474 .= $viewHelper489->initializeArgumentsAndRender();

$output474 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments490 = array();
// Rendering Boolean node
$arguments490['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 2);
$arguments490['then'] = NULL;
$arguments490['else'] = NULL;
$renderChildrenClosure491 = function() use ($renderingContext, $self) {
$output492 = '';

$output492 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments493 = array();
$arguments493['partial'] = 'Detail/MediaHtml';
// Rendering Array
$array494 = array();
$array494['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement', $renderingContext);
$arguments493['arguments'] = $array494;
$arguments493['section'] = NULL;
$arguments493['optional'] = false;
$renderChildrenClosure495 = function() use ($renderingContext, $self) {
return NULL;
};

$output492 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments493, $renderChildrenClosure495, $renderingContext);

$output492 .= '
										';
return $output492;
};
$viewHelper496 = $self->getViewHelper('$viewHelper496', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper496->setArguments($arguments490);
$viewHelper496->setRenderingContext($renderingContext);
$viewHelper496->setRenderChildrenClosure($renderChildrenClosure491);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output474 .= $viewHelper496->initializeArgumentsAndRender();

$output474 .= '
									';
return $output474;
};

$output470 .= TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper::renderStatic($arguments471, $renderChildrenClosure473, $renderingContext);

$output470 .= '
								';
return $output470;
};
$viewHelper497 = $self->getViewHelper('$viewHelper497', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper497->setArguments($arguments468);
$viewHelper497->setRenderingContext($renderingContext);
$viewHelper497->setRenderChildrenClosure($renderChildrenClosure469);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output467 .= $viewHelper497->initializeArgumentsAndRender();

$output467 .= '
							';
return $output467;
};

$output464 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments465, $renderChildrenClosure466, $renderingContext);

$output464 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments498 = array();
$renderChildrenClosure499 = function() use ($renderingContext, $self) {
$output500 = '';

$output500 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments501 = array();
// Rendering Boolean node
$arguments501['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.displayDummyIfNoMedia', $renderingContext));
$arguments501['then'] = NULL;
$arguments501['else'] = NULL;
$renderChildrenClosure502 = function() use ($renderingContext, $self) {
$output503 = '';

$output503 .= '
									<span class="no-media-element">
										';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments504 = array();
$arguments504['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments504['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments504['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments504['additionalAttributes'] = NULL;
$arguments504['data'] = NULL;
$arguments504['uriOnly'] = false;
$arguments504['configuration'] = array (
);
$arguments504['content'] = '';
$arguments504['class'] = NULL;
$arguments504['dir'] = NULL;
$arguments504['id'] = NULL;
$arguments504['lang'] = NULL;
$arguments504['style'] = NULL;
$arguments504['accesskey'] = NULL;
$arguments504['tabindex'] = NULL;
$arguments504['onclick'] = NULL;
$arguments504['target'] = NULL;
$arguments504['rel'] = NULL;
$renderChildrenClosure505 = function() use ($renderingContext, $self) {
$output506 = '';

$output506 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments507 = array();
$arguments507['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.dummyImage', $renderingContext);
$arguments507['title'] = '';
$arguments507['alt'] = '';
$arguments507['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments507['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments507['additionalAttributes'] = NULL;
$arguments507['data'] = NULL;
$arguments507['width'] = NULL;
$arguments507['height'] = NULL;
$arguments507['minWidth'] = NULL;
$arguments507['minHeight'] = NULL;
$arguments507['treatIdAsReference'] = false;
$arguments507['image'] = NULL;
$arguments507['crop'] = NULL;
$arguments507['class'] = NULL;
$arguments507['dir'] = NULL;
$arguments507['id'] = NULL;
$arguments507['lang'] = NULL;
$arguments507['style'] = NULL;
$arguments507['accesskey'] = NULL;
$arguments507['tabindex'] = NULL;
$arguments507['onclick'] = NULL;
$arguments507['ismap'] = NULL;
$arguments507['longdesc'] = NULL;
$arguments507['usemap'] = NULL;
$renderChildrenClosure508 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper509 = $self->getViewHelper('$viewHelper509', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper509->setArguments($arguments507);
$viewHelper509->setRenderingContext($renderingContext);
$viewHelper509->setRenderChildrenClosure($renderChildrenClosure508);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output506 .= $viewHelper509->initializeArgumentsAndRender();

$output506 .= '
										';
return $output506;
};
$viewHelper510 = $self->getViewHelper('$viewHelper510', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper510->setArguments($arguments504);
$viewHelper510->setRenderingContext($renderingContext);
$viewHelper510->setRenderChildrenClosure($renderChildrenClosure505);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output503 .= $viewHelper510->initializeArgumentsAndRender();

$output503 .= '
									</span>
								';
return $output503;
};
$viewHelper511 = $self->getViewHelper('$viewHelper511', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper511->setArguments($arguments501);
$viewHelper511->setRenderingContext($renderingContext);
$viewHelper511->setRenderChildrenClosure($renderChildrenClosure502);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output500 .= $viewHelper511->initializeArgumentsAndRender();

$output500 .= '
							';
return $output500;
};

$output464 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments498, $renderChildrenClosure499, $renderingContext);

$output464 .= '
						';
return $output464;
};
$arguments462['__thenClosure'] = function() use ($renderingContext, $self) {
$output512 = '';

$output512 .= '
								';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments513 = array();
$arguments513['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments513['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments513['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments513['additionalAttributes'] = NULL;
$arguments513['data'] = NULL;
$arguments513['uriOnly'] = false;
$arguments513['configuration'] = array (
);
$arguments513['content'] = '';
$arguments513['class'] = NULL;
$arguments513['dir'] = NULL;
$arguments513['id'] = NULL;
$arguments513['lang'] = NULL;
$arguments513['style'] = NULL;
$arguments513['accesskey'] = NULL;
$arguments513['tabindex'] = NULL;
$arguments513['onclick'] = NULL;
$arguments513['target'] = NULL;
$arguments513['rel'] = NULL;
$renderChildrenClosure514 = function() use ($renderingContext, $self) {
$output515 = '';

$output515 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper
$arguments516 = array();
// Rendering Array
$array517 = array();
$array517['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.mediaPreviews.0', $renderingContext);
$arguments516['map'] = $array517;
$renderChildrenClosure518 = function() use ($renderingContext, $self) {
$output519 = '';

$output519 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments520 = array();
// Rendering Boolean node
$arguments520['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 0);
$arguments520['then'] = NULL;
$arguments520['else'] = NULL;
$renderChildrenClosure521 = function() use ($renderingContext, $self) {
$output522 = '';

$output522 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments523 = array();
$output524 = '';

$output524 .= 'uploads/tx_news/';

$output524 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.image', $renderingContext);
$arguments523['src'] = $output524;
$arguments523['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.title', $renderingContext);
$arguments523['alt'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.alt', $renderingContext);
$arguments523['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments523['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments523['additionalAttributes'] = NULL;
$arguments523['data'] = NULL;
$arguments523['width'] = NULL;
$arguments523['height'] = NULL;
$arguments523['minWidth'] = NULL;
$arguments523['minHeight'] = NULL;
$arguments523['treatIdAsReference'] = false;
$arguments523['image'] = NULL;
$arguments523['crop'] = NULL;
$arguments523['class'] = NULL;
$arguments523['dir'] = NULL;
$arguments523['id'] = NULL;
$arguments523['lang'] = NULL;
$arguments523['style'] = NULL;
$arguments523['accesskey'] = NULL;
$arguments523['tabindex'] = NULL;
$arguments523['onclick'] = NULL;
$arguments523['ismap'] = NULL;
$arguments523['longdesc'] = NULL;
$arguments523['usemap'] = NULL;
$renderChildrenClosure525 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper526 = $self->getViewHelper('$viewHelper526', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper526->setArguments($arguments523);
$viewHelper526->setRenderingContext($renderingContext);
$viewHelper526->setRenderChildrenClosure($renderChildrenClosure525);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output522 .= $viewHelper526->initializeArgumentsAndRender();

$output522 .= '
										';
return $output522;
};
$viewHelper527 = $self->getViewHelper('$viewHelper527', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper527->setArguments($arguments520);
$viewHelper527->setRenderingContext($renderingContext);
$viewHelper527->setRenderChildrenClosure($renderChildrenClosure521);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output519 .= $viewHelper527->initializeArgumentsAndRender();

$output519 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments528 = array();
// Rendering Boolean node
$arguments528['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 1);
$arguments528['then'] = NULL;
$arguments528['else'] = NULL;
$renderChildrenClosure529 = function() use ($renderingContext, $self) {
$output530 = '';

$output530 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments531 = array();
$arguments531['partial'] = 'Detail/MediaVideo';
// Rendering Array
$array532 = array();
$array532['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement', $renderingContext);
$arguments531['arguments'] = $array532;
$arguments531['section'] = NULL;
$arguments531['optional'] = false;
$renderChildrenClosure533 = function() use ($renderingContext, $self) {
return NULL;
};

$output530 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments531, $renderChildrenClosure533, $renderingContext);

$output530 .= '
										';
return $output530;
};
$viewHelper534 = $self->getViewHelper('$viewHelper534', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper534->setArguments($arguments528);
$viewHelper534->setRenderingContext($renderingContext);
$viewHelper534->setRenderChildrenClosure($renderChildrenClosure529);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output519 .= $viewHelper534->initializeArgumentsAndRender();

$output519 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments535 = array();
// Rendering Boolean node
$arguments535['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 2);
$arguments535['then'] = NULL;
$arguments535['else'] = NULL;
$renderChildrenClosure536 = function() use ($renderingContext, $self) {
$output537 = '';

$output537 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments538 = array();
$arguments538['partial'] = 'Detail/MediaHtml';
// Rendering Array
$array539 = array();
$array539['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement', $renderingContext);
$arguments538['arguments'] = $array539;
$arguments538['section'] = NULL;
$arguments538['optional'] = false;
$renderChildrenClosure540 = function() use ($renderingContext, $self) {
return NULL;
};

$output537 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments538, $renderChildrenClosure540, $renderingContext);

$output537 .= '
										';
return $output537;
};
$viewHelper541 = $self->getViewHelper('$viewHelper541', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper541->setArguments($arguments535);
$viewHelper541->setRenderingContext($renderingContext);
$viewHelper541->setRenderChildrenClosure($renderChildrenClosure536);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output519 .= $viewHelper541->initializeArgumentsAndRender();

$output519 .= '
									';
return $output519;
};

$output515 .= TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper::renderStatic($arguments516, $renderChildrenClosure518, $renderingContext);

$output515 .= '
								';
return $output515;
};
$viewHelper542 = $self->getViewHelper('$viewHelper542', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper542->setArguments($arguments513);
$viewHelper542->setRenderingContext($renderingContext);
$viewHelper542->setRenderChildrenClosure($renderChildrenClosure514);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output512 .= $viewHelper542->initializeArgumentsAndRender();

$output512 .= '
							';
return $output512;
};
$arguments462['__elseClosure'] = function() use ($renderingContext, $self) {
$output543 = '';

$output543 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments544 = array();
// Rendering Boolean node
$arguments544['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.displayDummyIfNoMedia', $renderingContext));
$arguments544['then'] = NULL;
$arguments544['else'] = NULL;
$renderChildrenClosure545 = function() use ($renderingContext, $self) {
$output546 = '';

$output546 .= '
									<span class="no-media-element">
										';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments547 = array();
$arguments547['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments547['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments547['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments547['additionalAttributes'] = NULL;
$arguments547['data'] = NULL;
$arguments547['uriOnly'] = false;
$arguments547['configuration'] = array (
);
$arguments547['content'] = '';
$arguments547['class'] = NULL;
$arguments547['dir'] = NULL;
$arguments547['id'] = NULL;
$arguments547['lang'] = NULL;
$arguments547['style'] = NULL;
$arguments547['accesskey'] = NULL;
$arguments547['tabindex'] = NULL;
$arguments547['onclick'] = NULL;
$arguments547['target'] = NULL;
$arguments547['rel'] = NULL;
$renderChildrenClosure548 = function() use ($renderingContext, $self) {
$output549 = '';

$output549 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments550 = array();
$arguments550['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.dummyImage', $renderingContext);
$arguments550['title'] = '';
$arguments550['alt'] = '';
$arguments550['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments550['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments550['additionalAttributes'] = NULL;
$arguments550['data'] = NULL;
$arguments550['width'] = NULL;
$arguments550['height'] = NULL;
$arguments550['minWidth'] = NULL;
$arguments550['minHeight'] = NULL;
$arguments550['treatIdAsReference'] = false;
$arguments550['image'] = NULL;
$arguments550['crop'] = NULL;
$arguments550['class'] = NULL;
$arguments550['dir'] = NULL;
$arguments550['id'] = NULL;
$arguments550['lang'] = NULL;
$arguments550['style'] = NULL;
$arguments550['accesskey'] = NULL;
$arguments550['tabindex'] = NULL;
$arguments550['onclick'] = NULL;
$arguments550['ismap'] = NULL;
$arguments550['longdesc'] = NULL;
$arguments550['usemap'] = NULL;
$renderChildrenClosure551 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper552 = $self->getViewHelper('$viewHelper552', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper552->setArguments($arguments550);
$viewHelper552->setRenderingContext($renderingContext);
$viewHelper552->setRenderChildrenClosure($renderChildrenClosure551);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output549 .= $viewHelper552->initializeArgumentsAndRender();

$output549 .= '
										';
return $output549;
};
$viewHelper553 = $self->getViewHelper('$viewHelper553', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper553->setArguments($arguments547);
$viewHelper553->setRenderingContext($renderingContext);
$viewHelper553->setRenderChildrenClosure($renderChildrenClosure548);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output546 .= $viewHelper553->initializeArgumentsAndRender();

$output546 .= '
									</span>
								';
return $output546;
};
$viewHelper554 = $self->getViewHelper('$viewHelper554', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper554->setArguments($arguments544);
$viewHelper554->setRenderingContext($renderingContext);
$viewHelper554->setRenderChildrenClosure($renderChildrenClosure545);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output543 .= $viewHelper554->initializeArgumentsAndRender();

$output543 .= '
							';
return $output543;
};
$viewHelper555 = $self->getViewHelper('$viewHelper555', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper555->setArguments($arguments462);
$viewHelper555->setRenderingContext($renderingContext);
$viewHelper555->setRenderChildrenClosure($renderChildrenClosure463);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output461 .= $viewHelper555->initializeArgumentsAndRender();

$output461 .= '

					</div>
				';
return $output461;
};

$output458 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments459, $renderChildrenClosure460, $renderingContext);

$output458 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments556 = array();
$renderChildrenClosure557 = function() use ($renderingContext, $self) {
$output558 = '';

$output558 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments559 = array();
// Rendering Boolean node
$arguments559['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.displayDummyIfNoMedia', $renderingContext));
$arguments559['then'] = NULL;
$arguments559['else'] = NULL;
$renderChildrenClosure560 = function() use ($renderingContext, $self) {
$output561 = '';

$output561 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments562 = array();
$renderChildrenClosure563 = function() use ($renderingContext, $self) {
$output564 = '';

$output564 .= '
							<div class="news-img-wrap">
								';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments565 = array();
$arguments565['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments565['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments565['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments565['additionalAttributes'] = NULL;
$arguments565['data'] = NULL;
$arguments565['uriOnly'] = false;
$arguments565['configuration'] = array (
);
$arguments565['content'] = '';
$arguments565['class'] = NULL;
$arguments565['dir'] = NULL;
$arguments565['id'] = NULL;
$arguments565['lang'] = NULL;
$arguments565['style'] = NULL;
$arguments565['accesskey'] = NULL;
$arguments565['tabindex'] = NULL;
$arguments565['onclick'] = NULL;
$arguments565['target'] = NULL;
$arguments565['rel'] = NULL;
$renderChildrenClosure566 = function() use ($renderingContext, $self) {
$output567 = '';

$output567 .= '
									<span class="no-media-element">
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments568 = array();
$arguments568['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.dummyImage', $renderingContext);
$arguments568['title'] = '';
$arguments568['alt'] = '';
$arguments568['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments568['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments568['additionalAttributes'] = NULL;
$arguments568['data'] = NULL;
$arguments568['width'] = NULL;
$arguments568['height'] = NULL;
$arguments568['minWidth'] = NULL;
$arguments568['minHeight'] = NULL;
$arguments568['treatIdAsReference'] = false;
$arguments568['image'] = NULL;
$arguments568['crop'] = NULL;
$arguments568['class'] = NULL;
$arguments568['dir'] = NULL;
$arguments568['id'] = NULL;
$arguments568['lang'] = NULL;
$arguments568['style'] = NULL;
$arguments568['accesskey'] = NULL;
$arguments568['tabindex'] = NULL;
$arguments568['onclick'] = NULL;
$arguments568['ismap'] = NULL;
$arguments568['longdesc'] = NULL;
$arguments568['usemap'] = NULL;
$renderChildrenClosure569 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper570 = $self->getViewHelper('$viewHelper570', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper570->setArguments($arguments568);
$viewHelper570->setRenderingContext($renderingContext);
$viewHelper570->setRenderChildrenClosure($renderChildrenClosure569);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output567 .= $viewHelper570->initializeArgumentsAndRender();

$output567 .= '
									</span>
								';
return $output567;
};
$viewHelper571 = $self->getViewHelper('$viewHelper571', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper571->setArguments($arguments565);
$viewHelper571->setRenderingContext($renderingContext);
$viewHelper571->setRenderChildrenClosure($renderChildrenClosure566);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output564 .= $viewHelper571->initializeArgumentsAndRender();

$output564 .= '
							</div>
						';
return $output564;
};

$output561 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments562, $renderChildrenClosure563, $renderingContext);

$output561 .= '
					';
return $output561;
};
$arguments559['__thenClosure'] = function() use ($renderingContext, $self) {
$output572 = '';

$output572 .= '
							<div class="news-img-wrap">
								';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments573 = array();
$arguments573['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments573['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments573['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments573['additionalAttributes'] = NULL;
$arguments573['data'] = NULL;
$arguments573['uriOnly'] = false;
$arguments573['configuration'] = array (
);
$arguments573['content'] = '';
$arguments573['class'] = NULL;
$arguments573['dir'] = NULL;
$arguments573['id'] = NULL;
$arguments573['lang'] = NULL;
$arguments573['style'] = NULL;
$arguments573['accesskey'] = NULL;
$arguments573['tabindex'] = NULL;
$arguments573['onclick'] = NULL;
$arguments573['target'] = NULL;
$arguments573['rel'] = NULL;
$renderChildrenClosure574 = function() use ($renderingContext, $self) {
$output575 = '';

$output575 .= '
									<span class="no-media-element">
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments576 = array();
$arguments576['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.dummyImage', $renderingContext);
$arguments576['title'] = '';
$arguments576['alt'] = '';
$arguments576['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments576['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments576['additionalAttributes'] = NULL;
$arguments576['data'] = NULL;
$arguments576['width'] = NULL;
$arguments576['height'] = NULL;
$arguments576['minWidth'] = NULL;
$arguments576['minHeight'] = NULL;
$arguments576['treatIdAsReference'] = false;
$arguments576['image'] = NULL;
$arguments576['crop'] = NULL;
$arguments576['class'] = NULL;
$arguments576['dir'] = NULL;
$arguments576['id'] = NULL;
$arguments576['lang'] = NULL;
$arguments576['style'] = NULL;
$arguments576['accesskey'] = NULL;
$arguments576['tabindex'] = NULL;
$arguments576['onclick'] = NULL;
$arguments576['ismap'] = NULL;
$arguments576['longdesc'] = NULL;
$arguments576['usemap'] = NULL;
$renderChildrenClosure577 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper578 = $self->getViewHelper('$viewHelper578', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper578->setArguments($arguments576);
$viewHelper578->setRenderingContext($renderingContext);
$viewHelper578->setRenderChildrenClosure($renderChildrenClosure577);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output575 .= $viewHelper578->initializeArgumentsAndRender();

$output575 .= '
									</span>
								';
return $output575;
};
$viewHelper579 = $self->getViewHelper('$viewHelper579', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper579->setArguments($arguments573);
$viewHelper579->setRenderingContext($renderingContext);
$viewHelper579->setRenderChildrenClosure($renderChildrenClosure574);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output572 .= $viewHelper579->initializeArgumentsAndRender();

$output572 .= '
							</div>
						';
return $output572;
};
$viewHelper580 = $self->getViewHelper('$viewHelper580', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper580->setArguments($arguments559);
$viewHelper580->setRenderingContext($renderingContext);
$viewHelper580->setRenderChildrenClosure($renderChildrenClosure560);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output558 .= $viewHelper580->initializeArgumentsAndRender();

$output558 .= '
				';
return $output558;
};

$output458 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments556, $renderChildrenClosure557, $renderingContext);

$output458 .= '
			';
return $output458;
};
$arguments456['__thenClosure'] = function() use ($renderingContext, $self) {
$output581 = '';

$output581 .= '
					<div class="news-img-wrap">
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments582 = array();
// Rendering Boolean node
$arguments582['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.mediaPreviews', $renderingContext));
$arguments582['then'] = NULL;
$arguments582['else'] = NULL;
$renderChildrenClosure583 = function() use ($renderingContext, $self) {
$output584 = '';

$output584 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments585 = array();
$renderChildrenClosure586 = function() use ($renderingContext, $self) {
$output587 = '';

$output587 .= '
								';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments588 = array();
$arguments588['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments588['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments588['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments588['additionalAttributes'] = NULL;
$arguments588['data'] = NULL;
$arguments588['uriOnly'] = false;
$arguments588['configuration'] = array (
);
$arguments588['content'] = '';
$arguments588['class'] = NULL;
$arguments588['dir'] = NULL;
$arguments588['id'] = NULL;
$arguments588['lang'] = NULL;
$arguments588['style'] = NULL;
$arguments588['accesskey'] = NULL;
$arguments588['tabindex'] = NULL;
$arguments588['onclick'] = NULL;
$arguments588['target'] = NULL;
$arguments588['rel'] = NULL;
$renderChildrenClosure589 = function() use ($renderingContext, $self) {
$output590 = '';

$output590 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper
$arguments591 = array();
// Rendering Array
$array592 = array();
$array592['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.mediaPreviews.0', $renderingContext);
$arguments591['map'] = $array592;
$renderChildrenClosure593 = function() use ($renderingContext, $self) {
$output594 = '';

$output594 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments595 = array();
// Rendering Boolean node
$arguments595['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 0);
$arguments595['then'] = NULL;
$arguments595['else'] = NULL;
$renderChildrenClosure596 = function() use ($renderingContext, $self) {
$output597 = '';

$output597 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments598 = array();
$output599 = '';

$output599 .= 'uploads/tx_news/';

$output599 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.image', $renderingContext);
$arguments598['src'] = $output599;
$arguments598['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.title', $renderingContext);
$arguments598['alt'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.alt', $renderingContext);
$arguments598['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments598['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments598['additionalAttributes'] = NULL;
$arguments598['data'] = NULL;
$arguments598['width'] = NULL;
$arguments598['height'] = NULL;
$arguments598['minWidth'] = NULL;
$arguments598['minHeight'] = NULL;
$arguments598['treatIdAsReference'] = false;
$arguments598['image'] = NULL;
$arguments598['crop'] = NULL;
$arguments598['class'] = NULL;
$arguments598['dir'] = NULL;
$arguments598['id'] = NULL;
$arguments598['lang'] = NULL;
$arguments598['style'] = NULL;
$arguments598['accesskey'] = NULL;
$arguments598['tabindex'] = NULL;
$arguments598['onclick'] = NULL;
$arguments598['ismap'] = NULL;
$arguments598['longdesc'] = NULL;
$arguments598['usemap'] = NULL;
$renderChildrenClosure600 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper601 = $self->getViewHelper('$viewHelper601', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper601->setArguments($arguments598);
$viewHelper601->setRenderingContext($renderingContext);
$viewHelper601->setRenderChildrenClosure($renderChildrenClosure600);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output597 .= $viewHelper601->initializeArgumentsAndRender();

$output597 .= '
										';
return $output597;
};
$viewHelper602 = $self->getViewHelper('$viewHelper602', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper602->setArguments($arguments595);
$viewHelper602->setRenderingContext($renderingContext);
$viewHelper602->setRenderChildrenClosure($renderChildrenClosure596);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output594 .= $viewHelper602->initializeArgumentsAndRender();

$output594 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments603 = array();
// Rendering Boolean node
$arguments603['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 1);
$arguments603['then'] = NULL;
$arguments603['else'] = NULL;
$renderChildrenClosure604 = function() use ($renderingContext, $self) {
$output605 = '';

$output605 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments606 = array();
$arguments606['partial'] = 'Detail/MediaVideo';
// Rendering Array
$array607 = array();
$array607['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement', $renderingContext);
$arguments606['arguments'] = $array607;
$arguments606['section'] = NULL;
$arguments606['optional'] = false;
$renderChildrenClosure608 = function() use ($renderingContext, $self) {
return NULL;
};

$output605 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments606, $renderChildrenClosure608, $renderingContext);

$output605 .= '
										';
return $output605;
};
$viewHelper609 = $self->getViewHelper('$viewHelper609', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper609->setArguments($arguments603);
$viewHelper609->setRenderingContext($renderingContext);
$viewHelper609->setRenderChildrenClosure($renderChildrenClosure604);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output594 .= $viewHelper609->initializeArgumentsAndRender();

$output594 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments610 = array();
// Rendering Boolean node
$arguments610['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 2);
$arguments610['then'] = NULL;
$arguments610['else'] = NULL;
$renderChildrenClosure611 = function() use ($renderingContext, $self) {
$output612 = '';

$output612 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments613 = array();
$arguments613['partial'] = 'Detail/MediaHtml';
// Rendering Array
$array614 = array();
$array614['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement', $renderingContext);
$arguments613['arguments'] = $array614;
$arguments613['section'] = NULL;
$arguments613['optional'] = false;
$renderChildrenClosure615 = function() use ($renderingContext, $self) {
return NULL;
};

$output612 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments613, $renderChildrenClosure615, $renderingContext);

$output612 .= '
										';
return $output612;
};
$viewHelper616 = $self->getViewHelper('$viewHelper616', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper616->setArguments($arguments610);
$viewHelper616->setRenderingContext($renderingContext);
$viewHelper616->setRenderChildrenClosure($renderChildrenClosure611);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output594 .= $viewHelper616->initializeArgumentsAndRender();

$output594 .= '
									';
return $output594;
};

$output590 .= TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper::renderStatic($arguments591, $renderChildrenClosure593, $renderingContext);

$output590 .= '
								';
return $output590;
};
$viewHelper617 = $self->getViewHelper('$viewHelper617', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper617->setArguments($arguments588);
$viewHelper617->setRenderingContext($renderingContext);
$viewHelper617->setRenderChildrenClosure($renderChildrenClosure589);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output587 .= $viewHelper617->initializeArgumentsAndRender();

$output587 .= '
							';
return $output587;
};

$output584 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments585, $renderChildrenClosure586, $renderingContext);

$output584 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments618 = array();
$renderChildrenClosure619 = function() use ($renderingContext, $self) {
$output620 = '';

$output620 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments621 = array();
// Rendering Boolean node
$arguments621['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.displayDummyIfNoMedia', $renderingContext));
$arguments621['then'] = NULL;
$arguments621['else'] = NULL;
$renderChildrenClosure622 = function() use ($renderingContext, $self) {
$output623 = '';

$output623 .= '
									<span class="no-media-element">
										';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments624 = array();
$arguments624['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments624['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments624['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments624['additionalAttributes'] = NULL;
$arguments624['data'] = NULL;
$arguments624['uriOnly'] = false;
$arguments624['configuration'] = array (
);
$arguments624['content'] = '';
$arguments624['class'] = NULL;
$arguments624['dir'] = NULL;
$arguments624['id'] = NULL;
$arguments624['lang'] = NULL;
$arguments624['style'] = NULL;
$arguments624['accesskey'] = NULL;
$arguments624['tabindex'] = NULL;
$arguments624['onclick'] = NULL;
$arguments624['target'] = NULL;
$arguments624['rel'] = NULL;
$renderChildrenClosure625 = function() use ($renderingContext, $self) {
$output626 = '';

$output626 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments627 = array();
$arguments627['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.dummyImage', $renderingContext);
$arguments627['title'] = '';
$arguments627['alt'] = '';
$arguments627['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments627['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments627['additionalAttributes'] = NULL;
$arguments627['data'] = NULL;
$arguments627['width'] = NULL;
$arguments627['height'] = NULL;
$arguments627['minWidth'] = NULL;
$arguments627['minHeight'] = NULL;
$arguments627['treatIdAsReference'] = false;
$arguments627['image'] = NULL;
$arguments627['crop'] = NULL;
$arguments627['class'] = NULL;
$arguments627['dir'] = NULL;
$arguments627['id'] = NULL;
$arguments627['lang'] = NULL;
$arguments627['style'] = NULL;
$arguments627['accesskey'] = NULL;
$arguments627['tabindex'] = NULL;
$arguments627['onclick'] = NULL;
$arguments627['ismap'] = NULL;
$arguments627['longdesc'] = NULL;
$arguments627['usemap'] = NULL;
$renderChildrenClosure628 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper629 = $self->getViewHelper('$viewHelper629', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper629->setArguments($arguments627);
$viewHelper629->setRenderingContext($renderingContext);
$viewHelper629->setRenderChildrenClosure($renderChildrenClosure628);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output626 .= $viewHelper629->initializeArgumentsAndRender();

$output626 .= '
										';
return $output626;
};
$viewHelper630 = $self->getViewHelper('$viewHelper630', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper630->setArguments($arguments624);
$viewHelper630->setRenderingContext($renderingContext);
$viewHelper630->setRenderChildrenClosure($renderChildrenClosure625);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output623 .= $viewHelper630->initializeArgumentsAndRender();

$output623 .= '
									</span>
								';
return $output623;
};
$viewHelper631 = $self->getViewHelper('$viewHelper631', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper631->setArguments($arguments621);
$viewHelper631->setRenderingContext($renderingContext);
$viewHelper631->setRenderChildrenClosure($renderChildrenClosure622);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output620 .= $viewHelper631->initializeArgumentsAndRender();

$output620 .= '
							';
return $output620;
};

$output584 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments618, $renderChildrenClosure619, $renderingContext);

$output584 .= '
						';
return $output584;
};
$arguments582['__thenClosure'] = function() use ($renderingContext, $self) {
$output632 = '';

$output632 .= '
								';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments633 = array();
$arguments633['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments633['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments633['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments633['additionalAttributes'] = NULL;
$arguments633['data'] = NULL;
$arguments633['uriOnly'] = false;
$arguments633['configuration'] = array (
);
$arguments633['content'] = '';
$arguments633['class'] = NULL;
$arguments633['dir'] = NULL;
$arguments633['id'] = NULL;
$arguments633['lang'] = NULL;
$arguments633['style'] = NULL;
$arguments633['accesskey'] = NULL;
$arguments633['tabindex'] = NULL;
$arguments633['onclick'] = NULL;
$arguments633['target'] = NULL;
$arguments633['rel'] = NULL;
$renderChildrenClosure634 = function() use ($renderingContext, $self) {
$output635 = '';

$output635 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper
$arguments636 = array();
// Rendering Array
$array637 = array();
$array637['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.mediaPreviews.0', $renderingContext);
$arguments636['map'] = $array637;
$renderChildrenClosure638 = function() use ($renderingContext, $self) {
$output639 = '';

$output639 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments640 = array();
// Rendering Boolean node
$arguments640['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 0);
$arguments640['then'] = NULL;
$arguments640['else'] = NULL;
$renderChildrenClosure641 = function() use ($renderingContext, $self) {
$output642 = '';

$output642 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments643 = array();
$output644 = '';

$output644 .= 'uploads/tx_news/';

$output644 .= TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.image', $renderingContext);
$arguments643['src'] = $output644;
$arguments643['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.title', $renderingContext);
$arguments643['alt'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.alt', $renderingContext);
$arguments643['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments643['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments643['additionalAttributes'] = NULL;
$arguments643['data'] = NULL;
$arguments643['width'] = NULL;
$arguments643['height'] = NULL;
$arguments643['minWidth'] = NULL;
$arguments643['minHeight'] = NULL;
$arguments643['treatIdAsReference'] = false;
$arguments643['image'] = NULL;
$arguments643['crop'] = NULL;
$arguments643['class'] = NULL;
$arguments643['dir'] = NULL;
$arguments643['id'] = NULL;
$arguments643['lang'] = NULL;
$arguments643['style'] = NULL;
$arguments643['accesskey'] = NULL;
$arguments643['tabindex'] = NULL;
$arguments643['onclick'] = NULL;
$arguments643['ismap'] = NULL;
$arguments643['longdesc'] = NULL;
$arguments643['usemap'] = NULL;
$renderChildrenClosure645 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper646 = $self->getViewHelper('$viewHelper646', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper646->setArguments($arguments643);
$viewHelper646->setRenderingContext($renderingContext);
$viewHelper646->setRenderChildrenClosure($renderChildrenClosure645);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output642 .= $viewHelper646->initializeArgumentsAndRender();

$output642 .= '
										';
return $output642;
};
$viewHelper647 = $self->getViewHelper('$viewHelper647', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper647->setArguments($arguments640);
$viewHelper647->setRenderingContext($renderingContext);
$viewHelper647->setRenderChildrenClosure($renderChildrenClosure641);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output639 .= $viewHelper647->initializeArgumentsAndRender();

$output639 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments648 = array();
// Rendering Boolean node
$arguments648['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 1);
$arguments648['then'] = NULL;
$arguments648['else'] = NULL;
$renderChildrenClosure649 = function() use ($renderingContext, $self) {
$output650 = '';

$output650 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments651 = array();
$arguments651['partial'] = 'Detail/MediaVideo';
// Rendering Array
$array652 = array();
$array652['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement', $renderingContext);
$arguments651['arguments'] = $array652;
$arguments651['section'] = NULL;
$arguments651['optional'] = false;
$renderChildrenClosure653 = function() use ($renderingContext, $self) {
return NULL;
};

$output650 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments651, $renderChildrenClosure653, $renderingContext);

$output650 .= '
										';
return $output650;
};
$viewHelper654 = $self->getViewHelper('$viewHelper654', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper654->setArguments($arguments648);
$viewHelper654->setRenderingContext($renderingContext);
$viewHelper654->setRenderChildrenClosure($renderChildrenClosure649);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output639 .= $viewHelper654->initializeArgumentsAndRender();

$output639 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments655 = array();
// Rendering Boolean node
$arguments655['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement.type', $renderingContext), 2);
$arguments655['then'] = NULL;
$arguments655['else'] = NULL;
$renderChildrenClosure656 = function() use ($renderingContext, $self) {
$output657 = '';

$output657 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments658 = array();
$arguments658['partial'] = 'Detail/MediaHtml';
// Rendering Array
$array659 = array();
$array659['mediaElement'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'mediaElement', $renderingContext);
$arguments658['arguments'] = $array659;
$arguments658['section'] = NULL;
$arguments658['optional'] = false;
$renderChildrenClosure660 = function() use ($renderingContext, $self) {
return NULL;
};

$output657 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments658, $renderChildrenClosure660, $renderingContext);

$output657 .= '
										';
return $output657;
};
$viewHelper661 = $self->getViewHelper('$viewHelper661', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper661->setArguments($arguments655);
$viewHelper661->setRenderingContext($renderingContext);
$viewHelper661->setRenderChildrenClosure($renderChildrenClosure656);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output639 .= $viewHelper661->initializeArgumentsAndRender();

$output639 .= '
									';
return $output639;
};

$output635 .= TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper::renderStatic($arguments636, $renderChildrenClosure638, $renderingContext);

$output635 .= '
								';
return $output635;
};
$viewHelper662 = $self->getViewHelper('$viewHelper662', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper662->setArguments($arguments633);
$viewHelper662->setRenderingContext($renderingContext);
$viewHelper662->setRenderChildrenClosure($renderChildrenClosure634);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output632 .= $viewHelper662->initializeArgumentsAndRender();

$output632 .= '
							';
return $output632;
};
$arguments582['__elseClosure'] = function() use ($renderingContext, $self) {
$output663 = '';

$output663 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments664 = array();
// Rendering Boolean node
$arguments664['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.displayDummyIfNoMedia', $renderingContext));
$arguments664['then'] = NULL;
$arguments664['else'] = NULL;
$renderChildrenClosure665 = function() use ($renderingContext, $self) {
$output666 = '';

$output666 .= '
									<span class="no-media-element">
										';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments667 = array();
$arguments667['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments667['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments667['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments667['additionalAttributes'] = NULL;
$arguments667['data'] = NULL;
$arguments667['uriOnly'] = false;
$arguments667['configuration'] = array (
);
$arguments667['content'] = '';
$arguments667['class'] = NULL;
$arguments667['dir'] = NULL;
$arguments667['id'] = NULL;
$arguments667['lang'] = NULL;
$arguments667['style'] = NULL;
$arguments667['accesskey'] = NULL;
$arguments667['tabindex'] = NULL;
$arguments667['onclick'] = NULL;
$arguments667['target'] = NULL;
$arguments667['rel'] = NULL;
$renderChildrenClosure668 = function() use ($renderingContext, $self) {
$output669 = '';

$output669 .= '
											';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments670 = array();
$arguments670['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.dummyImage', $renderingContext);
$arguments670['title'] = '';
$arguments670['alt'] = '';
$arguments670['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments670['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments670['additionalAttributes'] = NULL;
$arguments670['data'] = NULL;
$arguments670['width'] = NULL;
$arguments670['height'] = NULL;
$arguments670['minWidth'] = NULL;
$arguments670['minHeight'] = NULL;
$arguments670['treatIdAsReference'] = false;
$arguments670['image'] = NULL;
$arguments670['crop'] = NULL;
$arguments670['class'] = NULL;
$arguments670['dir'] = NULL;
$arguments670['id'] = NULL;
$arguments670['lang'] = NULL;
$arguments670['style'] = NULL;
$arguments670['accesskey'] = NULL;
$arguments670['tabindex'] = NULL;
$arguments670['onclick'] = NULL;
$arguments670['ismap'] = NULL;
$arguments670['longdesc'] = NULL;
$arguments670['usemap'] = NULL;
$renderChildrenClosure671 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper672 = $self->getViewHelper('$viewHelper672', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper672->setArguments($arguments670);
$viewHelper672->setRenderingContext($renderingContext);
$viewHelper672->setRenderChildrenClosure($renderChildrenClosure671);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output669 .= $viewHelper672->initializeArgumentsAndRender();

$output669 .= '
										';
return $output669;
};
$viewHelper673 = $self->getViewHelper('$viewHelper673', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper673->setArguments($arguments667);
$viewHelper673->setRenderingContext($renderingContext);
$viewHelper673->setRenderChildrenClosure($renderChildrenClosure668);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output666 .= $viewHelper673->initializeArgumentsAndRender();

$output666 .= '
									</span>
								';
return $output666;
};
$viewHelper674 = $self->getViewHelper('$viewHelper674', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper674->setArguments($arguments664);
$viewHelper674->setRenderingContext($renderingContext);
$viewHelper674->setRenderChildrenClosure($renderChildrenClosure665);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output663 .= $viewHelper674->initializeArgumentsAndRender();

$output663 .= '
							';
return $output663;
};
$viewHelper675 = $self->getViewHelper('$viewHelper675', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper675->setArguments($arguments582);
$viewHelper675->setRenderingContext($renderingContext);
$viewHelper675->setRenderChildrenClosure($renderChildrenClosure583);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output581 .= $viewHelper675->initializeArgumentsAndRender();

$output581 .= '

					</div>
				';
return $output581;
};
$arguments456['__elseClosure'] = function() use ($renderingContext, $self) {
$output676 = '';

$output676 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments677 = array();
// Rendering Boolean node
$arguments677['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.displayDummyIfNoMedia', $renderingContext));
$arguments677['then'] = NULL;
$arguments677['else'] = NULL;
$renderChildrenClosure678 = function() use ($renderingContext, $self) {
$output679 = '';

$output679 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments680 = array();
$renderChildrenClosure681 = function() use ($renderingContext, $self) {
$output682 = '';

$output682 .= '
							<div class="news-img-wrap">
								';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments683 = array();
$arguments683['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments683['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments683['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments683['additionalAttributes'] = NULL;
$arguments683['data'] = NULL;
$arguments683['uriOnly'] = false;
$arguments683['configuration'] = array (
);
$arguments683['content'] = '';
$arguments683['class'] = NULL;
$arguments683['dir'] = NULL;
$arguments683['id'] = NULL;
$arguments683['lang'] = NULL;
$arguments683['style'] = NULL;
$arguments683['accesskey'] = NULL;
$arguments683['tabindex'] = NULL;
$arguments683['onclick'] = NULL;
$arguments683['target'] = NULL;
$arguments683['rel'] = NULL;
$renderChildrenClosure684 = function() use ($renderingContext, $self) {
$output685 = '';

$output685 .= '
									<span class="no-media-element">
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments686 = array();
$arguments686['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.dummyImage', $renderingContext);
$arguments686['title'] = '';
$arguments686['alt'] = '';
$arguments686['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments686['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments686['additionalAttributes'] = NULL;
$arguments686['data'] = NULL;
$arguments686['width'] = NULL;
$arguments686['height'] = NULL;
$arguments686['minWidth'] = NULL;
$arguments686['minHeight'] = NULL;
$arguments686['treatIdAsReference'] = false;
$arguments686['image'] = NULL;
$arguments686['crop'] = NULL;
$arguments686['class'] = NULL;
$arguments686['dir'] = NULL;
$arguments686['id'] = NULL;
$arguments686['lang'] = NULL;
$arguments686['style'] = NULL;
$arguments686['accesskey'] = NULL;
$arguments686['tabindex'] = NULL;
$arguments686['onclick'] = NULL;
$arguments686['ismap'] = NULL;
$arguments686['longdesc'] = NULL;
$arguments686['usemap'] = NULL;
$renderChildrenClosure687 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper688 = $self->getViewHelper('$viewHelper688', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper688->setArguments($arguments686);
$viewHelper688->setRenderingContext($renderingContext);
$viewHelper688->setRenderChildrenClosure($renderChildrenClosure687);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output685 .= $viewHelper688->initializeArgumentsAndRender();

$output685 .= '
									</span>
								';
return $output685;
};
$viewHelper689 = $self->getViewHelper('$viewHelper689', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper689->setArguments($arguments683);
$viewHelper689->setRenderingContext($renderingContext);
$viewHelper689->setRenderChildrenClosure($renderChildrenClosure684);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output682 .= $viewHelper689->initializeArgumentsAndRender();

$output682 .= '
							</div>
						';
return $output682;
};

$output679 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments680, $renderChildrenClosure681, $renderingContext);

$output679 .= '
					';
return $output679;
};
$arguments677['__thenClosure'] = function() use ($renderingContext, $self) {
$output690 = '';

$output690 .= '
							<div class="news-img-wrap">
								';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments691 = array();
$arguments691['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments691['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments691['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments691['additionalAttributes'] = NULL;
$arguments691['data'] = NULL;
$arguments691['uriOnly'] = false;
$arguments691['configuration'] = array (
);
$arguments691['content'] = '';
$arguments691['class'] = NULL;
$arguments691['dir'] = NULL;
$arguments691['id'] = NULL;
$arguments691['lang'] = NULL;
$arguments691['style'] = NULL;
$arguments691['accesskey'] = NULL;
$arguments691['tabindex'] = NULL;
$arguments691['onclick'] = NULL;
$arguments691['target'] = NULL;
$arguments691['rel'] = NULL;
$renderChildrenClosure692 = function() use ($renderingContext, $self) {
$output693 = '';

$output693 .= '
									<span class="no-media-element">
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$arguments694 = array();
$arguments694['src'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.dummyImage', $renderingContext);
$arguments694['title'] = '';
$arguments694['alt'] = '';
$arguments694['maxWidth'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxWidth', $renderingContext);
$arguments694['maxHeight'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.media.image.maxHeight', $renderingContext);
$arguments694['additionalAttributes'] = NULL;
$arguments694['data'] = NULL;
$arguments694['width'] = NULL;
$arguments694['height'] = NULL;
$arguments694['minWidth'] = NULL;
$arguments694['minHeight'] = NULL;
$arguments694['treatIdAsReference'] = false;
$arguments694['image'] = NULL;
$arguments694['crop'] = NULL;
$arguments694['class'] = NULL;
$arguments694['dir'] = NULL;
$arguments694['id'] = NULL;
$arguments694['lang'] = NULL;
$arguments694['style'] = NULL;
$arguments694['accesskey'] = NULL;
$arguments694['tabindex'] = NULL;
$arguments694['onclick'] = NULL;
$arguments694['ismap'] = NULL;
$arguments694['longdesc'] = NULL;
$arguments694['usemap'] = NULL;
$renderChildrenClosure695 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper696 = $self->getViewHelper('$viewHelper696', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper');
$viewHelper696->setArguments($arguments694);
$viewHelper696->setRenderingContext($renderingContext);
$viewHelper696->setRenderChildrenClosure($renderChildrenClosure695);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper

$output693 .= $viewHelper696->initializeArgumentsAndRender();

$output693 .= '
									</span>
								';
return $output693;
};
$viewHelper697 = $self->getViewHelper('$viewHelper697', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper697->setArguments($arguments691);
$viewHelper697->setRenderingContext($renderingContext);
$viewHelper697->setRenderChildrenClosure($renderChildrenClosure692);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output690 .= $viewHelper697->initializeArgumentsAndRender();

$output690 .= '
							</div>
						';
return $output690;
};
$viewHelper698 = $self->getViewHelper('$viewHelper698', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper698->setArguments($arguments677);
$viewHelper698->setRenderingContext($renderingContext);
$viewHelper698->setRenderChildrenClosure($renderChildrenClosure678);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output676 .= $viewHelper698->initializeArgumentsAndRender();

$output676 .= '
				';
return $output676;
};
$viewHelper699 = $self->getViewHelper('$viewHelper699', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper699->setArguments($arguments456);
$viewHelper699->setRenderingContext($renderingContext);
$viewHelper699->setRenderChildrenClosure($renderChildrenClosure457);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output455 .= $viewHelper699->initializeArgumentsAndRender();

$output455 .= '

		';
return $output455;
};
$viewHelper700 = $self->getViewHelper('$viewHelper700', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper700->setArguments($arguments17);
$viewHelper700->setRenderingContext($renderingContext);
$viewHelper700->setRenderChildrenClosure($renderChildrenClosure18);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper700->initializeArgumentsAndRender();

$output0 .= '


	<!-- teas=ser text -->
	<div class="teaser-text">
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments701 = array();
// Rendering Boolean node
$arguments701['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.teaser', $renderingContext));
$arguments701['then'] = NULL;
$arguments701['else'] = NULL;
$renderChildrenClosure702 = function() use ($renderingContext, $self) {
$output703 = '';

$output703 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments704 = array();
$renderChildrenClosure705 = function() use ($renderingContext, $self) {
$output706 = '';

$output706 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper
$arguments707 = array();
$arguments707['parseFuncTSPath'] = 'lib.parseFunc_RTE';
$renderChildrenClosure708 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\CropViewHelper
$arguments709 = array();
$arguments709['maxCharacters'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.cropMaxCharacters', $renderingContext);
// Rendering Boolean node
$arguments709['respectWordBoundaries'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('1');
$arguments709['append'] = '...';
$arguments709['respectHtml'] = true;
$renderChildrenClosure710 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.teaser', $renderingContext);
};
$viewHelper711 = $self->getViewHelper('$viewHelper711', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Format\CropViewHelper');
$viewHelper711->setArguments($arguments709);
$viewHelper711->setRenderingContext($renderingContext);
$viewHelper711->setRenderChildrenClosure($renderChildrenClosure710);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\CropViewHelper
return $viewHelper711->initializeArgumentsAndRender();
};
$viewHelper712 = $self->getViewHelper('$viewHelper712', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper');
$viewHelper712->setArguments($arguments707);
$viewHelper712->setRenderingContext($renderingContext);
$viewHelper712->setRenderChildrenClosure($renderChildrenClosure708);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper

$output706 .= $viewHelper712->initializeArgumentsAndRender();

$output706 .= '
			';
return $output706;
};

$output703 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments704, $renderChildrenClosure705, $renderingContext);

$output703 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments713 = array();
$renderChildrenClosure714 = function() use ($renderingContext, $self) {
$output715 = '';

$output715 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper
$arguments716 = array();
$arguments716['parseFuncTSPath'] = 'lib.parseFunc_RTE';
$renderChildrenClosure717 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\CropViewHelper
$arguments718 = array();
$arguments718['maxCharacters'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.cropMaxCharacters', $renderingContext);
// Rendering Boolean node
$arguments718['respectWordBoundaries'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('1');
$arguments718['append'] = '...';
$arguments718['respectHtml'] = true;
$renderChildrenClosure719 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.bodytext', $renderingContext);
};
$viewHelper720 = $self->getViewHelper('$viewHelper720', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Format\CropViewHelper');
$viewHelper720->setArguments($arguments718);
$viewHelper720->setRenderingContext($renderingContext);
$viewHelper720->setRenderChildrenClosure($renderChildrenClosure719);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\CropViewHelper
return $viewHelper720->initializeArgumentsAndRender();
};
$viewHelper721 = $self->getViewHelper('$viewHelper721', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper');
$viewHelper721->setArguments($arguments716);
$viewHelper721->setRenderingContext($renderingContext);
$viewHelper721->setRenderChildrenClosure($renderChildrenClosure717);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper

$output715 .= $viewHelper721->initializeArgumentsAndRender();

$output715 .= '
			';
return $output715;
};

$output703 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments713, $renderChildrenClosure714, $renderingContext);

$output703 .= '
		';
return $output703;
};
$arguments701['__thenClosure'] = function() use ($renderingContext, $self) {
$output722 = '';

$output722 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper
$arguments723 = array();
$arguments723['parseFuncTSPath'] = 'lib.parseFunc_RTE';
$renderChildrenClosure724 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\CropViewHelper
$arguments725 = array();
$arguments725['maxCharacters'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.cropMaxCharacters', $renderingContext);
// Rendering Boolean node
$arguments725['respectWordBoundaries'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('1');
$arguments725['append'] = '...';
$arguments725['respectHtml'] = true;
$renderChildrenClosure726 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.teaser', $renderingContext);
};
$viewHelper727 = $self->getViewHelper('$viewHelper727', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Format\CropViewHelper');
$viewHelper727->setArguments($arguments725);
$viewHelper727->setRenderingContext($renderingContext);
$viewHelper727->setRenderChildrenClosure($renderChildrenClosure726);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\CropViewHelper
return $viewHelper727->initializeArgumentsAndRender();
};
$viewHelper728 = $self->getViewHelper('$viewHelper728', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper');
$viewHelper728->setArguments($arguments723);
$viewHelper728->setRenderingContext($renderingContext);
$viewHelper728->setRenderChildrenClosure($renderChildrenClosure724);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper

$output722 .= $viewHelper728->initializeArgumentsAndRender();

$output722 .= '
			';
return $output722;
};
$arguments701['__elseClosure'] = function() use ($renderingContext, $self) {
$output729 = '';

$output729 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper
$arguments730 = array();
$arguments730['parseFuncTSPath'] = 'lib.parseFunc_RTE';
$renderChildrenClosure731 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\CropViewHelper
$arguments732 = array();
$arguments732['maxCharacters'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.cropMaxCharacters', $renderingContext);
// Rendering Boolean node
$arguments732['respectWordBoundaries'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('1');
$arguments732['append'] = '...';
$arguments732['respectHtml'] = true;
$renderChildrenClosure733 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.bodytext', $renderingContext);
};
$viewHelper734 = $self->getViewHelper('$viewHelper734', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Format\CropViewHelper');
$viewHelper734->setArguments($arguments732);
$viewHelper734->setRenderingContext($renderingContext);
$viewHelper734->setRenderChildrenClosure($renderChildrenClosure733);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\CropViewHelper
return $viewHelper734->initializeArgumentsAndRender();
};
$viewHelper735 = $self->getViewHelper('$viewHelper735', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper');
$viewHelper735->setArguments($arguments730);
$viewHelper735->setRenderingContext($renderingContext);
$viewHelper735->setRenderChildrenClosure($renderChildrenClosure731);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper

$output729 .= $viewHelper735->initializeArgumentsAndRender();

$output729 .= '
			';
return $output729;
};
$viewHelper736 = $self->getViewHelper('$viewHelper736', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper736->setArguments($arguments701);
$viewHelper736->setRenderingContext($renderingContext);
$viewHelper736->setRenderChildrenClosure($renderChildrenClosure702);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper736->initializeArgumentsAndRender();

$output0 .= '

		';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper
$arguments737 = array();
$arguments737['newsItem'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem', $renderingContext);
$arguments737['settings'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings', $renderingContext);
$arguments737['class'] = 'more';
$arguments737['title'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.title', $renderingContext);
$arguments737['additionalAttributes'] = NULL;
$arguments737['data'] = NULL;
$arguments737['uriOnly'] = false;
$arguments737['configuration'] = array (
);
$arguments737['content'] = '';
$arguments737['dir'] = NULL;
$arguments737['id'] = NULL;
$arguments737['lang'] = NULL;
$arguments737['style'] = NULL;
$arguments737['accesskey'] = NULL;
$arguments737['tabindex'] = NULL;
$arguments737['onclick'] = NULL;
$arguments737['target'] = NULL;
$arguments737['rel'] = NULL;
$renderChildrenClosure738 = function() use ($renderingContext, $self) {
$output739 = '';

$output739 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments740 = array();
$arguments740['key'] = 'more-link';
$arguments740['id'] = NULL;
$arguments740['default'] = NULL;
$arguments740['htmlEscape'] = NULL;
$arguments740['arguments'] = NULL;
$arguments740['extensionName'] = NULL;
$renderChildrenClosure741 = function() use ($renderingContext, $self) {
return NULL;
};

$output739 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments740, $renderChildrenClosure741, $renderingContext);

$output739 .= '
		';
return $output739;
};
$viewHelper742 = $self->getViewHelper('$viewHelper742', $renderingContext, 'GeorgRinger\News\ViewHelpers\LinkViewHelper');
$viewHelper742->setArguments($arguments737);
$viewHelper742->setRenderingContext($renderingContext);
$viewHelper742->setRenderChildrenClosure($renderChildrenClosure738);
// End of ViewHelper GeorgRinger\News\ViewHelpers\LinkViewHelper

$output0 .= $viewHelper742->initializeArgumentsAndRender();

$output0 .= '
	</div>

	<!-- footer information -->
	<div class="footer">
		<p>
			<!-- date -->
			<span class="news-list-date">
				<time datetime="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments743 = array();
$arguments743['date'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.datetime', $renderingContext);
$arguments743['format'] = 'Y-m-d';
$renderChildrenClosure744 = function() use ($renderingContext, $self) {
return NULL;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments743, $renderChildrenClosure744, $renderingContext);

$output0 .= '">
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments745 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments746 = array();
$arguments746['key'] = 'dateFormat';
$arguments746['id'] = NULL;
$arguments746['default'] = NULL;
$arguments746['htmlEscape'] = NULL;
$arguments746['arguments'] = NULL;
$arguments746['extensionName'] = NULL;
$renderChildrenClosure747 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments745['format'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments746, $renderChildrenClosure747, $renderingContext);
$arguments745['date'] = NULL;
$renderChildrenClosure748 = function() use ($renderingContext, $self) {
return TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.datetime', $renderingContext);
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments745, $renderChildrenClosure748, $renderingContext);

$output0 .= '
				</time>
			</span>

			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments749 = array();
// Rendering Boolean node
$arguments749['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.firstCategory', $renderingContext));
$arguments749['then'] = NULL;
$arguments749['else'] = NULL;
$renderChildrenClosure750 = function() use ($renderingContext, $self) {
$output751 = '';

$output751 .= '
				<!-- first category -->
				<span class="news-list-category">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments752 = array();
$arguments752['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.firstCategory.title', $renderingContext);
$arguments752['keepQuotes'] = false;
$arguments752['encoding'] = NULL;
$arguments752['doubleEncode'] = true;
$renderChildrenClosure753 = function() use ($renderingContext, $self) {
return NULL;
};
$value754 = ($arguments752['value'] !== NULL ? $arguments752['value'] : $renderChildrenClosure753());

$output751 .= (!is_string($value754) ? $value754 : htmlspecialchars($value754, ($arguments752['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments752['encoding'] !== NULL ? $arguments752['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments752['doubleEncode']));

$output751 .= '</span>
			';
return $output751;
};
$viewHelper755 = $self->getViewHelper('$viewHelper755', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper755->setArguments($arguments749);
$viewHelper755->setRenderingContext($renderingContext);
$viewHelper755->setRenderChildrenClosure($renderChildrenClosure750);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper755->initializeArgumentsAndRender();

$output0 .= '

			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments756 = array();
// Rendering Boolean node
$arguments756['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.tags', $renderingContext));
$arguments756['then'] = NULL;
$arguments756['else'] = NULL;
$renderChildrenClosure757 = function() use ($renderingContext, $self) {
$output758 = '';

$output758 .= '
				<!-- Tags -->
				<span class="news-list-tags">
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments759 = array();
$arguments759['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.tags', $renderingContext);
$arguments759['as'] = 'tag';
$arguments759['key'] = '';
$arguments759['reverse'] = false;
$arguments759['iteration'] = NULL;
$renderChildrenClosure760 = function() use ($renderingContext, $self) {
$output761 = '';

$output761 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments762 = array();
$arguments762['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'tag.title', $renderingContext);
$arguments762['keepQuotes'] = false;
$arguments762['encoding'] = NULL;
$arguments762['doubleEncode'] = true;
$renderChildrenClosure763 = function() use ($renderingContext, $self) {
return NULL;
};
$value764 = ($arguments762['value'] !== NULL ? $arguments762['value'] : $renderChildrenClosure763());

$output761 .= (!is_string($value764) ? $value764 : htmlspecialchars($value764, ($arguments762['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments762['encoding'] !== NULL ? $arguments762['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments762['doubleEncode']));

$output761 .= '
					';
return $output761;
};

$output758 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments759, $renderChildrenClosure760, $renderingContext);

$output758 .= '
				</span>
			';
return $output758;
};
$viewHelper765 = $self->getViewHelper('$viewHelper765', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper765->setArguments($arguments756);
$viewHelper765->setRenderingContext($renderingContext);
$viewHelper765->setRenderChildrenClosure($renderChildrenClosure757);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper765->initializeArgumentsAndRender();

$output0 .= '

			<!-- author -->
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments766 = array();
// Rendering Boolean node
$arguments766['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.author', $renderingContext));
$arguments766['then'] = NULL;
$arguments766['else'] = NULL;
$renderChildrenClosure767 = function() use ($renderingContext, $self) {
$output768 = '';

$output768 .= '
				<span class="news-list-author">
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments769 = array();
$arguments769['key'] = 'author';
// Rendering Array
$array770 = array();
$array770['0'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'newsItem.author', $renderingContext);
$arguments769['arguments'] = $array770;
$arguments769['id'] = NULL;
$arguments769['default'] = NULL;
$arguments769['htmlEscape'] = NULL;
$arguments769['extensionName'] = NULL;
$renderChildrenClosure771 = function() use ($renderingContext, $self) {
return NULL;
};

$output768 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments769, $renderChildrenClosure771, $renderingContext);

$output768 .= '
				</span>
			';
return $output768;
};
$viewHelper772 = $self->getViewHelper('$viewHelper772', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper772->setArguments($arguments766);
$viewHelper772->setRenderingContext($renderingContext);
$viewHelper772->setRenderChildrenClosure($renderChildrenClosure767);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper772->initializeArgumentsAndRender();

$output0 .= '
		</p>
	</div>
</div>
';

return $output0;
}


}
#1437088599    259193    