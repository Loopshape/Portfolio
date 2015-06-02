.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


Developers manual
=================

The extension provides a small API that you can use inside your own scripts to collapse and expand all or specific elements. Therefore the following functions can be called via the javascript object named “ContentSlideManager.instance”.

- addSlides(_slides)
	Add slides to the ContentSlideManager.
- collapseAll()
	Collapses all managed Slides.
- expandAll()
	Expands all managed Slides.
- getAllSlides()
	Get all available slide Objects
- getSlide(_hash)
	Get the ContentSlide object associated with _hash.
