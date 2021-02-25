<?php

declare(strict_types=1);

namespace App\Presenters;

use Contributte\Translation\LocalesResolvers\Session;
use Nette;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
	/**
	 * @var string
	 * @persistent
	 */
	public $locale;

	/** @var Nette\Localization\ITranslator @inject */
	public $translator;

	/** @var Session @inject */
	public $translatorSessionResolver;

	/**
	 * @param string $locale
	 * @throws Nette\Application\AbortException
	 */
	public function handleChangeLocale(string $locale): void
	{
		$this->translatorSessionResolver->setLocale($locale);
		$this->redirect('this');
	}

}