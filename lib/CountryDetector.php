<?php
/**
 * @copyright Copyright (c) 2017 Lukas Reschke <lukas@statuscode.ch>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\TermsOfService;

use MaxMind\Db\Reader;
use MaxMind\Db\Reader\InvalidDatabaseException;
use OCA\TermsOfService\Db\Mapper\CountryMapper;
use OCP\IRequest;

class CountryDetector {
	/** @var IRequest */
	private $request;
	/** @var CountryMapper */
	private $countryMapper;

	public function __construct(IRequest $request,
								CountryMapper $countryMapper) {
		$this->request = $request;
		$this->countryMapper = $countryMapper;
	}

	/**
	 * Get the country for the current user
	 * @return string
	 */
	public function getCountry(): string {
		// Check if there is a cookie
		$countryCookie = $this->request->getCookie('TermsOfServiceCountryCookie');
		if($this->countryMapper->isValidCountry($countryCookie)) {
			return $countryCookie;
		}

		// Read it from IP address
		try {
			$reader = new Reader(__DIR__ . '/../vendor/GeoLite2-Country.mmdb');
			$record = $reader->get($this->request->getRemoteAddress());
		} catch (InvalidDatabaseException $e) {
			return '--';
		}

		if($this->countryMapper->isValidCountry($record['country']['iso_code'])) {
			return $record['country']['iso_code'];
		}

		// Default to '--' if nothing is found
		return '--';
	}
}
