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

namespace OCA\TermsOfService\Db\Entities;

use OCP\AppFramework\Db\Entity;

/**
 * @method int getTermsId()
 * @method void setTermsId(int $id)
 * @method string getUserId()
 * @method void setUserId(string $userId)
 * @method string getRemoteIp()
 * @method void setRemoteIp(string $remoteIp)
 * @method string getUrl()
 * @method void setUrl($url)
 * @method int getAccessType()
 * @method void setAccessType(int $accessType)
 * @method string getMetadata()
 * @method void setMetadata(string $metadata)
 * @method int getTimestamp()
 * @method void setTimestamp(int $timestamp)
 */
class Signatory extends Entity {
	/** @var int */
	public $termsId;
	/** @var string */
	public $userId;
	/** @var string */
	public $remoteIp;
	/** @var string */
	public $url;
	/** @var integer */
	public $accessType;
	/** @var string */
	public $metadata;
	/** @var int */
	public $timestamp;
}
