<?php

declare(strict_types=1);

namespace App\Presenters;

use Contributte\Translation\LocalesResolvers\Session;
use Nette\Application\UI\Presenter;
use Nette\Localization\Translator;
use Nette\Application\AbortException;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Presenter
{
	/**
	 * @var string
	 * @persistent
	 */
	public string $locale = 'cs';

	/**
	 * @var Translator
	 * @inject
	 */
	public Translator $translator;

	/**
	 * @var Session
	 * @inject
	 */
	public Session $translatorSessionResolver;

	/**
	 * @param string $locale
	 * @throws AbortException
	 */
	public function handleChangeLocale(string $locale): void
	{
		$this->translatorSessionResolver->setLocale($locale);
		$this->redirect('this');
	}

	/**
	 * @param string $locale
	 * @return bool
	 */
	public function isLocale(string $locale): bool
	{
		return $this->locale === $locale;
	}

	/**
	 * @return array<string>
	 */
	public function getLocales(): array
	{
		return $this->translator->getLocalesWhitelist();
	}

	/**
	 * @return string
	 */
	public function getDefaultLocale(): string
	{
		return $this->translator->getDefaultLocale();
	}

}