<?php
class FluidCache_News_ViewHelpers_Widget_Paginate_action_index_677b5a6f9012eac9854ff3055cad9f29ad2deccb extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments1 = array();
// Rendering Boolean node
$arguments1['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('>', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.numberOfPages', $renderingContext), 1);
$arguments1['then'] = NULL;
$arguments1['else'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$output3 = '';

$output3 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments4 = array();
// Rendering Boolean node
$arguments4['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.paginate', $renderingContext));
$arguments4['then'] = NULL;
$arguments4['else'] = NULL;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
$output6 = '';

$output6 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments7 = array();
// Rendering Boolean node
$arguments7['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.previousPage', $renderingContext));
$arguments7['then'] = NULL;
$arguments7['else'] = NULL;
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
$output9 = '';

$output9 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments10 = array();
// Rendering Boolean node
$arguments10['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('>', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.previousPage', $renderingContext), 1);
$arguments10['then'] = NULL;
$arguments10['else'] = NULL;
$renderChildrenClosure11 = function() use ($renderingContext, $self) {
$output12 = '';

$output12 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments13 = array();
$renderChildrenClosure14 = function() use ($renderingContext, $self) {
$output15 = '';

$output15 .= '
						';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\HeaderDataViewHelper
$arguments16 = array();
$renderChildrenClosure17 = function() use ($renderingContext, $self) {
$output18 = '';

$output18 .= '<link rel="prev" href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments19 = array();
// Rendering Array
$array20 = array();
$array20['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.previousPage', $renderingContext);
$arguments19['arguments'] = $array20;
$arguments19['action'] = NULL;
$arguments19['section'] = '';
$arguments19['format'] = '';
$arguments19['ajax'] = false;
$arguments19['addQueryStringMethod'] = NULL;
$renderChildrenClosure21 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper22 = $self->getViewHelper('$viewHelper22', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper22->setArguments($arguments19);
$viewHelper22->setRenderingContext($renderingContext);
$viewHelper22->setRenderChildrenClosure($renderChildrenClosure21);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output18 .= $viewHelper22->initializeArgumentsAndRender();

$output18 .= '" />';
return $output18;
};
$viewHelper23 = $self->getViewHelper('$viewHelper23', $renderingContext, 'GeorgRinger\News\ViewHelpers\HeaderDataViewHelper');
$viewHelper23->setArguments($arguments16);
$viewHelper23->setRenderingContext($renderingContext);
$viewHelper23->setRenderChildrenClosure($renderChildrenClosure17);
// End of ViewHelper GeorgRinger\News\ViewHelpers\HeaderDataViewHelper

$output15 .= $viewHelper23->initializeArgumentsAndRender();

$output15 .= '
					';
return $output15;
};

$output12 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments13, $renderChildrenClosure14, $renderingContext);

$output12 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments24 = array();
$renderChildrenClosure25 = function() use ($renderingContext, $self) {
$output26 = '';

$output26 .= '
						';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\HeaderDataViewHelper
$arguments27 = array();
$renderChildrenClosure28 = function() use ($renderingContext, $self) {
$output29 = '';

$output29 .= '<link rel="prev" href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments30 = array();
$arguments30['action'] = NULL;
$arguments30['arguments'] = array (
);
$arguments30['section'] = '';
$arguments30['format'] = '';
$arguments30['ajax'] = false;
$arguments30['addQueryStringMethod'] = NULL;
$renderChildrenClosure31 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper32 = $self->getViewHelper('$viewHelper32', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper32->setArguments($arguments30);
$viewHelper32->setRenderingContext($renderingContext);
$viewHelper32->setRenderChildrenClosure($renderChildrenClosure31);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output29 .= $viewHelper32->initializeArgumentsAndRender();

$output29 .= '" />';
return $output29;
};
$viewHelper33 = $self->getViewHelper('$viewHelper33', $renderingContext, 'GeorgRinger\News\ViewHelpers\HeaderDataViewHelper');
$viewHelper33->setArguments($arguments27);
$viewHelper33->setRenderingContext($renderingContext);
$viewHelper33->setRenderChildrenClosure($renderChildrenClosure28);
// End of ViewHelper GeorgRinger\News\ViewHelpers\HeaderDataViewHelper

$output26 .= $viewHelper33->initializeArgumentsAndRender();

$output26 .= '
					';
return $output26;
};

$output12 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments24, $renderChildrenClosure25, $renderingContext);

$output12 .= '
				';
return $output12;
};
$arguments10['__thenClosure'] = function() use ($renderingContext, $self) {
$output34 = '';

$output34 .= '
						';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\HeaderDataViewHelper
$arguments35 = array();
$renderChildrenClosure36 = function() use ($renderingContext, $self) {
$output37 = '';

$output37 .= '<link rel="prev" href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments38 = array();
// Rendering Array
$array39 = array();
$array39['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.previousPage', $renderingContext);
$arguments38['arguments'] = $array39;
$arguments38['action'] = NULL;
$arguments38['section'] = '';
$arguments38['format'] = '';
$arguments38['ajax'] = false;
$arguments38['addQueryStringMethod'] = NULL;
$renderChildrenClosure40 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper41 = $self->getViewHelper('$viewHelper41', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper41->setArguments($arguments38);
$viewHelper41->setRenderingContext($renderingContext);
$viewHelper41->setRenderChildrenClosure($renderChildrenClosure40);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output37 .= $viewHelper41->initializeArgumentsAndRender();

$output37 .= '" />';
return $output37;
};
$viewHelper42 = $self->getViewHelper('$viewHelper42', $renderingContext, 'GeorgRinger\News\ViewHelpers\HeaderDataViewHelper');
$viewHelper42->setArguments($arguments35);
$viewHelper42->setRenderingContext($renderingContext);
$viewHelper42->setRenderChildrenClosure($renderChildrenClosure36);
// End of ViewHelper GeorgRinger\News\ViewHelpers\HeaderDataViewHelper

$output34 .= $viewHelper42->initializeArgumentsAndRender();

$output34 .= '
					';
return $output34;
};
$arguments10['__elseClosure'] = function() use ($renderingContext, $self) {
$output43 = '';

$output43 .= '
						';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\HeaderDataViewHelper
$arguments44 = array();
$renderChildrenClosure45 = function() use ($renderingContext, $self) {
$output46 = '';

$output46 .= '<link rel="prev" href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments47 = array();
$arguments47['action'] = NULL;
$arguments47['arguments'] = array (
);
$arguments47['section'] = '';
$arguments47['format'] = '';
$arguments47['ajax'] = false;
$arguments47['addQueryStringMethod'] = NULL;
$renderChildrenClosure48 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper49 = $self->getViewHelper('$viewHelper49', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper49->setArguments($arguments47);
$viewHelper49->setRenderingContext($renderingContext);
$viewHelper49->setRenderChildrenClosure($renderChildrenClosure48);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output46 .= $viewHelper49->initializeArgumentsAndRender();

$output46 .= '" />';
return $output46;
};
$viewHelper50 = $self->getViewHelper('$viewHelper50', $renderingContext, 'GeorgRinger\News\ViewHelpers\HeaderDataViewHelper');
$viewHelper50->setArguments($arguments44);
$viewHelper50->setRenderingContext($renderingContext);
$viewHelper50->setRenderChildrenClosure($renderChildrenClosure45);
// End of ViewHelper GeorgRinger\News\ViewHelpers\HeaderDataViewHelper

$output43 .= $viewHelper50->initializeArgumentsAndRender();

$output43 .= '
					';
return $output43;
};
$viewHelper51 = $self->getViewHelper('$viewHelper51', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper51->setArguments($arguments10);
$viewHelper51->setRenderingContext($renderingContext);
$viewHelper51->setRenderChildrenClosure($renderChildrenClosure11);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output9 .= $viewHelper51->initializeArgumentsAndRender();

$output9 .= '
			';
return $output9;
};
$viewHelper52 = $self->getViewHelper('$viewHelper52', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper52->setArguments($arguments7);
$viewHelper52->setRenderingContext($renderingContext);
$viewHelper52->setRenderChildrenClosure($renderChildrenClosure8);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output6 .= $viewHelper52->initializeArgumentsAndRender();

$output6 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments53 = array();
// Rendering Boolean node
$arguments53['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.nextPage', $renderingContext));
$arguments53['then'] = NULL;
$arguments53['else'] = NULL;
$renderChildrenClosure54 = function() use ($renderingContext, $self) {
$output55 = '';

$output55 .= '
				';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\HeaderDataViewHelper
$arguments56 = array();
$renderChildrenClosure57 = function() use ($renderingContext, $self) {
$output58 = '';

$output58 .= '<link rel="next" href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments59 = array();
// Rendering Array
$array60 = array();
$array60['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.nextPage', $renderingContext);
$arguments59['arguments'] = $array60;
$arguments59['action'] = NULL;
$arguments59['section'] = '';
$arguments59['format'] = '';
$arguments59['ajax'] = false;
$arguments59['addQueryStringMethod'] = NULL;
$renderChildrenClosure61 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper62 = $self->getViewHelper('$viewHelper62', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper62->setArguments($arguments59);
$viewHelper62->setRenderingContext($renderingContext);
$viewHelper62->setRenderChildrenClosure($renderChildrenClosure61);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output58 .= $viewHelper62->initializeArgumentsAndRender();

$output58 .= '" />';
return $output58;
};
$viewHelper63 = $self->getViewHelper('$viewHelper63', $renderingContext, 'GeorgRinger\News\ViewHelpers\HeaderDataViewHelper');
$viewHelper63->setArguments($arguments56);
$viewHelper63->setRenderingContext($renderingContext);
$viewHelper63->setRenderChildrenClosure($renderChildrenClosure57);
// End of ViewHelper GeorgRinger\News\ViewHelpers\HeaderDataViewHelper

$output55 .= $viewHelper63->initializeArgumentsAndRender();

$output55 .= '
			';
return $output55;
};
$viewHelper64 = $self->getViewHelper('$viewHelper64', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper64->setArguments($arguments53);
$viewHelper64->setRenderingContext($renderingContext);
$viewHelper64->setRenderChildrenClosure($renderChildrenClosure54);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output6 .= $viewHelper64->initializeArgumentsAndRender();

$output6 .= '
		';
return $output6;
};
$viewHelper65 = $self->getViewHelper('$viewHelper65', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper65->setArguments($arguments4);
$viewHelper65->setRenderingContext($renderingContext);
$viewHelper65->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output3 .= $viewHelper65->initializeArgumentsAndRender();

$output3 .= '

		<div class="page-navigation">
			<p>
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments66 = array();
$arguments66['key'] = 'paginate_overall';
// Rendering Array
$array67 = array();
$array67['0'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.current', $renderingContext);
$array67['1'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.numberOfPages', $renderingContext);
$arguments66['arguments'] = $array67;
$arguments66['id'] = NULL;
$arguments66['default'] = NULL;
$arguments66['htmlEscape'] = NULL;
$arguments66['extensionName'] = NULL;
$renderChildrenClosure68 = function() use ($renderingContext, $self) {
return NULL;
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments66, $renderChildrenClosure68, $renderingContext);

$output3 .= '
			</p>
			<ul class="f3-widget-paginator">
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments69 = array();
// Rendering Boolean node
$arguments69['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.previousPage', $renderingContext));
$arguments69['then'] = NULL;
$arguments69['else'] = NULL;
$renderChildrenClosure70 = function() use ($renderingContext, $self) {
$output71 = '';

$output71 .= '
					<li class="previous">
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments72 = array();
// Rendering Boolean node
$arguments72['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('>', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.previousPage', $renderingContext), 1);
$arguments72['then'] = NULL;
$arguments72['else'] = NULL;
$renderChildrenClosure73 = function() use ($renderingContext, $self) {
$output74 = '';

$output74 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments75 = array();
$renderChildrenClosure76 = function() use ($renderingContext, $self) {
$output77 = '';

$output77 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments78 = array();
// Rendering Array
$array79 = array();
$array79['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.previousPage', $renderingContext);
$arguments78['arguments'] = $array79;
$arguments78['additionalAttributes'] = NULL;
$arguments78['data'] = NULL;
$arguments78['action'] = NULL;
$arguments78['section'] = '';
$arguments78['format'] = '';
$arguments78['ajax'] = false;
$arguments78['class'] = NULL;
$arguments78['dir'] = NULL;
$arguments78['id'] = NULL;
$arguments78['lang'] = NULL;
$arguments78['style'] = NULL;
$arguments78['title'] = NULL;
$arguments78['accesskey'] = NULL;
$arguments78['tabindex'] = NULL;
$arguments78['onclick'] = NULL;
$arguments78['name'] = NULL;
$arguments78['rel'] = NULL;
$arguments78['rev'] = NULL;
$arguments78['target'] = NULL;
$arguments78['addQueryStringMethod'] = NULL;
$renderChildrenClosure80 = function() use ($renderingContext, $self) {
$output81 = '';

$output81 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments82 = array();
$arguments82['key'] = 'paginate_previous';
$arguments82['id'] = NULL;
$arguments82['default'] = NULL;
$arguments82['htmlEscape'] = NULL;
$arguments82['arguments'] = NULL;
$arguments82['extensionName'] = NULL;
$renderChildrenClosure83 = function() use ($renderingContext, $self) {
return NULL;
};

$output81 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments82, $renderChildrenClosure83, $renderingContext);

$output81 .= '
								';
return $output81;
};
$viewHelper84 = $self->getViewHelper('$viewHelper84', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper84->setArguments($arguments78);
$viewHelper84->setRenderingContext($renderingContext);
$viewHelper84->setRenderChildrenClosure($renderChildrenClosure80);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output77 .= $viewHelper84->initializeArgumentsAndRender();

$output77 .= '
							';
return $output77;
};

$output74 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments75, $renderChildrenClosure76, $renderingContext);

$output74 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments85 = array();
$renderChildrenClosure86 = function() use ($renderingContext, $self) {
$output87 = '';

$output87 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments88 = array();
$arguments88['additionalAttributes'] = NULL;
$arguments88['data'] = NULL;
$arguments88['action'] = NULL;
$arguments88['arguments'] = array (
);
$arguments88['section'] = '';
$arguments88['format'] = '';
$arguments88['ajax'] = false;
$arguments88['class'] = NULL;
$arguments88['dir'] = NULL;
$arguments88['id'] = NULL;
$arguments88['lang'] = NULL;
$arguments88['style'] = NULL;
$arguments88['title'] = NULL;
$arguments88['accesskey'] = NULL;
$arguments88['tabindex'] = NULL;
$arguments88['onclick'] = NULL;
$arguments88['name'] = NULL;
$arguments88['rel'] = NULL;
$arguments88['rev'] = NULL;
$arguments88['target'] = NULL;
$arguments88['addQueryStringMethod'] = NULL;
$renderChildrenClosure89 = function() use ($renderingContext, $self) {
$output90 = '';

$output90 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments91 = array();
$arguments91['key'] = 'paginate_previous';
$arguments91['id'] = NULL;
$arguments91['default'] = NULL;
$arguments91['htmlEscape'] = NULL;
$arguments91['arguments'] = NULL;
$arguments91['extensionName'] = NULL;
$renderChildrenClosure92 = function() use ($renderingContext, $self) {
return NULL;
};

$output90 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments91, $renderChildrenClosure92, $renderingContext);

$output90 .= '
								';
return $output90;
};
$viewHelper93 = $self->getViewHelper('$viewHelper93', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper93->setArguments($arguments88);
$viewHelper93->setRenderingContext($renderingContext);
$viewHelper93->setRenderChildrenClosure($renderChildrenClosure89);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output87 .= $viewHelper93->initializeArgumentsAndRender();

$output87 .= '
							';
return $output87;
};

$output74 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments85, $renderChildrenClosure86, $renderingContext);

$output74 .= '
						';
return $output74;
};
$arguments72['__thenClosure'] = function() use ($renderingContext, $self) {
$output94 = '';

$output94 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments95 = array();
// Rendering Array
$array96 = array();
$array96['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.previousPage', $renderingContext);
$arguments95['arguments'] = $array96;
$arguments95['additionalAttributes'] = NULL;
$arguments95['data'] = NULL;
$arguments95['action'] = NULL;
$arguments95['section'] = '';
$arguments95['format'] = '';
$arguments95['ajax'] = false;
$arguments95['class'] = NULL;
$arguments95['dir'] = NULL;
$arguments95['id'] = NULL;
$arguments95['lang'] = NULL;
$arguments95['style'] = NULL;
$arguments95['title'] = NULL;
$arguments95['accesskey'] = NULL;
$arguments95['tabindex'] = NULL;
$arguments95['onclick'] = NULL;
$arguments95['name'] = NULL;
$arguments95['rel'] = NULL;
$arguments95['rev'] = NULL;
$arguments95['target'] = NULL;
$arguments95['addQueryStringMethod'] = NULL;
$renderChildrenClosure97 = function() use ($renderingContext, $self) {
$output98 = '';

$output98 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments99 = array();
$arguments99['key'] = 'paginate_previous';
$arguments99['id'] = NULL;
$arguments99['default'] = NULL;
$arguments99['htmlEscape'] = NULL;
$arguments99['arguments'] = NULL;
$arguments99['extensionName'] = NULL;
$renderChildrenClosure100 = function() use ($renderingContext, $self) {
return NULL;
};

$output98 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments99, $renderChildrenClosure100, $renderingContext);

$output98 .= '
								';
return $output98;
};
$viewHelper101 = $self->getViewHelper('$viewHelper101', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper101->setArguments($arguments95);
$viewHelper101->setRenderingContext($renderingContext);
$viewHelper101->setRenderChildrenClosure($renderChildrenClosure97);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output94 .= $viewHelper101->initializeArgumentsAndRender();

$output94 .= '
							';
return $output94;
};
$arguments72['__elseClosure'] = function() use ($renderingContext, $self) {
$output102 = '';

$output102 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments103 = array();
$arguments103['additionalAttributes'] = NULL;
$arguments103['data'] = NULL;
$arguments103['action'] = NULL;
$arguments103['arguments'] = array (
);
$arguments103['section'] = '';
$arguments103['format'] = '';
$arguments103['ajax'] = false;
$arguments103['class'] = NULL;
$arguments103['dir'] = NULL;
$arguments103['id'] = NULL;
$arguments103['lang'] = NULL;
$arguments103['style'] = NULL;
$arguments103['title'] = NULL;
$arguments103['accesskey'] = NULL;
$arguments103['tabindex'] = NULL;
$arguments103['onclick'] = NULL;
$arguments103['name'] = NULL;
$arguments103['rel'] = NULL;
$arguments103['rev'] = NULL;
$arguments103['target'] = NULL;
$arguments103['addQueryStringMethod'] = NULL;
$renderChildrenClosure104 = function() use ($renderingContext, $self) {
$output105 = '';

$output105 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments106 = array();
$arguments106['key'] = 'paginate_previous';
$arguments106['id'] = NULL;
$arguments106['default'] = NULL;
$arguments106['htmlEscape'] = NULL;
$arguments106['arguments'] = NULL;
$arguments106['extensionName'] = NULL;
$renderChildrenClosure107 = function() use ($renderingContext, $self) {
return NULL;
};

$output105 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments106, $renderChildrenClosure107, $renderingContext);

$output105 .= '
								';
return $output105;
};
$viewHelper108 = $self->getViewHelper('$viewHelper108', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper108->setArguments($arguments103);
$viewHelper108->setRenderingContext($renderingContext);
$viewHelper108->setRenderChildrenClosure($renderChildrenClosure104);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output102 .= $viewHelper108->initializeArgumentsAndRender();

$output102 .= '
							';
return $output102;
};
$viewHelper109 = $self->getViewHelper('$viewHelper109', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper109->setArguments($arguments72);
$viewHelper109->setRenderingContext($renderingContext);
$viewHelper109->setRenderChildrenClosure($renderChildrenClosure73);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output71 .= $viewHelper109->initializeArgumentsAndRender();

$output71 .= '
					</li>
				';
return $output71;
};
$viewHelper110 = $self->getViewHelper('$viewHelper110', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper110->setArguments($arguments69);
$viewHelper110->setRenderingContext($renderingContext);
$viewHelper110->setRenderChildrenClosure($renderChildrenClosure70);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output3 .= $viewHelper110->initializeArgumentsAndRender();

$output3 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments111 = array();
// Rendering Boolean node
$arguments111['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('>', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.displayRangeStart', $renderingContext), 1);
$arguments111['then'] = NULL;
$arguments111['else'] = NULL;
$renderChildrenClosure112 = function() use ($renderingContext, $self) {
$output113 = '';

$output113 .= '
					<li class="first">
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments114 = array();
$arguments114['additionalAttributes'] = NULL;
$arguments114['data'] = NULL;
$arguments114['action'] = NULL;
$arguments114['arguments'] = array (
);
$arguments114['section'] = '';
$arguments114['format'] = '';
$arguments114['ajax'] = false;
$arguments114['class'] = NULL;
$arguments114['dir'] = NULL;
$arguments114['id'] = NULL;
$arguments114['lang'] = NULL;
$arguments114['style'] = NULL;
$arguments114['title'] = NULL;
$arguments114['accesskey'] = NULL;
$arguments114['tabindex'] = NULL;
$arguments114['onclick'] = NULL;
$arguments114['name'] = NULL;
$arguments114['rel'] = NULL;
$arguments114['rev'] = NULL;
$arguments114['target'] = NULL;
$arguments114['addQueryStringMethod'] = NULL;
$renderChildrenClosure115 = function() use ($renderingContext, $self) {
return '1';
};
$viewHelper116 = $self->getViewHelper('$viewHelper116', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper116->setArguments($arguments114);
$viewHelper116->setRenderingContext($renderingContext);
$viewHelper116->setRenderChildrenClosure($renderChildrenClosure115);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output113 .= $viewHelper116->initializeArgumentsAndRender();

$output113 .= '
					</li>
				';
return $output113;
};
$viewHelper117 = $self->getViewHelper('$viewHelper117', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper117->setArguments($arguments111);
$viewHelper117->setRenderingContext($renderingContext);
$viewHelper117->setRenderChildrenClosure($renderChildrenClosure112);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output3 .= $viewHelper117->initializeArgumentsAndRender();

$output3 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments118 = array();
// Rendering Boolean node
$arguments118['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.hasLessPages', $renderingContext));
$arguments118['then'] = NULL;
$arguments118['else'] = NULL;
$renderChildrenClosure119 = function() use ($renderingContext, $self) {
return '
					<li>....</li>
				';
};
$viewHelper120 = $self->getViewHelper('$viewHelper120', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper120->setArguments($arguments118);
$viewHelper120->setRenderingContext($renderingContext);
$viewHelper120->setRenderChildrenClosure($renderChildrenClosure119);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output3 .= $viewHelper120->initializeArgumentsAndRender();

$output3 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments121 = array();
$arguments121['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.pages', $renderingContext);
$arguments121['as'] = 'page';
$arguments121['key'] = '';
$arguments121['reverse'] = false;
$arguments121['iteration'] = NULL;
$renderChildrenClosure122 = function() use ($renderingContext, $self) {
$output123 = '';

$output123 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments124 = array();
// Rendering Boolean node
$arguments124['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.isCurrent', $renderingContext));
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
							<li class="current">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments130 = array();
$arguments130['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments130['keepQuotes'] = false;
$arguments130['encoding'] = NULL;
$arguments130['doubleEncode'] = true;
$renderChildrenClosure131 = function() use ($renderingContext, $self) {
return NULL;
};
$value132 = ($arguments130['value'] !== NULL ? $arguments130['value'] : $renderChildrenClosure131());

$output129 .= (!is_string($value132) ? $value132 : htmlspecialchars($value132, ($arguments130['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments130['encoding'] !== NULL ? $arguments130['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments130['doubleEncode']));

$output129 .= '</li>
						';
return $output129;
};

$output126 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments127, $renderChildrenClosure128, $renderingContext);

$output126 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments133 = array();
$renderChildrenClosure134 = function() use ($renderingContext, $self) {
$output135 = '';

$output135 .= '
							<li>
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments136 = array();
// Rendering Boolean node
$arguments136['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('>', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext), 1);
$arguments136['then'] = NULL;
$arguments136['else'] = NULL;
$renderChildrenClosure137 = function() use ($renderingContext, $self) {
$output138 = '';

$output138 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments139 = array();
$renderChildrenClosure140 = function() use ($renderingContext, $self) {
$output141 = '';

$output141 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments142 = array();
// Rendering Array
$array143 = array();
$array143['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments142['arguments'] = $array143;
$arguments142['additionalAttributes'] = NULL;
$arguments142['data'] = NULL;
$arguments142['action'] = NULL;
$arguments142['section'] = '';
$arguments142['format'] = '';
$arguments142['ajax'] = false;
$arguments142['class'] = NULL;
$arguments142['dir'] = NULL;
$arguments142['id'] = NULL;
$arguments142['lang'] = NULL;
$arguments142['style'] = NULL;
$arguments142['title'] = NULL;
$arguments142['accesskey'] = NULL;
$arguments142['tabindex'] = NULL;
$arguments142['onclick'] = NULL;
$arguments142['name'] = NULL;
$arguments142['rel'] = NULL;
$arguments142['rev'] = NULL;
$arguments142['target'] = NULL;
$arguments142['addQueryStringMethod'] = NULL;
$renderChildrenClosure144 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments145 = array();
$arguments145['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments145['keepQuotes'] = false;
$arguments145['encoding'] = NULL;
$arguments145['doubleEncode'] = true;
$renderChildrenClosure146 = function() use ($renderingContext, $self) {
return NULL;
};
$value147 = ($arguments145['value'] !== NULL ? $arguments145['value'] : $renderChildrenClosure146());
return (!is_string($value147) ? $value147 : htmlspecialchars($value147, ($arguments145['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments145['encoding'] !== NULL ? $arguments145['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments145['doubleEncode']));
};
$viewHelper148 = $self->getViewHelper('$viewHelper148', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper148->setArguments($arguments142);
$viewHelper148->setRenderingContext($renderingContext);
$viewHelper148->setRenderChildrenClosure($renderChildrenClosure144);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output141 .= $viewHelper148->initializeArgumentsAndRender();

$output141 .= '
									';
return $output141;
};

$output138 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments139, $renderChildrenClosure140, $renderingContext);

$output138 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments149 = array();
$renderChildrenClosure150 = function() use ($renderingContext, $self) {
$output151 = '';

$output151 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments152 = array();
$arguments152['additionalAttributes'] = NULL;
$arguments152['data'] = NULL;
$arguments152['action'] = NULL;
$arguments152['arguments'] = array (
);
$arguments152['section'] = '';
$arguments152['format'] = '';
$arguments152['ajax'] = false;
$arguments152['class'] = NULL;
$arguments152['dir'] = NULL;
$arguments152['id'] = NULL;
$arguments152['lang'] = NULL;
$arguments152['style'] = NULL;
$arguments152['title'] = NULL;
$arguments152['accesskey'] = NULL;
$arguments152['tabindex'] = NULL;
$arguments152['onclick'] = NULL;
$arguments152['name'] = NULL;
$arguments152['rel'] = NULL;
$arguments152['rev'] = NULL;
$arguments152['target'] = NULL;
$arguments152['addQueryStringMethod'] = NULL;
$renderChildrenClosure153 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments154 = array();
$arguments154['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments154['keepQuotes'] = false;
$arguments154['encoding'] = NULL;
$arguments154['doubleEncode'] = true;
$renderChildrenClosure155 = function() use ($renderingContext, $self) {
return NULL;
};
$value156 = ($arguments154['value'] !== NULL ? $arguments154['value'] : $renderChildrenClosure155());
return (!is_string($value156) ? $value156 : htmlspecialchars($value156, ($arguments154['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments154['encoding'] !== NULL ? $arguments154['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments154['doubleEncode']));
};
$viewHelper157 = $self->getViewHelper('$viewHelper157', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper157->setArguments($arguments152);
$viewHelper157->setRenderingContext($renderingContext);
$viewHelper157->setRenderChildrenClosure($renderChildrenClosure153);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output151 .= $viewHelper157->initializeArgumentsAndRender();

$output151 .= '
									';
return $output151;
};

$output138 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments149, $renderChildrenClosure150, $renderingContext);

$output138 .= '
								';
return $output138;
};
$arguments136['__thenClosure'] = function() use ($renderingContext, $self) {
$output158 = '';

$output158 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments159 = array();
// Rendering Array
$array160 = array();
$array160['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments159['arguments'] = $array160;
$arguments159['additionalAttributes'] = NULL;
$arguments159['data'] = NULL;
$arguments159['action'] = NULL;
$arguments159['section'] = '';
$arguments159['format'] = '';
$arguments159['ajax'] = false;
$arguments159['class'] = NULL;
$arguments159['dir'] = NULL;
$arguments159['id'] = NULL;
$arguments159['lang'] = NULL;
$arguments159['style'] = NULL;
$arguments159['title'] = NULL;
$arguments159['accesskey'] = NULL;
$arguments159['tabindex'] = NULL;
$arguments159['onclick'] = NULL;
$arguments159['name'] = NULL;
$arguments159['rel'] = NULL;
$arguments159['rev'] = NULL;
$arguments159['target'] = NULL;
$arguments159['addQueryStringMethod'] = NULL;
$renderChildrenClosure161 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments162 = array();
$arguments162['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments162['keepQuotes'] = false;
$arguments162['encoding'] = NULL;
$arguments162['doubleEncode'] = true;
$renderChildrenClosure163 = function() use ($renderingContext, $self) {
return NULL;
};
$value164 = ($arguments162['value'] !== NULL ? $arguments162['value'] : $renderChildrenClosure163());
return (!is_string($value164) ? $value164 : htmlspecialchars($value164, ($arguments162['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments162['encoding'] !== NULL ? $arguments162['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments162['doubleEncode']));
};
$viewHelper165 = $self->getViewHelper('$viewHelper165', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper165->setArguments($arguments159);
$viewHelper165->setRenderingContext($renderingContext);
$viewHelper165->setRenderChildrenClosure($renderChildrenClosure161);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output158 .= $viewHelper165->initializeArgumentsAndRender();

$output158 .= '
									';
return $output158;
};
$arguments136['__elseClosure'] = function() use ($renderingContext, $self) {
$output166 = '';

$output166 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments167 = array();
$arguments167['additionalAttributes'] = NULL;
$arguments167['data'] = NULL;
$arguments167['action'] = NULL;
$arguments167['arguments'] = array (
);
$arguments167['section'] = '';
$arguments167['format'] = '';
$arguments167['ajax'] = false;
$arguments167['class'] = NULL;
$arguments167['dir'] = NULL;
$arguments167['id'] = NULL;
$arguments167['lang'] = NULL;
$arguments167['style'] = NULL;
$arguments167['title'] = NULL;
$arguments167['accesskey'] = NULL;
$arguments167['tabindex'] = NULL;
$arguments167['onclick'] = NULL;
$arguments167['name'] = NULL;
$arguments167['rel'] = NULL;
$arguments167['rev'] = NULL;
$arguments167['target'] = NULL;
$arguments167['addQueryStringMethod'] = NULL;
$renderChildrenClosure168 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments169 = array();
$arguments169['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments169['keepQuotes'] = false;
$arguments169['encoding'] = NULL;
$arguments169['doubleEncode'] = true;
$renderChildrenClosure170 = function() use ($renderingContext, $self) {
return NULL;
};
$value171 = ($arguments169['value'] !== NULL ? $arguments169['value'] : $renderChildrenClosure170());
return (!is_string($value171) ? $value171 : htmlspecialchars($value171, ($arguments169['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments169['encoding'] !== NULL ? $arguments169['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments169['doubleEncode']));
};
$viewHelper172 = $self->getViewHelper('$viewHelper172', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper172->setArguments($arguments167);
$viewHelper172->setRenderingContext($renderingContext);
$viewHelper172->setRenderChildrenClosure($renderChildrenClosure168);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output166 .= $viewHelper172->initializeArgumentsAndRender();

$output166 .= '
									';
return $output166;
};
$viewHelper173 = $self->getViewHelper('$viewHelper173', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper173->setArguments($arguments136);
$viewHelper173->setRenderingContext($renderingContext);
$viewHelper173->setRenderChildrenClosure($renderChildrenClosure137);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output135 .= $viewHelper173->initializeArgumentsAndRender();

$output135 .= '
							</li>
						';
return $output135;
};

$output126 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments133, $renderChildrenClosure134, $renderingContext);

$output126 .= '
					';
return $output126;
};
$arguments124['__thenClosure'] = function() use ($renderingContext, $self) {
$output174 = '';

$output174 .= '
							<li class="current">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments175 = array();
$arguments175['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments175['keepQuotes'] = false;
$arguments175['encoding'] = NULL;
$arguments175['doubleEncode'] = true;
$renderChildrenClosure176 = function() use ($renderingContext, $self) {
return NULL;
};
$value177 = ($arguments175['value'] !== NULL ? $arguments175['value'] : $renderChildrenClosure176());

$output174 .= (!is_string($value177) ? $value177 : htmlspecialchars($value177, ($arguments175['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments175['encoding'] !== NULL ? $arguments175['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments175['doubleEncode']));

$output174 .= '</li>
						';
return $output174;
};
$arguments124['__elseClosure'] = function() use ($renderingContext, $self) {
$output178 = '';

$output178 .= '
							<li>
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments179 = array();
// Rendering Boolean node
$arguments179['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('>', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext), 1);
$arguments179['then'] = NULL;
$arguments179['else'] = NULL;
$renderChildrenClosure180 = function() use ($renderingContext, $self) {
$output181 = '';

$output181 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments182 = array();
$renderChildrenClosure183 = function() use ($renderingContext, $self) {
$output184 = '';

$output184 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments185 = array();
// Rendering Array
$array186 = array();
$array186['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments185['arguments'] = $array186;
$arguments185['additionalAttributes'] = NULL;
$arguments185['data'] = NULL;
$arguments185['action'] = NULL;
$arguments185['section'] = '';
$arguments185['format'] = '';
$arguments185['ajax'] = false;
$arguments185['class'] = NULL;
$arguments185['dir'] = NULL;
$arguments185['id'] = NULL;
$arguments185['lang'] = NULL;
$arguments185['style'] = NULL;
$arguments185['title'] = NULL;
$arguments185['accesskey'] = NULL;
$arguments185['tabindex'] = NULL;
$arguments185['onclick'] = NULL;
$arguments185['name'] = NULL;
$arguments185['rel'] = NULL;
$arguments185['rev'] = NULL;
$arguments185['target'] = NULL;
$arguments185['addQueryStringMethod'] = NULL;
$renderChildrenClosure187 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments188 = array();
$arguments188['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments188['keepQuotes'] = false;
$arguments188['encoding'] = NULL;
$arguments188['doubleEncode'] = true;
$renderChildrenClosure189 = function() use ($renderingContext, $self) {
return NULL;
};
$value190 = ($arguments188['value'] !== NULL ? $arguments188['value'] : $renderChildrenClosure189());
return (!is_string($value190) ? $value190 : htmlspecialchars($value190, ($arguments188['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments188['encoding'] !== NULL ? $arguments188['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments188['doubleEncode']));
};
$viewHelper191 = $self->getViewHelper('$viewHelper191', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper191->setArguments($arguments185);
$viewHelper191->setRenderingContext($renderingContext);
$viewHelper191->setRenderChildrenClosure($renderChildrenClosure187);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output184 .= $viewHelper191->initializeArgumentsAndRender();

$output184 .= '
									';
return $output184;
};

$output181 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments182, $renderChildrenClosure183, $renderingContext);

$output181 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments192 = array();
$renderChildrenClosure193 = function() use ($renderingContext, $self) {
$output194 = '';

$output194 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments195 = array();
$arguments195['additionalAttributes'] = NULL;
$arguments195['data'] = NULL;
$arguments195['action'] = NULL;
$arguments195['arguments'] = array (
);
$arguments195['section'] = '';
$arguments195['format'] = '';
$arguments195['ajax'] = false;
$arguments195['class'] = NULL;
$arguments195['dir'] = NULL;
$arguments195['id'] = NULL;
$arguments195['lang'] = NULL;
$arguments195['style'] = NULL;
$arguments195['title'] = NULL;
$arguments195['accesskey'] = NULL;
$arguments195['tabindex'] = NULL;
$arguments195['onclick'] = NULL;
$arguments195['name'] = NULL;
$arguments195['rel'] = NULL;
$arguments195['rev'] = NULL;
$arguments195['target'] = NULL;
$arguments195['addQueryStringMethod'] = NULL;
$renderChildrenClosure196 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments197 = array();
$arguments197['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments197['keepQuotes'] = false;
$arguments197['encoding'] = NULL;
$arguments197['doubleEncode'] = true;
$renderChildrenClosure198 = function() use ($renderingContext, $self) {
return NULL;
};
$value199 = ($arguments197['value'] !== NULL ? $arguments197['value'] : $renderChildrenClosure198());
return (!is_string($value199) ? $value199 : htmlspecialchars($value199, ($arguments197['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments197['encoding'] !== NULL ? $arguments197['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments197['doubleEncode']));
};
$viewHelper200 = $self->getViewHelper('$viewHelper200', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper200->setArguments($arguments195);
$viewHelper200->setRenderingContext($renderingContext);
$viewHelper200->setRenderChildrenClosure($renderChildrenClosure196);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output194 .= $viewHelper200->initializeArgumentsAndRender();

$output194 .= '
									';
return $output194;
};

$output181 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments192, $renderChildrenClosure193, $renderingContext);

$output181 .= '
								';
return $output181;
};
$arguments179['__thenClosure'] = function() use ($renderingContext, $self) {
$output201 = '';

$output201 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments202 = array();
// Rendering Array
$array203 = array();
$array203['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments202['arguments'] = $array203;
$arguments202['additionalAttributes'] = NULL;
$arguments202['data'] = NULL;
$arguments202['action'] = NULL;
$arguments202['section'] = '';
$arguments202['format'] = '';
$arguments202['ajax'] = false;
$arguments202['class'] = NULL;
$arguments202['dir'] = NULL;
$arguments202['id'] = NULL;
$arguments202['lang'] = NULL;
$arguments202['style'] = NULL;
$arguments202['title'] = NULL;
$arguments202['accesskey'] = NULL;
$arguments202['tabindex'] = NULL;
$arguments202['onclick'] = NULL;
$arguments202['name'] = NULL;
$arguments202['rel'] = NULL;
$arguments202['rev'] = NULL;
$arguments202['target'] = NULL;
$arguments202['addQueryStringMethod'] = NULL;
$renderChildrenClosure204 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments205 = array();
$arguments205['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments205['keepQuotes'] = false;
$arguments205['encoding'] = NULL;
$arguments205['doubleEncode'] = true;
$renderChildrenClosure206 = function() use ($renderingContext, $self) {
return NULL;
};
$value207 = ($arguments205['value'] !== NULL ? $arguments205['value'] : $renderChildrenClosure206());
return (!is_string($value207) ? $value207 : htmlspecialchars($value207, ($arguments205['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments205['encoding'] !== NULL ? $arguments205['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments205['doubleEncode']));
};
$viewHelper208 = $self->getViewHelper('$viewHelper208', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper208->setArguments($arguments202);
$viewHelper208->setRenderingContext($renderingContext);
$viewHelper208->setRenderChildrenClosure($renderChildrenClosure204);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output201 .= $viewHelper208->initializeArgumentsAndRender();

$output201 .= '
									';
return $output201;
};
$arguments179['__elseClosure'] = function() use ($renderingContext, $self) {
$output209 = '';

$output209 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments210 = array();
$arguments210['additionalAttributes'] = NULL;
$arguments210['data'] = NULL;
$arguments210['action'] = NULL;
$arguments210['arguments'] = array (
);
$arguments210['section'] = '';
$arguments210['format'] = '';
$arguments210['ajax'] = false;
$arguments210['class'] = NULL;
$arguments210['dir'] = NULL;
$arguments210['id'] = NULL;
$arguments210['lang'] = NULL;
$arguments210['style'] = NULL;
$arguments210['title'] = NULL;
$arguments210['accesskey'] = NULL;
$arguments210['tabindex'] = NULL;
$arguments210['onclick'] = NULL;
$arguments210['name'] = NULL;
$arguments210['rel'] = NULL;
$arguments210['rev'] = NULL;
$arguments210['target'] = NULL;
$arguments210['addQueryStringMethod'] = NULL;
$renderChildrenClosure211 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments212 = array();
$arguments212['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments212['keepQuotes'] = false;
$arguments212['encoding'] = NULL;
$arguments212['doubleEncode'] = true;
$renderChildrenClosure213 = function() use ($renderingContext, $self) {
return NULL;
};
$value214 = ($arguments212['value'] !== NULL ? $arguments212['value'] : $renderChildrenClosure213());
return (!is_string($value214) ? $value214 : htmlspecialchars($value214, ($arguments212['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments212['encoding'] !== NULL ? $arguments212['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments212['doubleEncode']));
};
$viewHelper215 = $self->getViewHelper('$viewHelper215', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper215->setArguments($arguments210);
$viewHelper215->setRenderingContext($renderingContext);
$viewHelper215->setRenderChildrenClosure($renderChildrenClosure211);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output209 .= $viewHelper215->initializeArgumentsAndRender();

$output209 .= '
									';
return $output209;
};
$viewHelper216 = $self->getViewHelper('$viewHelper216', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper216->setArguments($arguments179);
$viewHelper216->setRenderingContext($renderingContext);
$viewHelper216->setRenderChildrenClosure($renderChildrenClosure180);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output178 .= $viewHelper216->initializeArgumentsAndRender();

$output178 .= '
							</li>
						';
return $output178;
};
$viewHelper217 = $self->getViewHelper('$viewHelper217', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper217->setArguments($arguments124);
$viewHelper217->setRenderingContext($renderingContext);
$viewHelper217->setRenderChildrenClosure($renderChildrenClosure125);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output123 .= $viewHelper217->initializeArgumentsAndRender();

$output123 .= '
				';
return $output123;
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments121, $renderChildrenClosure122, $renderingContext);

$output3 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments218 = array();
// Rendering Boolean node
$arguments218['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.hasMorePages', $renderingContext));
$arguments218['then'] = NULL;
$arguments218['else'] = NULL;
$renderChildrenClosure219 = function() use ($renderingContext, $self) {
return '
					<li>....</li>
				';
};
$viewHelper220 = $self->getViewHelper('$viewHelper220', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper220->setArguments($arguments218);
$viewHelper220->setRenderingContext($renderingContext);
$viewHelper220->setRenderChildrenClosure($renderChildrenClosure219);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output3 .= $viewHelper220->initializeArgumentsAndRender();

$output3 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments221 = array();
// Rendering Boolean node
$arguments221['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('<', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.displayRangeEnd', $renderingContext), TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.numberOfPages', $renderingContext));
$arguments221['then'] = NULL;
$arguments221['else'] = NULL;
$renderChildrenClosure222 = function() use ($renderingContext, $self) {
$output223 = '';

$output223 .= '
					<li class="last">
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments224 = array();
// Rendering Array
$array225 = array();
$array225['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.numberOfPages', $renderingContext);
$arguments224['arguments'] = $array225;
$arguments224['additionalAttributes'] = NULL;
$arguments224['data'] = NULL;
$arguments224['action'] = NULL;
$arguments224['section'] = '';
$arguments224['format'] = '';
$arguments224['ajax'] = false;
$arguments224['class'] = NULL;
$arguments224['dir'] = NULL;
$arguments224['id'] = NULL;
$arguments224['lang'] = NULL;
$arguments224['style'] = NULL;
$arguments224['title'] = NULL;
$arguments224['accesskey'] = NULL;
$arguments224['tabindex'] = NULL;
$arguments224['onclick'] = NULL;
$arguments224['name'] = NULL;
$arguments224['rel'] = NULL;
$arguments224['rev'] = NULL;
$arguments224['target'] = NULL;
$arguments224['addQueryStringMethod'] = NULL;
$renderChildrenClosure226 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments227 = array();
$arguments227['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.numberOfPages', $renderingContext);
$arguments227['keepQuotes'] = false;
$arguments227['encoding'] = NULL;
$arguments227['doubleEncode'] = true;
$renderChildrenClosure228 = function() use ($renderingContext, $self) {
return NULL;
};
$value229 = ($arguments227['value'] !== NULL ? $arguments227['value'] : $renderChildrenClosure228());
return (!is_string($value229) ? $value229 : htmlspecialchars($value229, ($arguments227['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments227['encoding'] !== NULL ? $arguments227['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments227['doubleEncode']));
};
$viewHelper230 = $self->getViewHelper('$viewHelper230', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper230->setArguments($arguments224);
$viewHelper230->setRenderingContext($renderingContext);
$viewHelper230->setRenderChildrenClosure($renderChildrenClosure226);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output223 .= $viewHelper230->initializeArgumentsAndRender();

$output223 .= '
					</li>
				';
return $output223;
};
$viewHelper231 = $self->getViewHelper('$viewHelper231', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper231->setArguments($arguments221);
$viewHelper231->setRenderingContext($renderingContext);
$viewHelper231->setRenderChildrenClosure($renderChildrenClosure222);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output3 .= $viewHelper231->initializeArgumentsAndRender();

$output3 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments232 = array();
// Rendering Boolean node
$arguments232['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.nextPage', $renderingContext));
$arguments232['then'] = NULL;
$arguments232['else'] = NULL;
$renderChildrenClosure233 = function() use ($renderingContext, $self) {
$output234 = '';

$output234 .= '
					<li class="last next">
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments235 = array();
// Rendering Array
$array236 = array();
$array236['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.nextPage', $renderingContext);
$arguments235['arguments'] = $array236;
$arguments235['additionalAttributes'] = NULL;
$arguments235['data'] = NULL;
$arguments235['action'] = NULL;
$arguments235['section'] = '';
$arguments235['format'] = '';
$arguments235['ajax'] = false;
$arguments235['class'] = NULL;
$arguments235['dir'] = NULL;
$arguments235['id'] = NULL;
$arguments235['lang'] = NULL;
$arguments235['style'] = NULL;
$arguments235['title'] = NULL;
$arguments235['accesskey'] = NULL;
$arguments235['tabindex'] = NULL;
$arguments235['onclick'] = NULL;
$arguments235['name'] = NULL;
$arguments235['rel'] = NULL;
$arguments235['rev'] = NULL;
$arguments235['target'] = NULL;
$arguments235['addQueryStringMethod'] = NULL;
$renderChildrenClosure237 = function() use ($renderingContext, $self) {
$output238 = '';

$output238 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments239 = array();
$arguments239['key'] = 'paginate_next';
$arguments239['id'] = NULL;
$arguments239['default'] = NULL;
$arguments239['htmlEscape'] = NULL;
$arguments239['arguments'] = NULL;
$arguments239['extensionName'] = NULL;
$renderChildrenClosure240 = function() use ($renderingContext, $self) {
return NULL;
};

$output238 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments239, $renderChildrenClosure240, $renderingContext);

$output238 .= '
						';
return $output238;
};
$viewHelper241 = $self->getViewHelper('$viewHelper241', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper241->setArguments($arguments235);
$viewHelper241->setRenderingContext($renderingContext);
$viewHelper241->setRenderChildrenClosure($renderChildrenClosure237);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output234 .= $viewHelper241->initializeArgumentsAndRender();

$output234 .= '
					</li>
				';
return $output234;
};
$viewHelper242 = $self->getViewHelper('$viewHelper242', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper242->setArguments($arguments232);
$viewHelper242->setRenderingContext($renderingContext);
$viewHelper242->setRenderChildrenClosure($renderChildrenClosure233);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output3 .= $viewHelper242->initializeArgumentsAndRender();

$output3 .= '
			</ul>
		</div>
		<div class="news-clear"></div>
	';
return $output3;
};
$viewHelper243 = $self->getViewHelper('$viewHelper243', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper243->setArguments($arguments1);
$viewHelper243->setRenderingContext($renderingContext);
$viewHelper243->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper243->initializeArgumentsAndRender();

$output0 .= '
';

return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output244 = '';

$output244 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments245 = array();
// Rendering Boolean node
$arguments245['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'configuration.insertAbove', $renderingContext));
$arguments245['then'] = NULL;
$arguments245['else'] = NULL;
$renderChildrenClosure246 = function() use ($renderingContext, $self) {
$output247 = '';

$output247 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments248 = array();
$arguments248['section'] = 'paginator';
// Rendering Array
$array249 = array();
$array249['pagination'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination', $renderingContext);
$array249['configuration'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'configuration', $renderingContext);
$arguments248['arguments'] = $array249;
$arguments248['partial'] = NULL;
$arguments248['optional'] = false;
$renderChildrenClosure250 = function() use ($renderingContext, $self) {
return NULL;
};

$output247 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments248, $renderChildrenClosure250, $renderingContext);

$output247 .= '
';
return $output247;
};
$viewHelper251 = $self->getViewHelper('$viewHelper251', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper251->setArguments($arguments245);
$viewHelper251->setRenderingContext($renderingContext);
$viewHelper251->setRenderChildrenClosure($renderChildrenClosure246);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output244 .= $viewHelper251->initializeArgumentsAndRender();

$output244 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderChildrenViewHelper
$arguments252 = array();
$arguments252['arguments'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'contentArguments', $renderingContext);
$renderChildrenClosure253 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper254 = $self->getViewHelper('$viewHelper254', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\RenderChildrenViewHelper');
$viewHelper254->setArguments($arguments252);
$viewHelper254->setRenderingContext($renderingContext);
$viewHelper254->setRenderChildrenClosure($renderChildrenClosure253);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderChildrenViewHelper

$output244 .= $viewHelper254->initializeArgumentsAndRender();

$output244 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments255 = array();
// Rendering Boolean node
$arguments255['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'configuration.insertBelow', $renderingContext));
$arguments255['then'] = NULL;
$arguments255['else'] = NULL;
$renderChildrenClosure256 = function() use ($renderingContext, $self) {
$output257 = '';

$output257 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments258 = array();
$arguments258['section'] = 'paginator';
// Rendering Array
$array259 = array();
$array259['pagination'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination', $renderingContext);
$array259['configuration'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'configuration', $renderingContext);
$arguments258['arguments'] = $array259;
$arguments258['partial'] = NULL;
$arguments258['optional'] = false;
$renderChildrenClosure260 = function() use ($renderingContext, $self) {
return NULL;
};

$output257 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments258, $renderChildrenClosure260, $renderingContext);

$output257 .= '
';
return $output257;
};
$viewHelper261 = $self->getViewHelper('$viewHelper261', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper261->setArguments($arguments255);
$viewHelper261->setRenderingContext($renderingContext);
$viewHelper261->setRenderChildrenClosure($renderChildrenClosure256);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output244 .= $viewHelper261->initializeArgumentsAndRender();

$output244 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments262 = array();
$arguments262['name'] = 'paginator';
$renderChildrenClosure263 = function() use ($renderingContext, $self) {
$output264 = '';

$output264 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments265 = array();
// Rendering Boolean node
$arguments265['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('>', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.numberOfPages', $renderingContext), 1);
$arguments265['then'] = NULL;
$arguments265['else'] = NULL;
$renderChildrenClosure266 = function() use ($renderingContext, $self) {
$output267 = '';

$output267 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments268 = array();
// Rendering Boolean node
$arguments268['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'settings.list.paginate', $renderingContext));
$arguments268['then'] = NULL;
$arguments268['else'] = NULL;
$renderChildrenClosure269 = function() use ($renderingContext, $self) {
$output270 = '';

$output270 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments271 = array();
// Rendering Boolean node
$arguments271['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.previousPage', $renderingContext));
$arguments271['then'] = NULL;
$arguments271['else'] = NULL;
$renderChildrenClosure272 = function() use ($renderingContext, $self) {
$output273 = '';

$output273 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments274 = array();
// Rendering Boolean node
$arguments274['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('>', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.previousPage', $renderingContext), 1);
$arguments274['then'] = NULL;
$arguments274['else'] = NULL;
$renderChildrenClosure275 = function() use ($renderingContext, $self) {
$output276 = '';

$output276 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments277 = array();
$renderChildrenClosure278 = function() use ($renderingContext, $self) {
$output279 = '';

$output279 .= '
						';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\HeaderDataViewHelper
$arguments280 = array();
$renderChildrenClosure281 = function() use ($renderingContext, $self) {
$output282 = '';

$output282 .= '<link rel="prev" href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments283 = array();
// Rendering Array
$array284 = array();
$array284['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.previousPage', $renderingContext);
$arguments283['arguments'] = $array284;
$arguments283['action'] = NULL;
$arguments283['section'] = '';
$arguments283['format'] = '';
$arguments283['ajax'] = false;
$arguments283['addQueryStringMethod'] = NULL;
$renderChildrenClosure285 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper286 = $self->getViewHelper('$viewHelper286', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper286->setArguments($arguments283);
$viewHelper286->setRenderingContext($renderingContext);
$viewHelper286->setRenderChildrenClosure($renderChildrenClosure285);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output282 .= $viewHelper286->initializeArgumentsAndRender();

$output282 .= '" />';
return $output282;
};
$viewHelper287 = $self->getViewHelper('$viewHelper287', $renderingContext, 'GeorgRinger\News\ViewHelpers\HeaderDataViewHelper');
$viewHelper287->setArguments($arguments280);
$viewHelper287->setRenderingContext($renderingContext);
$viewHelper287->setRenderChildrenClosure($renderChildrenClosure281);
// End of ViewHelper GeorgRinger\News\ViewHelpers\HeaderDataViewHelper

$output279 .= $viewHelper287->initializeArgumentsAndRender();

$output279 .= '
					';
return $output279;
};

$output276 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments277, $renderChildrenClosure278, $renderingContext);

$output276 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments288 = array();
$renderChildrenClosure289 = function() use ($renderingContext, $self) {
$output290 = '';

$output290 .= '
						';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\HeaderDataViewHelper
$arguments291 = array();
$renderChildrenClosure292 = function() use ($renderingContext, $self) {
$output293 = '';

$output293 .= '<link rel="prev" href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments294 = array();
$arguments294['action'] = NULL;
$arguments294['arguments'] = array (
);
$arguments294['section'] = '';
$arguments294['format'] = '';
$arguments294['ajax'] = false;
$arguments294['addQueryStringMethod'] = NULL;
$renderChildrenClosure295 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper296 = $self->getViewHelper('$viewHelper296', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper296->setArguments($arguments294);
$viewHelper296->setRenderingContext($renderingContext);
$viewHelper296->setRenderChildrenClosure($renderChildrenClosure295);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output293 .= $viewHelper296->initializeArgumentsAndRender();

$output293 .= '" />';
return $output293;
};
$viewHelper297 = $self->getViewHelper('$viewHelper297', $renderingContext, 'GeorgRinger\News\ViewHelpers\HeaderDataViewHelper');
$viewHelper297->setArguments($arguments291);
$viewHelper297->setRenderingContext($renderingContext);
$viewHelper297->setRenderChildrenClosure($renderChildrenClosure292);
// End of ViewHelper GeorgRinger\News\ViewHelpers\HeaderDataViewHelper

$output290 .= $viewHelper297->initializeArgumentsAndRender();

$output290 .= '
					';
return $output290;
};

$output276 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments288, $renderChildrenClosure289, $renderingContext);

$output276 .= '
				';
return $output276;
};
$arguments274['__thenClosure'] = function() use ($renderingContext, $self) {
$output298 = '';

$output298 .= '
						';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\HeaderDataViewHelper
$arguments299 = array();
$renderChildrenClosure300 = function() use ($renderingContext, $self) {
$output301 = '';

$output301 .= '<link rel="prev" href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments302 = array();
// Rendering Array
$array303 = array();
$array303['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.previousPage', $renderingContext);
$arguments302['arguments'] = $array303;
$arguments302['action'] = NULL;
$arguments302['section'] = '';
$arguments302['format'] = '';
$arguments302['ajax'] = false;
$arguments302['addQueryStringMethod'] = NULL;
$renderChildrenClosure304 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper305 = $self->getViewHelper('$viewHelper305', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper305->setArguments($arguments302);
$viewHelper305->setRenderingContext($renderingContext);
$viewHelper305->setRenderChildrenClosure($renderChildrenClosure304);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output301 .= $viewHelper305->initializeArgumentsAndRender();

$output301 .= '" />';
return $output301;
};
$viewHelper306 = $self->getViewHelper('$viewHelper306', $renderingContext, 'GeorgRinger\News\ViewHelpers\HeaderDataViewHelper');
$viewHelper306->setArguments($arguments299);
$viewHelper306->setRenderingContext($renderingContext);
$viewHelper306->setRenderChildrenClosure($renderChildrenClosure300);
// End of ViewHelper GeorgRinger\News\ViewHelpers\HeaderDataViewHelper

$output298 .= $viewHelper306->initializeArgumentsAndRender();

$output298 .= '
					';
return $output298;
};
$arguments274['__elseClosure'] = function() use ($renderingContext, $self) {
$output307 = '';

$output307 .= '
						';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\HeaderDataViewHelper
$arguments308 = array();
$renderChildrenClosure309 = function() use ($renderingContext, $self) {
$output310 = '';

$output310 .= '<link rel="prev" href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments311 = array();
$arguments311['action'] = NULL;
$arguments311['arguments'] = array (
);
$arguments311['section'] = '';
$arguments311['format'] = '';
$arguments311['ajax'] = false;
$arguments311['addQueryStringMethod'] = NULL;
$renderChildrenClosure312 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper313 = $self->getViewHelper('$viewHelper313', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper313->setArguments($arguments311);
$viewHelper313->setRenderingContext($renderingContext);
$viewHelper313->setRenderChildrenClosure($renderChildrenClosure312);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output310 .= $viewHelper313->initializeArgumentsAndRender();

$output310 .= '" />';
return $output310;
};
$viewHelper314 = $self->getViewHelper('$viewHelper314', $renderingContext, 'GeorgRinger\News\ViewHelpers\HeaderDataViewHelper');
$viewHelper314->setArguments($arguments308);
$viewHelper314->setRenderingContext($renderingContext);
$viewHelper314->setRenderChildrenClosure($renderChildrenClosure309);
// End of ViewHelper GeorgRinger\News\ViewHelpers\HeaderDataViewHelper

$output307 .= $viewHelper314->initializeArgumentsAndRender();

$output307 .= '
					';
return $output307;
};
$viewHelper315 = $self->getViewHelper('$viewHelper315', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper315->setArguments($arguments274);
$viewHelper315->setRenderingContext($renderingContext);
$viewHelper315->setRenderChildrenClosure($renderChildrenClosure275);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output273 .= $viewHelper315->initializeArgumentsAndRender();

$output273 .= '
			';
return $output273;
};
$viewHelper316 = $self->getViewHelper('$viewHelper316', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper316->setArguments($arguments271);
$viewHelper316->setRenderingContext($renderingContext);
$viewHelper316->setRenderChildrenClosure($renderChildrenClosure272);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output270 .= $viewHelper316->initializeArgumentsAndRender();

$output270 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments317 = array();
// Rendering Boolean node
$arguments317['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.nextPage', $renderingContext));
$arguments317['then'] = NULL;
$arguments317['else'] = NULL;
$renderChildrenClosure318 = function() use ($renderingContext, $self) {
$output319 = '';

$output319 .= '
				';
// Rendering ViewHelper GeorgRinger\News\ViewHelpers\HeaderDataViewHelper
$arguments320 = array();
$renderChildrenClosure321 = function() use ($renderingContext, $self) {
$output322 = '';

$output322 .= '<link rel="next" href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments323 = array();
// Rendering Array
$array324 = array();
$array324['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.nextPage', $renderingContext);
$arguments323['arguments'] = $array324;
$arguments323['action'] = NULL;
$arguments323['section'] = '';
$arguments323['format'] = '';
$arguments323['ajax'] = false;
$arguments323['addQueryStringMethod'] = NULL;
$renderChildrenClosure325 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper326 = $self->getViewHelper('$viewHelper326', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper326->setArguments($arguments323);
$viewHelper326->setRenderingContext($renderingContext);
$viewHelper326->setRenderChildrenClosure($renderChildrenClosure325);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output322 .= $viewHelper326->initializeArgumentsAndRender();

$output322 .= '" />';
return $output322;
};
$viewHelper327 = $self->getViewHelper('$viewHelper327', $renderingContext, 'GeorgRinger\News\ViewHelpers\HeaderDataViewHelper');
$viewHelper327->setArguments($arguments320);
$viewHelper327->setRenderingContext($renderingContext);
$viewHelper327->setRenderChildrenClosure($renderChildrenClosure321);
// End of ViewHelper GeorgRinger\News\ViewHelpers\HeaderDataViewHelper

$output319 .= $viewHelper327->initializeArgumentsAndRender();

$output319 .= '
			';
return $output319;
};
$viewHelper328 = $self->getViewHelper('$viewHelper328', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper328->setArguments($arguments317);
$viewHelper328->setRenderingContext($renderingContext);
$viewHelper328->setRenderChildrenClosure($renderChildrenClosure318);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output270 .= $viewHelper328->initializeArgumentsAndRender();

$output270 .= '
		';
return $output270;
};
$viewHelper329 = $self->getViewHelper('$viewHelper329', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper329->setArguments($arguments268);
$viewHelper329->setRenderingContext($renderingContext);
$viewHelper329->setRenderChildrenClosure($renderChildrenClosure269);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output267 .= $viewHelper329->initializeArgumentsAndRender();

$output267 .= '

		<div class="page-navigation">
			<p>
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments330 = array();
$arguments330['key'] = 'paginate_overall';
// Rendering Array
$array331 = array();
$array331['0'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.current', $renderingContext);
$array331['1'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.numberOfPages', $renderingContext);
$arguments330['arguments'] = $array331;
$arguments330['id'] = NULL;
$arguments330['default'] = NULL;
$arguments330['htmlEscape'] = NULL;
$arguments330['extensionName'] = NULL;
$renderChildrenClosure332 = function() use ($renderingContext, $self) {
return NULL;
};

$output267 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments330, $renderChildrenClosure332, $renderingContext);

$output267 .= '
			</p>
			<ul class="f3-widget-paginator">
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments333 = array();
// Rendering Boolean node
$arguments333['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.previousPage', $renderingContext));
$arguments333['then'] = NULL;
$arguments333['else'] = NULL;
$renderChildrenClosure334 = function() use ($renderingContext, $self) {
$output335 = '';

$output335 .= '
					<li class="previous">
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments336 = array();
// Rendering Boolean node
$arguments336['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('>', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.previousPage', $renderingContext), 1);
$arguments336['then'] = NULL;
$arguments336['else'] = NULL;
$renderChildrenClosure337 = function() use ($renderingContext, $self) {
$output338 = '';

$output338 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments339 = array();
$renderChildrenClosure340 = function() use ($renderingContext, $self) {
$output341 = '';

$output341 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments342 = array();
// Rendering Array
$array343 = array();
$array343['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.previousPage', $renderingContext);
$arguments342['arguments'] = $array343;
$arguments342['additionalAttributes'] = NULL;
$arguments342['data'] = NULL;
$arguments342['action'] = NULL;
$arguments342['section'] = '';
$arguments342['format'] = '';
$arguments342['ajax'] = false;
$arguments342['class'] = NULL;
$arguments342['dir'] = NULL;
$arguments342['id'] = NULL;
$arguments342['lang'] = NULL;
$arguments342['style'] = NULL;
$arguments342['title'] = NULL;
$arguments342['accesskey'] = NULL;
$arguments342['tabindex'] = NULL;
$arguments342['onclick'] = NULL;
$arguments342['name'] = NULL;
$arguments342['rel'] = NULL;
$arguments342['rev'] = NULL;
$arguments342['target'] = NULL;
$arguments342['addQueryStringMethod'] = NULL;
$renderChildrenClosure344 = function() use ($renderingContext, $self) {
$output345 = '';

$output345 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments346 = array();
$arguments346['key'] = 'paginate_previous';
$arguments346['id'] = NULL;
$arguments346['default'] = NULL;
$arguments346['htmlEscape'] = NULL;
$arguments346['arguments'] = NULL;
$arguments346['extensionName'] = NULL;
$renderChildrenClosure347 = function() use ($renderingContext, $self) {
return NULL;
};

$output345 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments346, $renderChildrenClosure347, $renderingContext);

$output345 .= '
								';
return $output345;
};
$viewHelper348 = $self->getViewHelper('$viewHelper348', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper348->setArguments($arguments342);
$viewHelper348->setRenderingContext($renderingContext);
$viewHelper348->setRenderChildrenClosure($renderChildrenClosure344);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output341 .= $viewHelper348->initializeArgumentsAndRender();

$output341 .= '
							';
return $output341;
};

$output338 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments339, $renderChildrenClosure340, $renderingContext);

$output338 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments349 = array();
$renderChildrenClosure350 = function() use ($renderingContext, $self) {
$output351 = '';

$output351 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments352 = array();
$arguments352['additionalAttributes'] = NULL;
$arguments352['data'] = NULL;
$arguments352['action'] = NULL;
$arguments352['arguments'] = array (
);
$arguments352['section'] = '';
$arguments352['format'] = '';
$arguments352['ajax'] = false;
$arguments352['class'] = NULL;
$arguments352['dir'] = NULL;
$arguments352['id'] = NULL;
$arguments352['lang'] = NULL;
$arguments352['style'] = NULL;
$arguments352['title'] = NULL;
$arguments352['accesskey'] = NULL;
$arguments352['tabindex'] = NULL;
$arguments352['onclick'] = NULL;
$arguments352['name'] = NULL;
$arguments352['rel'] = NULL;
$arguments352['rev'] = NULL;
$arguments352['target'] = NULL;
$arguments352['addQueryStringMethod'] = NULL;
$renderChildrenClosure353 = function() use ($renderingContext, $self) {
$output354 = '';

$output354 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments355 = array();
$arguments355['key'] = 'paginate_previous';
$arguments355['id'] = NULL;
$arguments355['default'] = NULL;
$arguments355['htmlEscape'] = NULL;
$arguments355['arguments'] = NULL;
$arguments355['extensionName'] = NULL;
$renderChildrenClosure356 = function() use ($renderingContext, $self) {
return NULL;
};

$output354 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments355, $renderChildrenClosure356, $renderingContext);

$output354 .= '
								';
return $output354;
};
$viewHelper357 = $self->getViewHelper('$viewHelper357', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper357->setArguments($arguments352);
$viewHelper357->setRenderingContext($renderingContext);
$viewHelper357->setRenderChildrenClosure($renderChildrenClosure353);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output351 .= $viewHelper357->initializeArgumentsAndRender();

$output351 .= '
							';
return $output351;
};

$output338 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments349, $renderChildrenClosure350, $renderingContext);

$output338 .= '
						';
return $output338;
};
$arguments336['__thenClosure'] = function() use ($renderingContext, $self) {
$output358 = '';

$output358 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments359 = array();
// Rendering Array
$array360 = array();
$array360['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.previousPage', $renderingContext);
$arguments359['arguments'] = $array360;
$arguments359['additionalAttributes'] = NULL;
$arguments359['data'] = NULL;
$arguments359['action'] = NULL;
$arguments359['section'] = '';
$arguments359['format'] = '';
$arguments359['ajax'] = false;
$arguments359['class'] = NULL;
$arguments359['dir'] = NULL;
$arguments359['id'] = NULL;
$arguments359['lang'] = NULL;
$arguments359['style'] = NULL;
$arguments359['title'] = NULL;
$arguments359['accesskey'] = NULL;
$arguments359['tabindex'] = NULL;
$arguments359['onclick'] = NULL;
$arguments359['name'] = NULL;
$arguments359['rel'] = NULL;
$arguments359['rev'] = NULL;
$arguments359['target'] = NULL;
$arguments359['addQueryStringMethod'] = NULL;
$renderChildrenClosure361 = function() use ($renderingContext, $self) {
$output362 = '';

$output362 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments363 = array();
$arguments363['key'] = 'paginate_previous';
$arguments363['id'] = NULL;
$arguments363['default'] = NULL;
$arguments363['htmlEscape'] = NULL;
$arguments363['arguments'] = NULL;
$arguments363['extensionName'] = NULL;
$renderChildrenClosure364 = function() use ($renderingContext, $self) {
return NULL;
};

$output362 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments363, $renderChildrenClosure364, $renderingContext);

$output362 .= '
								';
return $output362;
};
$viewHelper365 = $self->getViewHelper('$viewHelper365', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper365->setArguments($arguments359);
$viewHelper365->setRenderingContext($renderingContext);
$viewHelper365->setRenderChildrenClosure($renderChildrenClosure361);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output358 .= $viewHelper365->initializeArgumentsAndRender();

$output358 .= '
							';
return $output358;
};
$arguments336['__elseClosure'] = function() use ($renderingContext, $self) {
$output366 = '';

$output366 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments367 = array();
$arguments367['additionalAttributes'] = NULL;
$arguments367['data'] = NULL;
$arguments367['action'] = NULL;
$arguments367['arguments'] = array (
);
$arguments367['section'] = '';
$arguments367['format'] = '';
$arguments367['ajax'] = false;
$arguments367['class'] = NULL;
$arguments367['dir'] = NULL;
$arguments367['id'] = NULL;
$arguments367['lang'] = NULL;
$arguments367['style'] = NULL;
$arguments367['title'] = NULL;
$arguments367['accesskey'] = NULL;
$arguments367['tabindex'] = NULL;
$arguments367['onclick'] = NULL;
$arguments367['name'] = NULL;
$arguments367['rel'] = NULL;
$arguments367['rev'] = NULL;
$arguments367['target'] = NULL;
$arguments367['addQueryStringMethod'] = NULL;
$renderChildrenClosure368 = function() use ($renderingContext, $self) {
$output369 = '';

$output369 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments370 = array();
$arguments370['key'] = 'paginate_previous';
$arguments370['id'] = NULL;
$arguments370['default'] = NULL;
$arguments370['htmlEscape'] = NULL;
$arguments370['arguments'] = NULL;
$arguments370['extensionName'] = NULL;
$renderChildrenClosure371 = function() use ($renderingContext, $self) {
return NULL;
};

$output369 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments370, $renderChildrenClosure371, $renderingContext);

$output369 .= '
								';
return $output369;
};
$viewHelper372 = $self->getViewHelper('$viewHelper372', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper372->setArguments($arguments367);
$viewHelper372->setRenderingContext($renderingContext);
$viewHelper372->setRenderChildrenClosure($renderChildrenClosure368);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output366 .= $viewHelper372->initializeArgumentsAndRender();

$output366 .= '
							';
return $output366;
};
$viewHelper373 = $self->getViewHelper('$viewHelper373', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper373->setArguments($arguments336);
$viewHelper373->setRenderingContext($renderingContext);
$viewHelper373->setRenderChildrenClosure($renderChildrenClosure337);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output335 .= $viewHelper373->initializeArgumentsAndRender();

$output335 .= '
					</li>
				';
return $output335;
};
$viewHelper374 = $self->getViewHelper('$viewHelper374', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper374->setArguments($arguments333);
$viewHelper374->setRenderingContext($renderingContext);
$viewHelper374->setRenderChildrenClosure($renderChildrenClosure334);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output267 .= $viewHelper374->initializeArgumentsAndRender();

$output267 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments375 = array();
// Rendering Boolean node
$arguments375['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('>', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.displayRangeStart', $renderingContext), 1);
$arguments375['then'] = NULL;
$arguments375['else'] = NULL;
$renderChildrenClosure376 = function() use ($renderingContext, $self) {
$output377 = '';

$output377 .= '
					<li class="first">
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments378 = array();
$arguments378['additionalAttributes'] = NULL;
$arguments378['data'] = NULL;
$arguments378['action'] = NULL;
$arguments378['arguments'] = array (
);
$arguments378['section'] = '';
$arguments378['format'] = '';
$arguments378['ajax'] = false;
$arguments378['class'] = NULL;
$arguments378['dir'] = NULL;
$arguments378['id'] = NULL;
$arguments378['lang'] = NULL;
$arguments378['style'] = NULL;
$arguments378['title'] = NULL;
$arguments378['accesskey'] = NULL;
$arguments378['tabindex'] = NULL;
$arguments378['onclick'] = NULL;
$arguments378['name'] = NULL;
$arguments378['rel'] = NULL;
$arguments378['rev'] = NULL;
$arguments378['target'] = NULL;
$arguments378['addQueryStringMethod'] = NULL;
$renderChildrenClosure379 = function() use ($renderingContext, $self) {
return '1';
};
$viewHelper380 = $self->getViewHelper('$viewHelper380', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper380->setArguments($arguments378);
$viewHelper380->setRenderingContext($renderingContext);
$viewHelper380->setRenderChildrenClosure($renderChildrenClosure379);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output377 .= $viewHelper380->initializeArgumentsAndRender();

$output377 .= '
					</li>
				';
return $output377;
};
$viewHelper381 = $self->getViewHelper('$viewHelper381', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper381->setArguments($arguments375);
$viewHelper381->setRenderingContext($renderingContext);
$viewHelper381->setRenderChildrenClosure($renderChildrenClosure376);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output267 .= $viewHelper381->initializeArgumentsAndRender();

$output267 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments382 = array();
// Rendering Boolean node
$arguments382['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.hasLessPages', $renderingContext));
$arguments382['then'] = NULL;
$arguments382['else'] = NULL;
$renderChildrenClosure383 = function() use ($renderingContext, $self) {
return '
					<li>....</li>
				';
};
$viewHelper384 = $self->getViewHelper('$viewHelper384', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper384->setArguments($arguments382);
$viewHelper384->setRenderingContext($renderingContext);
$viewHelper384->setRenderChildrenClosure($renderChildrenClosure383);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output267 .= $viewHelper384->initializeArgumentsAndRender();

$output267 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments385 = array();
$arguments385['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.pages', $renderingContext);
$arguments385['as'] = 'page';
$arguments385['key'] = '';
$arguments385['reverse'] = false;
$arguments385['iteration'] = NULL;
$renderChildrenClosure386 = function() use ($renderingContext, $self) {
$output387 = '';

$output387 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments388 = array();
// Rendering Boolean node
$arguments388['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.isCurrent', $renderingContext));
$arguments388['then'] = NULL;
$arguments388['else'] = NULL;
$renderChildrenClosure389 = function() use ($renderingContext, $self) {
$output390 = '';

$output390 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments391 = array();
$renderChildrenClosure392 = function() use ($renderingContext, $self) {
$output393 = '';

$output393 .= '
							<li class="current">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments394 = array();
$arguments394['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments394['keepQuotes'] = false;
$arguments394['encoding'] = NULL;
$arguments394['doubleEncode'] = true;
$renderChildrenClosure395 = function() use ($renderingContext, $self) {
return NULL;
};
$value396 = ($arguments394['value'] !== NULL ? $arguments394['value'] : $renderChildrenClosure395());

$output393 .= (!is_string($value396) ? $value396 : htmlspecialchars($value396, ($arguments394['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments394['encoding'] !== NULL ? $arguments394['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments394['doubleEncode']));

$output393 .= '</li>
						';
return $output393;
};

$output390 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments391, $renderChildrenClosure392, $renderingContext);

$output390 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments397 = array();
$renderChildrenClosure398 = function() use ($renderingContext, $self) {
$output399 = '';

$output399 .= '
							<li>
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments400 = array();
// Rendering Boolean node
$arguments400['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('>', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext), 1);
$arguments400['then'] = NULL;
$arguments400['else'] = NULL;
$renderChildrenClosure401 = function() use ($renderingContext, $self) {
$output402 = '';

$output402 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments403 = array();
$renderChildrenClosure404 = function() use ($renderingContext, $self) {
$output405 = '';

$output405 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments406 = array();
// Rendering Array
$array407 = array();
$array407['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments406['arguments'] = $array407;
$arguments406['additionalAttributes'] = NULL;
$arguments406['data'] = NULL;
$arguments406['action'] = NULL;
$arguments406['section'] = '';
$arguments406['format'] = '';
$arguments406['ajax'] = false;
$arguments406['class'] = NULL;
$arguments406['dir'] = NULL;
$arguments406['id'] = NULL;
$arguments406['lang'] = NULL;
$arguments406['style'] = NULL;
$arguments406['title'] = NULL;
$arguments406['accesskey'] = NULL;
$arguments406['tabindex'] = NULL;
$arguments406['onclick'] = NULL;
$arguments406['name'] = NULL;
$arguments406['rel'] = NULL;
$arguments406['rev'] = NULL;
$arguments406['target'] = NULL;
$arguments406['addQueryStringMethod'] = NULL;
$renderChildrenClosure408 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments409 = array();
$arguments409['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments409['keepQuotes'] = false;
$arguments409['encoding'] = NULL;
$arguments409['doubleEncode'] = true;
$renderChildrenClosure410 = function() use ($renderingContext, $self) {
return NULL;
};
$value411 = ($arguments409['value'] !== NULL ? $arguments409['value'] : $renderChildrenClosure410());
return (!is_string($value411) ? $value411 : htmlspecialchars($value411, ($arguments409['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments409['encoding'] !== NULL ? $arguments409['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments409['doubleEncode']));
};
$viewHelper412 = $self->getViewHelper('$viewHelper412', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper412->setArguments($arguments406);
$viewHelper412->setRenderingContext($renderingContext);
$viewHelper412->setRenderChildrenClosure($renderChildrenClosure408);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output405 .= $viewHelper412->initializeArgumentsAndRender();

$output405 .= '
									';
return $output405;
};

$output402 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments403, $renderChildrenClosure404, $renderingContext);

$output402 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments413 = array();
$renderChildrenClosure414 = function() use ($renderingContext, $self) {
$output415 = '';

$output415 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments416 = array();
$arguments416['additionalAttributes'] = NULL;
$arguments416['data'] = NULL;
$arguments416['action'] = NULL;
$arguments416['arguments'] = array (
);
$arguments416['section'] = '';
$arguments416['format'] = '';
$arguments416['ajax'] = false;
$arguments416['class'] = NULL;
$arguments416['dir'] = NULL;
$arguments416['id'] = NULL;
$arguments416['lang'] = NULL;
$arguments416['style'] = NULL;
$arguments416['title'] = NULL;
$arguments416['accesskey'] = NULL;
$arguments416['tabindex'] = NULL;
$arguments416['onclick'] = NULL;
$arguments416['name'] = NULL;
$arguments416['rel'] = NULL;
$arguments416['rev'] = NULL;
$arguments416['target'] = NULL;
$arguments416['addQueryStringMethod'] = NULL;
$renderChildrenClosure417 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments418 = array();
$arguments418['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments418['keepQuotes'] = false;
$arguments418['encoding'] = NULL;
$arguments418['doubleEncode'] = true;
$renderChildrenClosure419 = function() use ($renderingContext, $self) {
return NULL;
};
$value420 = ($arguments418['value'] !== NULL ? $arguments418['value'] : $renderChildrenClosure419());
return (!is_string($value420) ? $value420 : htmlspecialchars($value420, ($arguments418['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments418['encoding'] !== NULL ? $arguments418['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments418['doubleEncode']));
};
$viewHelper421 = $self->getViewHelper('$viewHelper421', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper421->setArguments($arguments416);
$viewHelper421->setRenderingContext($renderingContext);
$viewHelper421->setRenderChildrenClosure($renderChildrenClosure417);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output415 .= $viewHelper421->initializeArgumentsAndRender();

$output415 .= '
									';
return $output415;
};

$output402 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments413, $renderChildrenClosure414, $renderingContext);

$output402 .= '
								';
return $output402;
};
$arguments400['__thenClosure'] = function() use ($renderingContext, $self) {
$output422 = '';

$output422 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments423 = array();
// Rendering Array
$array424 = array();
$array424['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments423['arguments'] = $array424;
$arguments423['additionalAttributes'] = NULL;
$arguments423['data'] = NULL;
$arguments423['action'] = NULL;
$arguments423['section'] = '';
$arguments423['format'] = '';
$arguments423['ajax'] = false;
$arguments423['class'] = NULL;
$arguments423['dir'] = NULL;
$arguments423['id'] = NULL;
$arguments423['lang'] = NULL;
$arguments423['style'] = NULL;
$arguments423['title'] = NULL;
$arguments423['accesskey'] = NULL;
$arguments423['tabindex'] = NULL;
$arguments423['onclick'] = NULL;
$arguments423['name'] = NULL;
$arguments423['rel'] = NULL;
$arguments423['rev'] = NULL;
$arguments423['target'] = NULL;
$arguments423['addQueryStringMethod'] = NULL;
$renderChildrenClosure425 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments426 = array();
$arguments426['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments426['keepQuotes'] = false;
$arguments426['encoding'] = NULL;
$arguments426['doubleEncode'] = true;
$renderChildrenClosure427 = function() use ($renderingContext, $self) {
return NULL;
};
$value428 = ($arguments426['value'] !== NULL ? $arguments426['value'] : $renderChildrenClosure427());
return (!is_string($value428) ? $value428 : htmlspecialchars($value428, ($arguments426['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments426['encoding'] !== NULL ? $arguments426['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments426['doubleEncode']));
};
$viewHelper429 = $self->getViewHelper('$viewHelper429', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper429->setArguments($arguments423);
$viewHelper429->setRenderingContext($renderingContext);
$viewHelper429->setRenderChildrenClosure($renderChildrenClosure425);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output422 .= $viewHelper429->initializeArgumentsAndRender();

$output422 .= '
									';
return $output422;
};
$arguments400['__elseClosure'] = function() use ($renderingContext, $self) {
$output430 = '';

$output430 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments431 = array();
$arguments431['additionalAttributes'] = NULL;
$arguments431['data'] = NULL;
$arguments431['action'] = NULL;
$arguments431['arguments'] = array (
);
$arguments431['section'] = '';
$arguments431['format'] = '';
$arguments431['ajax'] = false;
$arguments431['class'] = NULL;
$arguments431['dir'] = NULL;
$arguments431['id'] = NULL;
$arguments431['lang'] = NULL;
$arguments431['style'] = NULL;
$arguments431['title'] = NULL;
$arguments431['accesskey'] = NULL;
$arguments431['tabindex'] = NULL;
$arguments431['onclick'] = NULL;
$arguments431['name'] = NULL;
$arguments431['rel'] = NULL;
$arguments431['rev'] = NULL;
$arguments431['target'] = NULL;
$arguments431['addQueryStringMethod'] = NULL;
$renderChildrenClosure432 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments433 = array();
$arguments433['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments433['keepQuotes'] = false;
$arguments433['encoding'] = NULL;
$arguments433['doubleEncode'] = true;
$renderChildrenClosure434 = function() use ($renderingContext, $self) {
return NULL;
};
$value435 = ($arguments433['value'] !== NULL ? $arguments433['value'] : $renderChildrenClosure434());
return (!is_string($value435) ? $value435 : htmlspecialchars($value435, ($arguments433['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments433['encoding'] !== NULL ? $arguments433['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments433['doubleEncode']));
};
$viewHelper436 = $self->getViewHelper('$viewHelper436', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper436->setArguments($arguments431);
$viewHelper436->setRenderingContext($renderingContext);
$viewHelper436->setRenderChildrenClosure($renderChildrenClosure432);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output430 .= $viewHelper436->initializeArgumentsAndRender();

$output430 .= '
									';
return $output430;
};
$viewHelper437 = $self->getViewHelper('$viewHelper437', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper437->setArguments($arguments400);
$viewHelper437->setRenderingContext($renderingContext);
$viewHelper437->setRenderChildrenClosure($renderChildrenClosure401);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output399 .= $viewHelper437->initializeArgumentsAndRender();

$output399 .= '
							</li>
						';
return $output399;
};

$output390 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments397, $renderChildrenClosure398, $renderingContext);

$output390 .= '
					';
return $output390;
};
$arguments388['__thenClosure'] = function() use ($renderingContext, $self) {
$output438 = '';

$output438 .= '
							<li class="current">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments439 = array();
$arguments439['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments439['keepQuotes'] = false;
$arguments439['encoding'] = NULL;
$arguments439['doubleEncode'] = true;
$renderChildrenClosure440 = function() use ($renderingContext, $self) {
return NULL;
};
$value441 = ($arguments439['value'] !== NULL ? $arguments439['value'] : $renderChildrenClosure440());

$output438 .= (!is_string($value441) ? $value441 : htmlspecialchars($value441, ($arguments439['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments439['encoding'] !== NULL ? $arguments439['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments439['doubleEncode']));

$output438 .= '</li>
						';
return $output438;
};
$arguments388['__elseClosure'] = function() use ($renderingContext, $self) {
$output442 = '';

$output442 .= '
							<li>
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments443 = array();
// Rendering Boolean node
$arguments443['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('>', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext), 1);
$arguments443['then'] = NULL;
$arguments443['else'] = NULL;
$renderChildrenClosure444 = function() use ($renderingContext, $self) {
$output445 = '';

$output445 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments446 = array();
$renderChildrenClosure447 = function() use ($renderingContext, $self) {
$output448 = '';

$output448 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments449 = array();
// Rendering Array
$array450 = array();
$array450['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments449['arguments'] = $array450;
$arguments449['additionalAttributes'] = NULL;
$arguments449['data'] = NULL;
$arguments449['action'] = NULL;
$arguments449['section'] = '';
$arguments449['format'] = '';
$arguments449['ajax'] = false;
$arguments449['class'] = NULL;
$arguments449['dir'] = NULL;
$arguments449['id'] = NULL;
$arguments449['lang'] = NULL;
$arguments449['style'] = NULL;
$arguments449['title'] = NULL;
$arguments449['accesskey'] = NULL;
$arguments449['tabindex'] = NULL;
$arguments449['onclick'] = NULL;
$arguments449['name'] = NULL;
$arguments449['rel'] = NULL;
$arguments449['rev'] = NULL;
$arguments449['target'] = NULL;
$arguments449['addQueryStringMethod'] = NULL;
$renderChildrenClosure451 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments452 = array();
$arguments452['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments452['keepQuotes'] = false;
$arguments452['encoding'] = NULL;
$arguments452['doubleEncode'] = true;
$renderChildrenClosure453 = function() use ($renderingContext, $self) {
return NULL;
};
$value454 = ($arguments452['value'] !== NULL ? $arguments452['value'] : $renderChildrenClosure453());
return (!is_string($value454) ? $value454 : htmlspecialchars($value454, ($arguments452['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments452['encoding'] !== NULL ? $arguments452['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments452['doubleEncode']));
};
$viewHelper455 = $self->getViewHelper('$viewHelper455', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper455->setArguments($arguments449);
$viewHelper455->setRenderingContext($renderingContext);
$viewHelper455->setRenderChildrenClosure($renderChildrenClosure451);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output448 .= $viewHelper455->initializeArgumentsAndRender();

$output448 .= '
									';
return $output448;
};

$output445 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments446, $renderChildrenClosure447, $renderingContext);

$output445 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments456 = array();
$renderChildrenClosure457 = function() use ($renderingContext, $self) {
$output458 = '';

$output458 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments459 = array();
$arguments459['additionalAttributes'] = NULL;
$arguments459['data'] = NULL;
$arguments459['action'] = NULL;
$arguments459['arguments'] = array (
);
$arguments459['section'] = '';
$arguments459['format'] = '';
$arguments459['ajax'] = false;
$arguments459['class'] = NULL;
$arguments459['dir'] = NULL;
$arguments459['id'] = NULL;
$arguments459['lang'] = NULL;
$arguments459['style'] = NULL;
$arguments459['title'] = NULL;
$arguments459['accesskey'] = NULL;
$arguments459['tabindex'] = NULL;
$arguments459['onclick'] = NULL;
$arguments459['name'] = NULL;
$arguments459['rel'] = NULL;
$arguments459['rev'] = NULL;
$arguments459['target'] = NULL;
$arguments459['addQueryStringMethod'] = NULL;
$renderChildrenClosure460 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments461 = array();
$arguments461['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments461['keepQuotes'] = false;
$arguments461['encoding'] = NULL;
$arguments461['doubleEncode'] = true;
$renderChildrenClosure462 = function() use ($renderingContext, $self) {
return NULL;
};
$value463 = ($arguments461['value'] !== NULL ? $arguments461['value'] : $renderChildrenClosure462());
return (!is_string($value463) ? $value463 : htmlspecialchars($value463, ($arguments461['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments461['encoding'] !== NULL ? $arguments461['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments461['doubleEncode']));
};
$viewHelper464 = $self->getViewHelper('$viewHelper464', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper464->setArguments($arguments459);
$viewHelper464->setRenderingContext($renderingContext);
$viewHelper464->setRenderChildrenClosure($renderChildrenClosure460);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output458 .= $viewHelper464->initializeArgumentsAndRender();

$output458 .= '
									';
return $output458;
};

$output445 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments456, $renderChildrenClosure457, $renderingContext);

$output445 .= '
								';
return $output445;
};
$arguments443['__thenClosure'] = function() use ($renderingContext, $self) {
$output465 = '';

$output465 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments466 = array();
// Rendering Array
$array467 = array();
$array467['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments466['arguments'] = $array467;
$arguments466['additionalAttributes'] = NULL;
$arguments466['data'] = NULL;
$arguments466['action'] = NULL;
$arguments466['section'] = '';
$arguments466['format'] = '';
$arguments466['ajax'] = false;
$arguments466['class'] = NULL;
$arguments466['dir'] = NULL;
$arguments466['id'] = NULL;
$arguments466['lang'] = NULL;
$arguments466['style'] = NULL;
$arguments466['title'] = NULL;
$arguments466['accesskey'] = NULL;
$arguments466['tabindex'] = NULL;
$arguments466['onclick'] = NULL;
$arguments466['name'] = NULL;
$arguments466['rel'] = NULL;
$arguments466['rev'] = NULL;
$arguments466['target'] = NULL;
$arguments466['addQueryStringMethod'] = NULL;
$renderChildrenClosure468 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments469 = array();
$arguments469['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments469['keepQuotes'] = false;
$arguments469['encoding'] = NULL;
$arguments469['doubleEncode'] = true;
$renderChildrenClosure470 = function() use ($renderingContext, $self) {
return NULL;
};
$value471 = ($arguments469['value'] !== NULL ? $arguments469['value'] : $renderChildrenClosure470());
return (!is_string($value471) ? $value471 : htmlspecialchars($value471, ($arguments469['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments469['encoding'] !== NULL ? $arguments469['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments469['doubleEncode']));
};
$viewHelper472 = $self->getViewHelper('$viewHelper472', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper472->setArguments($arguments466);
$viewHelper472->setRenderingContext($renderingContext);
$viewHelper472->setRenderChildrenClosure($renderChildrenClosure468);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output465 .= $viewHelper472->initializeArgumentsAndRender();

$output465 .= '
									';
return $output465;
};
$arguments443['__elseClosure'] = function() use ($renderingContext, $self) {
$output473 = '';

$output473 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments474 = array();
$arguments474['additionalAttributes'] = NULL;
$arguments474['data'] = NULL;
$arguments474['action'] = NULL;
$arguments474['arguments'] = array (
);
$arguments474['section'] = '';
$arguments474['format'] = '';
$arguments474['ajax'] = false;
$arguments474['class'] = NULL;
$arguments474['dir'] = NULL;
$arguments474['id'] = NULL;
$arguments474['lang'] = NULL;
$arguments474['style'] = NULL;
$arguments474['title'] = NULL;
$arguments474['accesskey'] = NULL;
$arguments474['tabindex'] = NULL;
$arguments474['onclick'] = NULL;
$arguments474['name'] = NULL;
$arguments474['rel'] = NULL;
$arguments474['rev'] = NULL;
$arguments474['target'] = NULL;
$arguments474['addQueryStringMethod'] = NULL;
$renderChildrenClosure475 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments476 = array();
$arguments476['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'page.number', $renderingContext);
$arguments476['keepQuotes'] = false;
$arguments476['encoding'] = NULL;
$arguments476['doubleEncode'] = true;
$renderChildrenClosure477 = function() use ($renderingContext, $self) {
return NULL;
};
$value478 = ($arguments476['value'] !== NULL ? $arguments476['value'] : $renderChildrenClosure477());
return (!is_string($value478) ? $value478 : htmlspecialchars($value478, ($arguments476['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments476['encoding'] !== NULL ? $arguments476['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments476['doubleEncode']));
};
$viewHelper479 = $self->getViewHelper('$viewHelper479', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper479->setArguments($arguments474);
$viewHelper479->setRenderingContext($renderingContext);
$viewHelper479->setRenderChildrenClosure($renderChildrenClosure475);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output473 .= $viewHelper479->initializeArgumentsAndRender();

$output473 .= '
									';
return $output473;
};
$viewHelper480 = $self->getViewHelper('$viewHelper480', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper480->setArguments($arguments443);
$viewHelper480->setRenderingContext($renderingContext);
$viewHelper480->setRenderChildrenClosure($renderChildrenClosure444);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output442 .= $viewHelper480->initializeArgumentsAndRender();

$output442 .= '
							</li>
						';
return $output442;
};
$viewHelper481 = $self->getViewHelper('$viewHelper481', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper481->setArguments($arguments388);
$viewHelper481->setRenderingContext($renderingContext);
$viewHelper481->setRenderChildrenClosure($renderChildrenClosure389);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output387 .= $viewHelper481->initializeArgumentsAndRender();

$output387 .= '
				';
return $output387;
};

$output267 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments385, $renderChildrenClosure386, $renderingContext);

$output267 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments482 = array();
// Rendering Boolean node
$arguments482['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.hasMorePages', $renderingContext));
$arguments482['then'] = NULL;
$arguments482['else'] = NULL;
$renderChildrenClosure483 = function() use ($renderingContext, $self) {
return '
					<li>....</li>
				';
};
$viewHelper484 = $self->getViewHelper('$viewHelper484', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper484->setArguments($arguments482);
$viewHelper484->setRenderingContext($renderingContext);
$viewHelper484->setRenderChildrenClosure($renderChildrenClosure483);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output267 .= $viewHelper484->initializeArgumentsAndRender();

$output267 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments485 = array();
// Rendering Boolean node
$arguments485['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('<', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.displayRangeEnd', $renderingContext), TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.numberOfPages', $renderingContext));
$arguments485['then'] = NULL;
$arguments485['else'] = NULL;
$renderChildrenClosure486 = function() use ($renderingContext, $self) {
$output487 = '';

$output487 .= '
					<li class="last">
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments488 = array();
// Rendering Array
$array489 = array();
$array489['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.numberOfPages', $renderingContext);
$arguments488['arguments'] = $array489;
$arguments488['additionalAttributes'] = NULL;
$arguments488['data'] = NULL;
$arguments488['action'] = NULL;
$arguments488['section'] = '';
$arguments488['format'] = '';
$arguments488['ajax'] = false;
$arguments488['class'] = NULL;
$arguments488['dir'] = NULL;
$arguments488['id'] = NULL;
$arguments488['lang'] = NULL;
$arguments488['style'] = NULL;
$arguments488['title'] = NULL;
$arguments488['accesskey'] = NULL;
$arguments488['tabindex'] = NULL;
$arguments488['onclick'] = NULL;
$arguments488['name'] = NULL;
$arguments488['rel'] = NULL;
$arguments488['rev'] = NULL;
$arguments488['target'] = NULL;
$arguments488['addQueryStringMethod'] = NULL;
$renderChildrenClosure490 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments491 = array();
$arguments491['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.numberOfPages', $renderingContext);
$arguments491['keepQuotes'] = false;
$arguments491['encoding'] = NULL;
$arguments491['doubleEncode'] = true;
$renderChildrenClosure492 = function() use ($renderingContext, $self) {
return NULL;
};
$value493 = ($arguments491['value'] !== NULL ? $arguments491['value'] : $renderChildrenClosure492());
return (!is_string($value493) ? $value493 : htmlspecialchars($value493, ($arguments491['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments491['encoding'] !== NULL ? $arguments491['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments491['doubleEncode']));
};
$viewHelper494 = $self->getViewHelper('$viewHelper494', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper494->setArguments($arguments488);
$viewHelper494->setRenderingContext($renderingContext);
$viewHelper494->setRenderChildrenClosure($renderChildrenClosure490);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output487 .= $viewHelper494->initializeArgumentsAndRender();

$output487 .= '
					</li>
				';
return $output487;
};
$viewHelper495 = $self->getViewHelper('$viewHelper495', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper495->setArguments($arguments485);
$viewHelper495->setRenderingContext($renderingContext);
$viewHelper495->setRenderChildrenClosure($renderChildrenClosure486);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output267 .= $viewHelper495->initializeArgumentsAndRender();

$output267 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments496 = array();
// Rendering Boolean node
$arguments496['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.nextPage', $renderingContext));
$arguments496['then'] = NULL;
$arguments496['else'] = NULL;
$renderChildrenClosure497 = function() use ($renderingContext, $self) {
$output498 = '';

$output498 .= '
					<li class="last next">
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper
$arguments499 = array();
// Rendering Array
$array500 = array();
$array500['currentPage'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'pagination.nextPage', $renderingContext);
$arguments499['arguments'] = $array500;
$arguments499['additionalAttributes'] = NULL;
$arguments499['data'] = NULL;
$arguments499['action'] = NULL;
$arguments499['section'] = '';
$arguments499['format'] = '';
$arguments499['ajax'] = false;
$arguments499['class'] = NULL;
$arguments499['dir'] = NULL;
$arguments499['id'] = NULL;
$arguments499['lang'] = NULL;
$arguments499['style'] = NULL;
$arguments499['title'] = NULL;
$arguments499['accesskey'] = NULL;
$arguments499['tabindex'] = NULL;
$arguments499['onclick'] = NULL;
$arguments499['name'] = NULL;
$arguments499['rel'] = NULL;
$arguments499['rev'] = NULL;
$arguments499['target'] = NULL;
$arguments499['addQueryStringMethod'] = NULL;
$renderChildrenClosure501 = function() use ($renderingContext, $self) {
$output502 = '';

$output502 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments503 = array();
$arguments503['key'] = 'paginate_next';
$arguments503['id'] = NULL;
$arguments503['default'] = NULL;
$arguments503['htmlEscape'] = NULL;
$arguments503['arguments'] = NULL;
$arguments503['extensionName'] = NULL;
$renderChildrenClosure504 = function() use ($renderingContext, $self) {
return NULL;
};

$output502 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments503, $renderChildrenClosure504, $renderingContext);

$output502 .= '
						';
return $output502;
};
$viewHelper505 = $self->getViewHelper('$viewHelper505', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper');
$viewHelper505->setArguments($arguments499);
$viewHelper505->setRenderingContext($renderingContext);
$viewHelper505->setRenderChildrenClosure($renderChildrenClosure501);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper

$output498 .= $viewHelper505->initializeArgumentsAndRender();

$output498 .= '
					</li>
				';
return $output498;
};
$viewHelper506 = $self->getViewHelper('$viewHelper506', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper506->setArguments($arguments496);
$viewHelper506->setRenderingContext($renderingContext);
$viewHelper506->setRenderChildrenClosure($renderChildrenClosure497);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output267 .= $viewHelper506->initializeArgumentsAndRender();

$output267 .= '
			</ul>
		</div>
		<div class="news-clear"></div>
	';
return $output267;
};
$viewHelper507 = $self->getViewHelper('$viewHelper507', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper507->setArguments($arguments265);
$viewHelper507->setRenderingContext($renderingContext);
$viewHelper507->setRenderChildrenClosure($renderChildrenClosure266);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output264 .= $viewHelper507->initializeArgumentsAndRender();

$output264 .= '
';
return $output264;
};

$output244 .= '';

$output244 .= '
';

return $output244;
}


}
#1435880033    138175    