<?php

declare(strict_types=1);

namespace App\FrontModule\Presenters;


use App\Presenters\BasePresenter;

final class HomepagePresenter extends BasePresenter
{
	public function renderDefault(): void
	{
		$this->template->domain = $_SERVER['HTTP_HOST'] ?? 'Unknown';
		$this->template->serverIP = $this->getIp();
		$this->template->remoteIP = $_SERVER['SERVER_ADDR'] ?? 'Unknown';
		$this->template->year = date('Y');
	}

public function getIp(): string
	{
		$ip = null;

		if (isset($_SERVER['REMOTE_ADDR'])) {
			$ip = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
		}

		return is_string($ip) ? $ip : '127.0.0.1';
	}
}
