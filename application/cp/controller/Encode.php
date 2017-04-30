<?php
namespace app\cp\controller;
use think\Db;
use think\Session;
use think\Config;
use think\Cookie;
use think\Cache;

class Encode
{
	/**
		 * 根据methodid来验证数据
		 */
	private $lt_method;

	public function __construct()
	{
		$this->lt_method = array(13 => 'lhd', 89 => 'lhd', 127 => 'lhd', 1213 => 'lhd', 14 => 'ZX3', 15 => 'ZXHZ', 16 => 'ZX3', 17 => 'ZXHZ', 18 => 'ZUS', 19 => 'ZUL', 20 => 'HHZX', 21 => 'ZUHZ', 22 => 'ZUS', 23 => 'ZUL', 24 => 'HHZX', 25 => 'ZUHZ', 26 => 'BDW1', 27 => 'BDW2', 28 => 'ZX2', 30 => 'ZU2', 29 => 'ZX2', 31 => 'ZU2', 32 => 'DWD', 33 => 'DWD', 34 => 'DWD', 35 => 'DWD', 36 => 'DWD', 37 => 'DXDS', 38 => 'DXDS', 39 => 'BDW1', 40 => 'BDW2', 52 => 'ZX3', 53 => 'ZXHZ', 54 => 'ZX3', 55 => 'ZXHZ', 56 => 'ZUS', 57 => 'ZUL', 58 => 'HHZX', 59 => 'ZUHZ', 60 => 'ZUS', 61 => 'ZUL', 62 => 'HHZX', 63 => 'ZUHZ', 64 => 'BDW1', 65 => 'BDW2', 66 => 'ZX2', 67 => 'ZX2', 68 => 'ZU2', 69 => 'ZU2', 70 => 'DWD', 71 => 'DWD', 72 => 'DWD', 73 => 'DWD', 74 => 'DWD', 75 => 'DXDS', 76 => 'DXDS', 90 => 'ZX3', 91 => 'ZXHZ', 92 => 'ZX3', 93 => 'ZXHZ', 94 => 'ZUS', 95 => 'ZUL', 96 => 'HHZX', 97 => 'ZUHZ', 98 => 'ZUS', 99 => 'ZUL', 100 => 'HHZX', 101 => 'ZUHZ', 102 => 'BDW1', 103 => 'BDW2', 104 => 'ZX2', 105 => 'ZX2', 106 => 'ZU2', 107 => 'ZU2', 108 => 'DWD', 109 => 'DWD', 110 => 'DWD', 111 => 'DWD', 112 => 'DWD', 113 => 'DXDS', 114 => 'DXDS', 115 => 'BDW1', 116 => 'BDW2', 128 => 'ZX3', 129 => 'ZXHZ', 130 => 'ZX3', 131 => 'ZXHZ', 132 => 'ZUS', 133 => 'ZUL', 134 => 'HHZX', 135 => 'ZUHZ', 136 => 'ZUS', 137 => 'ZUL', 138 => 'HHZX', 139 => 'ZUHZ', 140 => 'BDW1', 141 => 'BDW2', 142 => 'ZX2', 143 => 'ZX2', 144 => 'ZU2', 145 => 'ZU2', 146 => 'DWD', 147 => 'DWD', 148 => 'DWD', 149 => 'DWD', 150 => 'DWD', 151 => 'DXDS', 152 => 'DXDS', 153 => 'BDW1', 154 => 'BDW2', 164 => 'ZX3', 165 => 'ZXHZ', 166 => 'ZUS', 167 => 'ZUL', 168 => 'HHZX', 169 => 'ZUHZ', 170 => 'BDW1', 171 => 'BDW2', 172 => 'ZX2', 173 => 'ZX2', 174 => 'ZU2', 175 => 'ZU2', 176 => 'DWD', 177 => 'DWD', 178 => 'DWD', 179 => 'DXDS', 180 => 'DXDS', 197 => 'SDZX3', 198 => 'SDZU3', 199 => 'SDZX2', 200 => 'SDZU2', 201 => 'SDBDW', 202 => 'SDDWD', 203 => 'SDDWD', 204 => 'SDDWD', 205 => 'SDDDS', 206 => 'SDCZW', 207 => 'SDRX1', 208 => 'SDRX2', 209 => 'SDRX3', 210 => 'SDRX4', 211 => 'SDRX5', 212 => 'SDRX6', 213 => 'SDRX7', 214 => 'SDRX8', 231 => 'SDZX3', 232 => 'SDZU3', 233 => 'SDZX2', 234 => 'SDZU2', 235 => 'SDBDW', 236 => 'SDDWD', 237 => 'SDDWD', 238 => 'SDDWD', 239 => 'SDDDS', 240 => 'SDCZW', 241 => 'SDRX1', 242 => 'SDRX2', 243 => 'SDRX3', 244 => 'SDRX4', 245 => 'SDRX5', 246 => 'SDRX6', 247 => 'SDRX7', 248 => 'SDRX8', 265 => 'SDZX3', 266 => 'SDZU3', 267 => 'SDZX2', 268 => 'SDZU2', 269 => 'SDBDW', 270 => 'SDDWD', 271 => 'SDDWD', 272 => 'SDDWD', 273 => 'SDDDS', 274 => 'SDCZW', 275 => 'SDRX1', 276 => 'SDRX2', 277 => 'SDRX3', 278 => 'SDRX4', 279 => 'SDRX5', 280 => 'SDRX6', 281 => 'SDRX7', 282 => 'SDRX8', 294 => 'ZX3', 295 => 'ZXHZ', 296 => 'ZUS', 297 => 'ZUL', 298 => 'HHZX', 299 => 'ZUHZ', 300 => 'BDW1', 301 => 'BDW2', 302 => 'ZX2', 303 => 'ZX2', 304 => 'ZU2', 305 => 'ZU2', 306 => '3DWD', 307 => 'DWD', 308 => 'DWD', 309 => 'DXDS', 310 => 'DXDS', 322 => 'ZX3', 323 => 'ZXHZ', 324 => 'ZUS', 325 => 'ZUL', 326 => 'HHZX', 327 => 'ZUHZ', 328 => 'BDW1', 329 => 'BDW2', 330 => 'ZX2', 331 => 'ZX2', 332 => 'ZU2', 333 => 'ZU2', 334 => 'DWD', 335 => 'DWD', 336 => 'DWD', 337 => 'DWD', 338 => 'DWD', 339 => 'DXDS', 340 => 'DXDS', 358 => 'SDZX3', 359 => 'SDZU3', 360 => 'SDZX2', 361 => 'SDZU2', 362 => 'SDBDW', 363 => 'SDDWD', 364 => 'SDDWD', 365 => 'SDDWD', 366 => 'SDDDS', 367 => 'SDCZW', 368 => 'SDRX1', 369 => 'SDRX2', 370 => 'SDRX3', 371 => 'SDRX4', 372 => 'SDRX5', 373 => 'SDRX6', 374 => 'SDRX7', 375 => 'SDRX8', 400 => 'ZX5', 401 => 'ZX4', 402 => 'ZX4', 403 => 'ZX3', 404 => 'ZXHZ', 405 => 'ZUS', 406 => 'ZUL', 407 => 'HHZX', 408 => 'ZUHZ', 409 => 'BJL', 410 => 'RX3', 411 => 'RX2', 420 => 'ZX5', 421 => 'ZX4', 422 => 'ZX4', 423 => 'ZX3', 424 => 'ZXHZ', 425 => 'ZUS', 426 => 'ZUL', 427 => 'HHZX', 428 => 'ZUHZ', 429 => 'DWD', 430 => 'RX3', 431 => 'RX2', 440 => 'ZX5', 441 => 'ZX4', 442 => 'ZX4', 443 => 'ZX3', 444 => 'ZXHZ', 445 => 'ZUS', 446 => 'ZUL', 447 => 'HHZX', 448 => 'ZUHZ', 449 => 'BJL', 450 => 'RX3', 451 => 'RX2', 460 => 'ZX5', 461 => 'ZX4', 462 => 'ZX4', 463 => 'ZX3', 464 => 'ZXHZ', 465 => 'ZUS', 466 => 'ZUL', 467 => 'HHZX', 468 => 'ZUHZ', 469 => 'BJL', 470 => 'RX3', 471 => 'RX2', 500 => 'BDW1', 501 => 'SB', 502 => 'SX', 1240 => 'ZX5', 1241 => 'ZX4', 1242 => 'ZX4', 1214 => 'ZX3', 1215 => 'ZXHZ', 1218 => 'ZUS', 1219 => 'ZUL', 1220 => 'HHZX', 1221 => 'ZUHZ', 1243 => 'ZX3', 1244 => 'ZXHZ', 1245 => 'ZUS', 1246 => 'ZUL', 1247 => 'HHZX', 1248 => 'ZUHZ', 1216 => 'ZX3', 1217 => 'ZXHZ', 1222 => 'ZUS', 1223 => 'ZUL', 1224 => 'HHZX', 1225 => 'ZUHZ', 1226 => 'BDW1', 1227 => 'BDW2', 1229 => 'ZX2', 1231 => 'ZU2', 1228 => 'ZX2', 1230 => 'ZU2', 1232 => 'DWD', 1237 => 'DXDS', 1238 => 'DXDS', 1250 => 'RX3', 1251 => 'RX2', 1249 => 'BJL');
	}

	public function checkCodeNum($methodid, $nums, $type)
	{
		$mname = $this->lt_method[$methodid];

		if ($type == 'input') {
			switch ($mname) {
			case 'ZX3':
				if (800 < $nums) {
					return true;
				}

				break;

			case 'ZX4':
				if (8000 < $nums) {
					return true;
				}

				break;

			case 'RX3':
				if (800 < $nums) {
					return true;
				}

				break;
			}
		}
	}

	public function checkCode($methodid, $codes, $nums, $money, $mode, $bs, $type)
	{
		$allnum = 0;
		$mname = $this->lt_method[$methodid];
		$modes = intval($mode);
		$ptn = '';
		if (('DXDS' != $mname) && ('SDDDS' != $mname) && ('BJL' != $mname) && ('lhd' != $mname) && ('SB' != $mname) && ('SX' != $mname)) {
			if (preg_match('/[^\\d|&|\\s]/', $codes)) {
				return false;
			}
		}

		if ($type == 'input') {
			switch ($mname) {
			case 'ZX4':
				$_obfuscate_siPYNaWqUw = explode('&', $codes);
				$Jvf = count($_obfuscate_siPYNaWqUw);

				for ($dos_skipping = 0; $dos_skipping < $Jvf; $dos_skipping++) {
					if (strlen($_obfuscate_siPYNaWqUw[$dos_skipping]) == 0) {
						return false;
					}

					$ptn .= ($dos_skipping == $Jvf - 1 ? '\\d{4}' : '\\d{4}&');
				}

				$allnum = $Jvf;
				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				break;

			case 'ZX3':
			case 'HHZX':
			case 'RX3':
				$_obfuscate_siPYNaWqUw = explode('&', $codes);
				$Jvf = count($_obfuscate_siPYNaWqUw);

				for ($dos_skipping = 0; $dos_skipping < $Jvf; $dos_skipping++) {
					if (strlen($_obfuscate_siPYNaWqUw[$dos_skipping]) == 0) {
						return false;
					}

					$ptn .= ($dos_skipping == $Jvf - 1 ? '\\d{3}' : '\\d{3}&');
				}

				$allnum = $Jvf;
				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				break;

			case 'ZX2':
			case 'ZU2':
			case 'RX2':
				$_obfuscate_siPYNaWqUw = explode('&', $codes); $Jvf = count($_obfuscate_siPYNaWqUw);

				for ($dos_skipping = 0; $dos_skipping < $Jvf; $dos_skipping++) {
					if (strlen($_obfuscate_siPYNaWqUw[$dos_skipping]) == 0) {
						return false;
					}

					$ptn .= ($dos_skipping == $Jvf - 1 ? '\\d{2}' : '\\d{2}&');
				}

				$allnum = $Jvf;
				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				break;

			case 'SDZX3':
			case 'SDZU3':
				$_obfuscate_siPYNaWqUw = explode('&', $codes);
				$Jvf = count($_obfuscate_siPYNaWqUw);

				for ($dos_skipping = 0; $dos_skipping < $Jvf; $dos_skipping++) {
					if (strlen($_obfuscate_siPYNaWqUw[$dos_skipping]) == 0) {
						return false;
					}

					$ptn .= ($dos_skipping == $Jvf - 1 ? '[\\d\\s]{8}' : '[\\d\\s]{8}&');
				}

				$ptn = '/^' . $ptn . '$/';
				$allnum = $Jvf;

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				break;

			case 'SDZX2':
			case 'SDZU2':
				$_obfuscate_siPYNaWqUw = explode('&', $codes);
				$Jvf = count($_obfuscate_siPYNaWqUw);

				for ($dos_skipping = 0; $dos_skipping < $Jvf; $dos_skipping++) {
					if (strlen($_obfuscate_siPYNaWqUw[$dos_skipping]) == 0) {
						return false;
					}

					$ptn .= ($dos_skipping == $Jvf - 1 ? '[\\d\\s]{5}' : '[\\d\\s]{5}&');
				}

				$ptn = '/^' . $ptn . '$/';
				$allnum = $Jvf;

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				break;

			case 'SDRX1':
				$_obfuscate_siPYNaWqUw = explode('&', $codes);
				$Jvf = count($_obfuscate_siPYNaWqUw);

				for ($dos_skipping = 0; $dos_skipping < $Jvf; $dos_skipping++) {
					if (strlen($_obfuscate_siPYNaWqUw[$dos_skipping]) == 0) {
						return false;
					}

					$_obfuscate_EG_Ls5ZdONx97MQ = count(explode(' ', $_obfuscate_siPYNaWqUw[$dos_skipping]));

					if ($_obfuscate_EG_Ls5ZdONx97MQ != 1) {
						return false;
					}

					$ptn .= ($dos_skipping == $Jvf - 1 ? '[\\d\\s]{2}' : '[\\d\\s]{2}&');
				}

				$ptn = '/^' . $ptn . '$/';
				$allnum = $Jvf;

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				break;

			case 'SDRX2':
				$_obfuscate_siPYNaWqUw = explode('&', $codes);
				$Jvf = count($_obfuscate_siPYNaWqUw);

				for ($dos_skipping = 0; $dos_skipping < $Jvf; $dos_skipping++) {
					if (strlen($_obfuscate_siPYNaWqUw[$dos_skipping]) == 0) {
						return false;
					}

					$_obfuscate_EG_Ls5ZdONx97MQ = count(explode(' ', $_obfuscate_siPYNaWqUw[$dos_skipping]));

					if ($_obfuscate_EG_Ls5ZdONx97MQ != 2) {
						return false;
					}

					$ptn .= ($dos_skipping == $Jvf - 1 ? '[\\d\\s]{5}' : '[\\d\\s]{5}&');
				}

				$ptn = '/^' . $ptn . '$/';
				$allnum = $Jvf;

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				break;

			case 'SDRX3':
				$_obfuscate_siPYNaWqUw = explode('&', $codes);
				$Jvf = count($_obfuscate_siPYNaWqUw);

				for ($dos_skipping = 0; $dos_skipping < $Jvf; $dos_skipping++) {
					if (strlen($_obfuscate_siPYNaWqUw[$dos_skipping]) == 0) {
						return false;
					}

					$_obfuscate_EG_Ls5ZdONx97MQ = count(explode(' ', $_obfuscate_siPYNaWqUw[$dos_skipping]));

					if ($_obfuscate_EG_Ls5ZdONx97MQ != 3) {
						return false;
					}

					$ptn .= ($dos_skipping == $Jvf - 1 ? '[\\d\\s]{8}' : '[\\d\\s]{8}&');
				}

				$ptn = '/^' . $ptn . '$/';
				$allnum = $Jvf;

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				break;

			case 'SDRX4':
				$_obfuscate_siPYNaWqUw = explode('&', $codes);
				$Jvf = count($_obfuscate_siPYNaWqUw);

				for ($dos_skipping = 0; $dos_skipping < $Jvf; $dos_skipping++) {
					if (strlen($_obfuscate_siPYNaWqUw[$dos_skipping]) == 0) {
						return false;
					}

					$_obfuscate_EG_Ls5ZdONx97MQ = count(explode(' ', $_obfuscate_siPYNaWqUw[$dos_skipping]));

					if ($_obfuscate_EG_Ls5ZdONx97MQ != 4) {
						return false;
					}

					$ptn .= ($dos_skipping == $Jvf - 1 ? '[\\d\\s]{11}' : '[\\d\\s]{11}&');
				}

				$ptn = '/^' . $ptn . '$/';
				$allnum = $Jvf;

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				break;

			case 'SDRX5':
				$_obfuscate_siPYNaWqUw = explode('&', $codes);
				$Jvf = count($_obfuscate_siPYNaWqUw);

				for ($dos_skipping = 0; $dos_skipping < $Jvf; $dos_skipping++) {
					if (strlen($_obfuscate_siPYNaWqUw[$dos_skipping]) == 0) {
						return false;
					}

					$_obfuscate_EG_Ls5ZdONx97MQ = count(explode(' ', $_obfuscate_siPYNaWqUw[$dos_skipping]));

					if ($_obfuscate_EG_Ls5ZdONx97MQ != 5) {
						return false;
					}

					$ptn .= ($dos_skipping == $Jvf - 1 ? '[\\d\\s]{14}' : '[\\d\\s]{14}&');
				}

				$ptn = '/^' . $ptn . '$/';
				$allnum = $Jvf;

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				break;

			case 'SDRX6':
				$_obfuscate_siPYNaWqUw = explode('&', $codes);
				$Jvf = count($_obfuscate_siPYNaWqUw);

				for ($dos_skipping = 0; $dos_skipping < $Jvf; $dos_skipping++) {
					if (strlen($_obfuscate_siPYNaWqUw[$dos_skipping]) == 0) {
						return false;
					}

					$_obfuscate_EG_Ls5ZdONx97MQ = count(explode(' ', $_obfuscate_siPYNaWqUw[$dos_skipping]));

					if ($_obfuscate_EG_Ls5ZdONx97MQ != 6) {
						return false;
					}

					$ptn .= ($dos_skipping == $Jvf - 1 ? '[\\d\\s]{17}' : '[\\d\\s]{17}&');
				}

				$ptn = '/^' . $ptn . '$/';
				$allnum = $Jvf;

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				break;

			case 'SDRX7':
				$_obfuscate_siPYNaWqUw = explode('&', $codes);
				$Jvf = count($_obfuscate_siPYNaWqUw);

				for ($dos_skipping = 0; $dos_skipping < $Jvf; $dos_skipping++) {
					if (strlen($_obfuscate_siPYNaWqUw[$dos_skipping]) == 0) {
						return false;
					}

					$_obfuscate_EG_Ls5ZdONx97MQ = count(explode(' ', $_obfuscate_siPYNaWqUw[$dos_skipping]));

					if ($_obfuscate_EG_Ls5ZdONx97MQ != 7) {
						return false;
					}

					$ptn .= ($dos_skipping == $Jvf - 1 ? '[\\d\\s]{20}' : '[\\d\\s]{20}&');
				}

				$ptn = '/^' . $ptn . '$/';
				$allnum = $Jvf;

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				break;

			case 'SDRX8':
				$_obfuscate_siPYNaWqUw = explode('&', $codes);
				$Jvf = count($_obfuscate_siPYNaWqUw);

				for ($dos_skipping = 0; $dos_skipping < $Jvf; $dos_skipping++) {
					if (strlen($_obfuscate_siPYNaWqUw[$dos_skipping]) == 0) {
						return false;
					}

					$_obfuscate_EG_Ls5ZdONx97MQ = count(explode(' ', $_obfuscate_siPYNaWqUw[$dos_skipping]));

					if ($_obfuscate_EG_Ls5ZdONx97MQ != 8) {
						return false;
					}

					$ptn .= ($dos_skipping == $Jvf - 1 ? '[\\d\\s]{23}' : '[\\d\\s]{23}&');
				}

				$ptn = '/^' . $ptn . '$/';
				$allnum = $Jvf;

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				break;
			}
		}
		else {
			$tmp_nums = 1;

			switch ($mname) {
			case 'lhd':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$Jvf = count($_obfuscate_rEkmiBpD);

				foreach ($_obfuscate_rEkmiBpD as $v ) {
					if (($v != '龙') && ($v != '虎') && ($v != '和')) {
						return false;
					}
				}

				if ($Jvf == 0) {
					$allnum = 0;
					break;
				}

				$allnum = $Jvf;
				break;

			case 'ZX5':
				$_obfuscate_rEkmiBpD = explode('|', $codes);

				if (count($_obfuscate_rEkmiBpD) != 5) {
					return false;
				}

				for ($dos_skipping = 0; $dos_skipping < 5; $dos_skipping++) {
					if (strlen($_obfuscate_rEkmiBpD[$dos_skipping]) == 0) {
						$tmp_nums = 0;
						return false;
					}

					$_obfuscate_ZP00OgHeow = explode('&', $_obfuscate_rEkmiBpD[$dos_skipping]);
					$Jvf = count($_obfuscate_ZP00OgHeow);

					for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
						$ptn .= ($ISOheader == $Jvf - 1 ? '\\d' : '\\d&');
					}

					$ptn .= ($dos_skipping == 4 ? '' : '\\|');
					$tmp_nums *= count($_obfuscate_ZP00OgHeow);
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				$allnum = $tmp_nums;
				break;

			case 'ZX4':
				$_obfuscate_rEkmiBpD = explode('|', $codes);

				if (count($_obfuscate_rEkmiBpD) != 4) {
					return false;
				}

				for ($dos_skipping = 0; $dos_skipping < 4; $dos_skipping++) {
					if (strlen($_obfuscate_rEkmiBpD[$dos_skipping]) == 0) {
						$tmp_nums = 0;
						return false;
					}

					$_obfuscate_ZP00OgHeow = explode('&', $_obfuscate_rEkmiBpD[$dos_skipping]);
					$Jvf = count($_obfuscate_ZP00OgHeow);

					for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
						$ptn .= ($ISOheader == $Jvf - 1 ? '\\d' : '\\d&');
					}

					$ptn .= ($dos_skipping == 3 ? '' : '\\|');
					$tmp_nums *= count($_obfuscate_ZP00OgHeow);
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				$allnum = $tmp_nums;
				break;

			case 'ZX3':
				$_obfuscate_rEkmiBpD = explode('|', $codes);

				if (count($_obfuscate_rEkmiBpD) != 3) {
					return false;
				}

				for ($dos_skipping = 0; $dos_skipping < 3; $dos_skipping++) {
					if (strlen($_obfuscate_rEkmiBpD[$dos_skipping]) == 0) {
						$tmp_nums = 0;
						return false;
					}

					$_obfuscate_ZP00OgHeow = explode('&', $_obfuscate_rEkmiBpD[$dos_skipping]);
					$Jvf = count($_obfuscate_ZP00OgHeow);

					for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
						$ptn .= ($ISOheader == $Jvf - 1 ? '\\d' : '\\d&');
					}

					$ptn .= ($dos_skipping == 2 ? '' : '\\|');
					$tmp_nums *= count($_obfuscate_ZP00OgHeow);
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				$allnum = $tmp_nums;
				break;

			case 'RX3':
				$_obfuscate_rEkmiBpD = explode('|', $codes);
				$EM = 0;

				if (count($_obfuscate_rEkmiBpD) != 5) {
					return false;
				}

				for ($dos_skipping = 0; $dos_skipping < 5; $dos_skipping++) {
					if (strlen($_obfuscate_rEkmiBpD[$dos_skipping]) == 0) {
						$EM++;
					}

					$_obfuscate_ZP00OgHeow = explode('&', $_obfuscate_rEkmiBpD[$dos_skipping]);
					$Jvf = count($_obfuscate_ZP00OgHeow);

					for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
						if (is_numeric($_obfuscate_ZP00OgHeow[$ISOheader])) {
							$ptn .= ($ISOheader == $Jvf - 1 ? '\\d' : '\\d&');
						}
					}

					$ptn .= ($dos_skipping == 4 ? '' : '\\|');
					$tmp_nums *= count($_obfuscate_ZP00OgHeow);
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				if ($EM != 2) {
					return false;
				}

				$allnum = $tmp_nums;
				break;

			case 'RX2':
				$_obfuscate_rEkmiBpD = explode('|', $codes);
				$EM = 0;

				if (count($_obfuscate_rEkmiBpD) != 5) {
					return false;
				}

				for ($dos_skipping = 0; $dos_skipping < 5; $dos_skipping++) {
					if (strlen($_obfuscate_rEkmiBpD[$dos_skipping]) == 0) {
						$EM++;
					}

					$_obfuscate_ZP00OgHeow = explode('&', $_obfuscate_rEkmiBpD[$dos_skipping]);
					$Jvf = count($_obfuscate_ZP00OgHeow);

					for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
						if (is_numeric($_obfuscate_ZP00OgHeow[$ISOheader])) {
							$ptn .= ($ISOheader == $Jvf - 1 ? '\\d' : '\\d&');
						}
					}

					$ptn .= ($dos_skipping == 4 ? '' : '\\|');
					$tmp_nums *= count($_obfuscate_ZP00OgHeow);
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				if ($EM != 3) {
					return false;
				}

				$allnum = $tmp_nums;
				break;

			case 'ZXHZ':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$CC = array(1, 3, 6, 10, 15, 21, 28, 36, 45, 55, 63, 69, 73, 75, 75, 73, 69, 63, 55, 45, 36, 28, 21, 15, 10, 6, 3, 1);

				foreach ($_obfuscate_rEkmiBpD as $_obfuscate_MGudSgmX ) {
					if (!is_numeric($_obfuscate_MGudSgmX) || ($_obfuscate_MGudSgmX < 0) || (27 < $_obfuscate_MGudSgmX)) {
						return false;
					}

					$allnum += $CC[intval($_obfuscate_MGudSgmX)];
				}

				break;

			case 'ZUS':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$Jvf = count($_obfuscate_rEkmiBpD);

				if ($Jvf < 2) {
					return false;
				}

				for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
					$ptn .= ($ISOheader == $Jvf - 1 ? '\\d{1}' : '\\d{1}&');
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				$allnum += $Jvf * ($Jvf - 1);
				break;

			case 'ZUL':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$Jvf = count($_obfuscate_rEkmiBpD);

				if ($Jvf < 3) {
					return false;
				}

				for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
					$ptn .= ($ISOheader == $Jvf - 1 ? '\\d{1}' : '\\d{1}&');
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				$allnum += ($Jvf * ($Jvf - 1) * ($Jvf - 2)) / 6;
				break;

			case 'ZUHZ':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$CC = array(0, 1, 2, 2, 4, 5, 6, 8, 10, 11, 13, 14, 14, 15, 15, 14, 14, 13, 11, 10, 8, 6, 5, 4, 2, 2, 1);

				foreach ($_obfuscate_rEkmiBpD as $_obfuscate_MGudSgmX ) {
					if (!is_numeric($_obfuscate_MGudSgmX) || ($_obfuscate_MGudSgmX < 1) || (26 < $_obfuscate_MGudSgmX)) {
						return false;
					}

					$allnum += $CC[intval($_obfuscate_MGudSgmX)];
				}

				break;

			case 'BDW1':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$Jvf = count($_obfuscate_rEkmiBpD);

				if ($Jvf < 1) {
					return false;
				}

				if ($methodid == 500) {
					for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
						$ptn .= ($ISOheader == $Jvf - 1 ? '\\d{1,2}' : '\\d{1,2}&');
					}

					$ptn = '/^' . $ptn . '$/';
				}
				else {
					for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
						$ptn .= ($ISOheader == $Jvf - 1 ? '\\d{1}' : '\\d{1}&');
					}

					$ptn = '/^' . $ptn . '$/';
				}

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				$allnum = $Jvf;
				break;

			case 'SB':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$Jvf = count($_obfuscate_rEkmiBpD);

				if ($Jvf < 1) {
					return false;
				}

				$Uv = array('红波', '绿波', '蓝波');

				for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
					if (!in_array($_obfuscate_rEkmiBpD[$ISOheader], $Uv)) {
						return false;
					}

					if ($_obfuscate_rEkmiBpD[$ISOheader] == '红波') {
						$allnum += 17;
					}
					else {
						$allnum += 16;
					}
				}

				break;

			case 'SX':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$Jvf = count($_obfuscate_rEkmiBpD);

				if ($Jvf < 1) {
					return false;
				}

				$Uv = array('鼠', '牛', '虎', '兔', '龙', '蛇', '马', '羊', '猴', '鸡', '狗', '猪');

				for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
					if (!in_array($_obfuscate_rEkmiBpD[$ISOheader], $Uv)) {
						return false;
					}

					if ($_obfuscate_rEkmiBpD[$ISOheader] == '马') {
						$allnum += 5;
					}
					else {
						$allnum += 4;
					}
				}

				break;

			case 'BDW2':
			case 'ZU2':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$Jvf = count($_obfuscate_rEkmiBpD);

				if ($Jvf < 2) {
					return false;
				}

				for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
					$ptn .= ($ISOheader == $Jvf - 1 ? '\\d{1}' : '\\d{1}&');
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				$allnum += ($Jvf * ($Jvf - 1)) / 2;
				break;

			case 'ZX2':
				$_obfuscate_rEkmiBpD = explode('|', $codes);
				if (count($_obfuscate_rEkmiBpD) != 2) {
					return false;
				}

				for ($dos_skipping = 0; $dos_skipping < 2; $dos_skipping++) {
					if (strlen($_obfuscate_rEkmiBpD[$dos_skipping]) == 0) {
						$tmp_nums = 0;
						return false;
					}

					$_obfuscate_ZP00OgHeow = explode('&', $_obfuscate_rEkmiBpD[$dos_skipping]);
					$Jvf = count($_obfuscate_ZP00OgHeow);

					for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
						$ptn .= ($ISOheader == $Jvf - 1 ? '\\d' : '\\d&');
					}

					$ptn .= ($dos_skipping == 1 ? '' : '\\|');
					$tmp_nums *= $Jvf;
				}

				$ptn = '/^' . $ptn . '$/';
			
				if (!preg_match($ptn, $codes)) {
					return false;
				}
				$allnum = $tmp_nums;
				break;

			case 'DWD':
				if ($methodid == 176) {
					$_obfuscate_rEkmiBpD = explode('|', $codes);

					if (count($_obfuscate_rEkmiBpD) != 3) {
						return false;
					}

					for ($dos_skipping = 0; $dos_skipping < 3; $dos_skipping++) {
						$_obfuscate_ZP00OgHeow = explode('&', $_obfuscate_rEkmiBpD[$dos_skipping]);
						$Jvf = count($_obfuscate_ZP00OgHeow);

						if (strlen($_obfuscate_rEkmiBpD[$dos_skipping]) == 0) {
							$Jvf = 0;
						}

						for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
							$ptn .= ($ISOheader == $Jvf - 1 ? '\\d' : '\\d&');
						}

						$ptn .= ($dos_skipping == 2 ? '' : '\\|');
						$allnum += $Jvf;
					}

					$ptn = '/^' . $ptn . '$/';

					if (!preg_match($ptn, $codes)) {
						return false;
					}
				}
				else {
					$_obfuscate_rEkmiBpD = explode('|', $codes);

					if (count($_obfuscate_rEkmiBpD) != 5) {
						return false;
					}

					for ($dos_skipping = 0; $dos_skipping < 5; $dos_skipping++) {
						$_obfuscate_ZP00OgHeow = explode('&', $_obfuscate_rEkmiBpD[$dos_skipping]);
						$Jvf = count($_obfuscate_ZP00OgHeow);

						if (strlen($_obfuscate_rEkmiBpD[$dos_skipping]) == 0) {
							$Jvf = 0;
						}

						for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
							$ptn .= ($ISOheader == $Jvf - 1 ? '\\d' : '\\d&');
						}

						$ptn .= ($dos_skipping == 4 ? '' : '\\|');
						$allnum += $Jvf;
					}

					$ptn = '/^' . $ptn . '$/';

					if (!preg_match($ptn, $codes)) {
						return false;
					}
				}

				break;

			case 'BJL':
				$_obfuscate_rEkmiBpD = explode('|', $codes);

				if (count($_obfuscate_rEkmiBpD) != 2) {
					return false;
				}

				for ($dos_skipping = 0; $dos_skipping < 2; $dos_skipping++) {
					$_obfuscate_ZP00OgHeow = explode('&', $_obfuscate_rEkmiBpD[$dos_skipping]);
					$Jvf = count($_obfuscate_ZP00OgHeow);
					$allnum += $Jvf;
				}

				break;

			case '3DWD':
				$_obfuscate_rEkmiBpD = explode('|', $codes);

				if (count($_obfuscate_rEkmiBpD) != 3) {
					return false;
				}

				for ($dos_skipping = 0; $dos_skipping < 3; $dos_skipping++) {
					$_obfuscate_ZP00OgHeow = explode('&', $_obfuscate_rEkmiBpD[$dos_skipping]);
					$Jvf = count($_obfuscate_ZP00OgHeow);

					if (strlen($_obfuscate_rEkmiBpD[$dos_skipping]) == 0) {
						$Jvf = 0;
					}

					for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
						$ptn .= ($ISOheader == $Jvf - 1 ? '\\d' : '\\d&');
					}

					$ptn .= ($dos_skipping == 2 ? '' : '\\|');
					$allnum += $Jvf;
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				break;

			case 'DXDS':
				$_obfuscate_rEkmiBpD = explode('|', $codes);
				$Jvf = count($_obfuscate_rEkmiBpD);

				if ($Jvf != 2) {
					return false;
				}

				for ($dos_skipping = 0; $dos_skipping < 2; $dos_skipping++) {
					$_obfuscate_ZP00OgHeow = explode('&', $_obfuscate_rEkmiBpD[$dos_skipping]);
					$Jvf = count($_obfuscate_ZP00OgHeow);

					foreach ($_obfuscate_ZP00OgHeow as $v ) {
						if (($v != '大') && ($v != '小') && ($v != '单') && ($v != '双')) {
							return false;
						}
					}

					if ($Jvf == 0) {
						$allnum = 0;
						break;
					}

					$tmp_nums *= $Jvf;
				}

				$allnum = $tmp_nums;
				break;

			case 'SDZX3':
				$_obfuscate_rEkmiBpD = explode('|', $codes);

				if (count($_obfuscate_rEkmiBpD) != 3) {
					return false;
				}

				$_obfuscate_XvCDJ9UEhbs[0] = explode('&', $_obfuscate_rEkmiBpD[0]);
				$_obfuscate_XvCDJ9UEhbs[1] = explode('&', $_obfuscate_rEkmiBpD[1]);
				$_obfuscate_XvCDJ9UEhbs[2] = explode('&', $_obfuscate_rEkmiBpD[2]);
				$count0 = count($_obfuscate_XvCDJ9UEhbs[0]);
				$count1 = count($_obfuscate_XvCDJ9UEhbs[1]);
				$count2 = count($_obfuscate_XvCDJ9UEhbs[2]);
				if ((0 < $count0) && (0 < $count1) && (0 < $count2)) {
					for ($dos_skipping = 0; $dos_skipping < $count0; $dos_skipping++) {
						$ptn0 .= ($dos_skipping == $count0 - 1 ? '\\d{2}' : '\\d{2}&');

						for ($ISOheader = 0; $ISOheader < $count1; $ISOheader++) {
							if ($dos_skipping == 0) {
								$ptn1 .= ($ISOheader == $count1 - 1 ? '\\d{2}' : '\\d{2}&');
							}

							for ($k = 0; $k < $count2; $k++) {
								if (($dos_skipping == 0) && ($ISOheader == 0)) {
									$ptn2 .= ($k == $count2 - 1 ? '\\d{2}' : '\\d{2}&');
								}

								if (($_obfuscate_XvCDJ9UEhbs[0][$dos_skipping] != $_obfuscate_XvCDJ9UEhbs[1][$ISOheader]) && ($_obfuscate_XvCDJ9UEhbs[0][$dos_skipping] != $_obfuscate_XvCDJ9UEhbs[2][$k]) && ($_obfuscate_XvCDJ9UEhbs[1][$ISOheader] != $_obfuscate_XvCDJ9UEhbs[2][$k])) {
									$allnum++;
								}
							}
						}
					}
				}

				$ptn = '/^' . $ptn0 . '|' . $ptn1 . '|' . $ptn2 . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				break;

			case 'SDZU3':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$Jvf = count($_obfuscate_rEkmiBpD);

				if ($Jvf < 3) {
					return false;
				}

				for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
					$ptn .= ($ISOheader == $Jvf - 1 ? '\\d{2}' : '\\d{2}&');
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				$allnum += ($Jvf * ($Jvf - 1) * ($Jvf - 2)) / 6;
				break;

			case 'SDZX2':
				$_obfuscate_rEkmiBpD = explode('|', $codes);

				if (count($_obfuscate_rEkmiBpD) != 2) {
					return false;
				}

				$_obfuscate_XvCDJ9UEhbs[0] = explode('&', $_obfuscate_rEkmiBpD[0]);
				$_obfuscate_XvCDJ9UEhbs[1] = explode('&', $_obfuscate_rEkmiBpD[1]);
				$count0 = count($_obfuscate_XvCDJ9UEhbs[0]);
				$count1 = count($_obfuscate_XvCDJ9UEhbs[1]);
				if ((0 < $count0) && (0 < $count1)) {
					for ($dos_skipping = 0; $dos_skipping < $count0; $dos_skipping++) {
						$ptn0 .= ($dos_skipping == $count0 - 1 ? '\\d{2}' : '\\d{2}&');

						for ($ISOheader = 0; $ISOheader < $count1; $ISOheader++) {
							if ($dos_skipping == 0) {
								$ptn1 .= ($ISOheader == $count1 - 1 ? '\\d{2}' : '\\d{2}&');
							}

							if ($_obfuscate_XvCDJ9UEhbs[0][$dos_skipping] != $_obfuscate_XvCDJ9UEhbs[1][$ISOheader]) {
								$allnum++;
							}
						}
					}
				}

				$ptn = '/^' . $ptn0 . '|' . $ptn1 . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				break;

			case 'SDZU2':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$Jvf = count($_obfuscate_rEkmiBpD);

				if ($Jvf < 2) {
					return false;
				}

				for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
					$ptn .= ($ISOheader == $Jvf - 1 ? '\\d{2}' : '\\d{2}&');
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				$allnum += ($Jvf * ($Jvf - 1)) / 2;
				break;

			case 'SDBDW':
			case 'SDRX1':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$Jvf = count($_obfuscate_rEkmiBpD);

				for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
					$ptn .= ($ISOheader == $Jvf - 1 ? '\\d{2}' : '\\d{2}&');
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				$allnum = $Jvf;
				break;

			case 'SDDWD':
				$_obfuscate_rEkmiBpD = explode('|', $codes);

				if (count($_obfuscate_rEkmiBpD) != 3) {
					return false;
				}

				for ($dos_skipping = 0; $dos_skipping < 3; $dos_skipping++) {
					$_obfuscate_ZP00OgHeow = explode('&', $_obfuscate_rEkmiBpD[$dos_skipping]);
					$Jvf = count($_obfuscate_ZP00OgHeow);

					if (strlen($_obfuscate_rEkmiBpD[$dos_skipping]) == 0) {
						$Jvf = 0;
					}

					for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
						$ptn .= ($ISOheader == $Jvf - 1 ? '\\d{2}' : '\\d{2}&');
					}

					$ptn .= ($dos_skipping == 2 ? '' : '\\|');
					$allnum += $Jvf;
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				break;

			case 'SDRX2':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$Jvf = count($_obfuscate_rEkmiBpD);

				if ($Jvf < 2) {
					return false;
				}

				for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
					$ptn .= ($ISOheader == $Jvf - 1 ? '\\d{2}' : '\\d{2}&');
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				$allnum += ($Jvf * ($Jvf - 1)) / 2;
				break;

			case 'SDRX3':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$Jvf = count($_obfuscate_rEkmiBpD);

				if ($Jvf < 3) {
					return false;
				}

				for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
					$ptn .= ($ISOheader == $Jvf - 1 ? '\\d{2}' : '\\d{2}&');
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				$allnum += ($Jvf * ($Jvf - 1) * ($Jvf - 2)) / 6;
				break;

			case 'SDRX4':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$Jvf = count($_obfuscate_rEkmiBpD);

				if ($Jvf < 4) {
					return false;
				}

				for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
					$ptn .= ($ISOheader == $Jvf - 1 ? '\\d{2}' : '\\d{2}&');
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				$allnum += ($Jvf * ($Jvf - 1) * ($Jvf - 2) * ($Jvf - 3)) / 24;
				break;

			case 'SDRX5':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$Jvf = count($_obfuscate_rEkmiBpD);

				if ($Jvf < 5) {
					return false;
				}

				for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
					$ptn .= ($ISOheader == $Jvf - 1 ? '\\d{2}' : '\\d{2}&');
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				$allnum += ($Jvf * ($Jvf - 1) * ($Jvf - 2) * ($Jvf - 3) * ($Jvf - 4)) / 120;
				break;

			case 'SDRX6':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$Jvf = count($_obfuscate_rEkmiBpD);

				if ($Jvf < 6) {
					return false;
				}

				for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
					$ptn .= ($ISOheader == $Jvf - 1 ? '\\d{2}' : '\\d{2}&');
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				$allnum += ($Jvf * ($Jvf - 1) * ($Jvf - 2) * ($Jvf - 3) * ($Jvf - 4) * ($Jvf - 5)) / 720;
				break;

			case 'SDRX7':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$Jvf = count($_obfuscate_rEkmiBpD);

				if ($Jvf < 7) {
					return false;
				}

				for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
					$ptn .= ($ISOheader == $Jvf - 1 ? '\\d{2}' : '\\d{2}&');
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				$allnum += ($Jvf * ($Jvf - 1) * ($Jvf - 2) * ($Jvf - 3) * ($Jvf - 4) * ($Jvf - 5) * ($Jvf - 6)) / 5040;
				break;

			case 'SDRX8':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$Jvf = count($_obfuscate_rEkmiBpD);

				if ($Jvf < 8) {
					return false;
				}

				for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
					$ptn .= ($ISOheader == $Jvf - 1 ? '\\d{2}' : '\\d{2}&');
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				$allnum += ($Jvf * ($Jvf - 1) * ($Jvf - 2) * ($Jvf - 3) * ($Jvf - 4) * ($Jvf - 5) * ($Jvf - 6) * ($Jvf - 7)) / 40320;
				break;

			case 'SDDDS':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$Jvf = count($_obfuscate_rEkmiBpD);

				foreach ($_obfuscate_rEkmiBpD as $v ) {
					if (($v != '5单0双') && ($v != '4单1双') && ($v != '3单2双') && ($v != '2单3双') && ($v != '1单4双') && ($v != '0单5双')) {
						return false;
					}
				}

				if ($Jvf == 0) {
					$allnum = 0;
					break;
				}

				$allnum = $Jvf;
				break;

			case 'SDCZW':
				$_obfuscate_rEkmiBpD = explode('&', $codes);
				$Jvf = count($_obfuscate_rEkmiBpD);

				for ($ISOheader = 0; $ISOheader < $Jvf; $ISOheader++) {
					$ptn .= ($ISOheader == $Jvf - 1 ? '\\d' : '\\d&');
				}

				$ptn = '/^' . $ptn . '$/';

				if (!preg_match($ptn, $codes)) {
					return false;
				}

				$allnum = $Jvf;
				break;

			default:
				return false;
				break;
			}
		}

		if ($bs === intval($bs)) {
		}
		else {
			return false;
		}

		if ($bs < 1) {
			return false;
		}

		if ($mode == 1) {
			$allmoney = $allnum * 2 * $bs;
		}

		if ($mode == 2) {
			$allmoney = $allnum * 0.2 * $bs;
		}

		if ($mode == 3) {
			$allmoney = $allnum * 0.02 * $bs;
		}

		if (($allnum == $nums) && (abs($allmoney - $money) < 1.0E-6) && (0 < $allmoney)) {
			return true;
		}

		return false;
	}

	public function checkNum($methodid, $codes, $nums, $money, $mode, $bs, $type)
	{
	}

	public function getSliderPrizeMode($prize)
	{
		Cookie::set('currentBonus', $prize);
		$minbonus = Cache::get('minbonus');
		$maxbonus = Cache::get('maxbonus');

		if (empty($minbonus)) {
			// $Dao = m('Webconfig');
			$Data = Db::name('Webconfig')->find();
			$minbonus = (int) $Data['minbonus'];
			$maxbonus = (int) $Data['maxbonus'];
			Cache::set('maxbonus', $maxbonus, 3600 * 24);
			Cache::set('minbonus', $minbonus, 3600 * 24);
		}

		if (($minbonus <= $prize) && ($prize <= $maxbonus) && (($prize % 10) == 0)) {
			return $prize;
		}
		else {
			return Config::get('baseBouns');
		}
	}
}


?>
