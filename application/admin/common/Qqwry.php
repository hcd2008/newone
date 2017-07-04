<?php
namespace app\admin\common;

class Qqwry
{
	public $StartIP = 0;
	public $EndIP = 0;
	public $Country = '';
	public $Local = '';
	public $CountryFlag = 0;
	public $fp;
	public $FirstStartIp = 0;
	public $LastStartIp = 0;
	public $EndIpOff = 0;

	public function __construct()
	{
	}

	public function getStartIp($RecNo)
	{
		$offset = $this->FirstStartIp + ($RecNo * 7);
		@fseek($this->fp, $offset, SEEK_SET);
		$buf = fread($this->fp, 7);
		$this->EndIpOff = ord($buf[4]) + (ord($buf[5]) * 256) + (ord($buf[6]) * 256 * 256);
		$this->StartIp = ord($buf[0]) + (ord($buf[1]) * 256) + (ord($buf[2]) * 256 * 256) + (ord($buf[3]) * 256 * 256 * 256);
		return $this->StartIp;
	}

	public function getEndIp()
	{
		@fseek($this->fp, $this->EndIpOff, SEEK_SET);
		$buf = fread($this->fp, 5);
		$this->EndIp = ord($buf[0]) + (ord($buf[1]) * 256) + (ord($buf[2]) * 256 * 256) + (ord($buf[3]) * 256 * 256 * 256);
		$this->CountryFlag = ord($buf[4]);
		return $this->EndIp;
	}

	public function getCountry()
	{
		switch ($this->CountryFlag) {
		case 1:
		case 2:
			$this->Country = $this->getFlagStr($this->EndIpOff + 4);
			$this->Local = 1 == $this->CountryFlag ? '' : $this->getFlagStr($this->EndIpOff + 8);
			break;

		default:
			$this->Country = $this->getFlagStr($this->EndIpOff + 4);
			$this->Local = $this->getFlagStr(ftell($this->fp));
		}
	}

	public function getFlagStr($offset)
	{
		$flag = 0;

		while (1) {
			@fseek($this->fp, $offset, SEEK_SET);
			$flag = ord(fgetc($this->fp));
			if (($flag == 1) || ($flag == 2)) {
				$buf = fread($this->fp, 3);

				if ($flag == 2) {
					$this->CountryFlag = 2;
					$this->EndIpOff = $offset - 4;
				}

				$offset = ord($buf[0]) + (ord($buf[1]) * 256) + (ord($buf[2]) * 256 * 256);
			}
			else {
				break;
			}
		}

		if ($offset < 12) {
			return '';
		}

		@fseek($this->fp, $offset, SEEK_SET);
		return $this->getStr();
	}

	public function getStr()
	{
		$str = '';

		while (1) {
			$Jvf = fgetc($this->fp);

			if (ord($Jvf[0]) == 0) {
				break;
			}

			$str .= $Jvf;
		}

		return $str;
	}

	public function qqwry($dotip = '')
	{
		if (!is_string($dotip) || ($dotip == '')) {
			return NULL;
		}

		if (preg_match('/^127/', $dotip)) {
			$this->Country = iconv('UTF-8', 'GB2312', '本地网络');
			return NULL;
		}
		else if (preg_match('/^192/', $dotip)) {
			$this->Country = iconv('UTF-8', 'GB2312', '局域网');
			return NULL;
		}

		$_obfuscate_zzFRYQ = 3;
		$ip = $this->IpToInt($dotip);
		$this->fp = fopen(__QQWRY__, 'rb');

		if ($this->fp == NULL) {
			$_obfuscate_3AGSTnOWAA = 'OpenFileError';
			return 1;
		}

		@fseek($this->fp, 0, SEEK_SET);
		$buf = fread($this->fp, 8);
		$this->FirstStartIp = ord($buf[0]) + (ord($buf[1]) * 256) + (ord($buf[2]) * 256 * 256) + (ord($buf[3]) * 256 * 256 * 256);
		$this->LastStartIp = ord($buf[4]) + (ord($buf[5]) * 256) + (ord($buf[6]) * 256 * 256) + (ord($buf[7]) * 256 * 256 * 256);
		$RecordCount = floor(($this->LastStartIp - $this->FirstStartIp) / 7);

		if ($RecordCount <= 1) {
			$this->Country = 'FileDataError';
			fclose($this->fp);
			return 2;
		}

		$RangB = 0;
		$_obfuscate_EsNZCIY = $RecordCount;

		while ($RangB < ($_obfuscate_EsNZCIY - 1)) {
			$RecNo = floor(($RangB + $_obfuscate_EsNZCIY) / 2);
			$this->getStartIp($RecNo);

			if ($ip == $this->StartIp) {
				$RangB = $RecNo;
				break;
			}

			if ($this->StartIp < $ip) {
				$RangB = $RecNo;
			}
			else {
				$_obfuscate_EsNZCIY = $RecNo;
			}
		}

		$this->getStartIp($RangB);
		$this->getEndIp();
		if (($this->StartIp <= $ip) && ($ip <= $this->EndIp)) {
			$_obfuscate_zzFRYQ = 0;
			$this->getCountry();
			$this->Local = str_replace('（我们一定要解放台湾！！！）', '', $this->Local);
		}
		else {
			$_obfuscate_zzFRYQ = 3;
			$this->Country = '未知';
			$this->Local = '';
		}

		fclose($this->fp);
		$this->Country = preg_replace('/(CZ88.NET)|(纯真网络)/', '局域网/未知', $this->Country);
		$this->Local = preg_replace('/(CZ88.NET)|(纯真网络)/', '局域网/未知', $this->Local);
		return $_obfuscate_zzFRYQ;
	}

	public function IpToInt($Ip)
	{
		$array = explode('.', $Ip);
		$Int = ($array[0] * 256 * 256 * 256) + ($array[1] * 256 * 256) + ($array[2] * 256) + $array[3];
		return $Int;
	}
}


?>
