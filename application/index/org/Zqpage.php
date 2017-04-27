<?php
namespace app\index\org;
use think\Config;
class Zqpage
{
	public $type;
	public $firstRow;
	public $listRows;
	public $parameter;
	public $style;
	protected $language;
	protected $classNames = array('default', 'baidu', 'yahoo', 'digg', 'orange', 'sabrosus', 'scott', 'quotes', 'yellow');
	protected $totalPages;
	protected $totalRows;
	protected $nowPage;
	protected $coolPages;
	protected $rollPage;
	protected $config = array('rows_info' => '总条数:', 'pages_info' => '当前页:', 'prev' => '上一页', 'next' => '下一页', 'up' => '快退', 'down' => '快进', 'first' => '首页', 'last' => '尾页', 'theme' => '%rows_info% %totalRows% %pages_info% %nowPage%/%totalPage% &nbsp; %first% %prePage% %upPage% %linkPage% %downPage% %nextPage% %end%');

	public function __construct($totalRows, $listRows, $style = 0, $language = 0, $type = 3, $parameter = '')
	{
		$this->language = $language;
		$this->type = $type;
		$this->style = $style;
		$this->totalRows = $totalRows;
		$this->parameter = $parameter;
		$this->rollPage = Config::get('PAGE_ROLLPAGE');
		$this->listRows = !empty($listRows) ? $listRows : c('PAGE_LISTROWS');
		$this->totalPages = ceil($this->totalRows / $this->listRows);
		$this->coolPages = ceil($this->totalPages / $this->rollPage);
		$this->nowPage = !empty($_GET[Config::get('VAR_PAGE')]) ? $_GET[Config::get('VAR_PAGE')] : 1;
		if (!empty($this->totalPages) && ($this->totalPages < $this->nowPage)) {
			$this->nowPage = $this->totalPages;
		}

		$this->firstRow = $this->listRows * ($this->nowPage - 1);
	}

	public function getPage()
	{
		return $this->nowPage;
	}

	public function setConfig($name, $value)
	{
		if (isset($this->config[$name])) {
			$this->config[$name] = $value;
		}
	}

	public function show()
	{
		if (0 == $this->totalRows) {
			return '';
		}

		if (!is_int($this->style)) {
			$this->style = 0;
		}

		if ($this->language == 1) {
			$this->config['prev'] = 'Front';
			$this->config['up'] = 'Rewind';
			$this->config['next'] = 'Next';
			$this->config['down'] = 'Fast Forward';
			$this->config['first'] = 'First';
			$this->config['last'] = 'Last';
			$this->config['rows_info'] = 'Total:';
			$this->config['pages_info'] = 'Page:';
		}

		if (1 < $this->language) {
			$this->config['prev'] = '&lt;';
			$this->config['next'] = '&gt;';
			$this->config['up'] = '&lt;&lt;';
			$this->config['down'] = '&gt;&gt;';
			$this->config['first'] = '|&lt;';
			$this->config['last'] = '&gt;|';
		}

		if ($this->language == 2) {
			$this->config['rows_info'] = '总条数:';
			$this->config['pages_info'] = '当前页:';
		}

		if ($this->language == 3) {
			$this->config['rows_info'] = 'Total:';
			$this->config['pages_info'] = 'Page:';
		}

		$style = $this->classNames[$this->style];
		$_obfuscate_pn0 = array('', '');

		if ($this->style == 1) {
			$_obfuscate_pn0 = array('[', ']');
		}

		$banner_web_show_tt = c('VAR_PAGE');
		$_obfuscate_0J9maLP1Y5PBjw = ceil($this->nowPage / $this->rollPage);
		$url = $_SERVER['REQUEST_URI'] . (strpos($_SERVER['REQUEST_URI'], '?') ? '' : '?') . $this->parameter;
		$parse = parse_url($url);

		if (isset($parse['query'])) {
			parse_str($parse['query'], $params);
			unset($params[$banner_web_show_tt]);
			$url = $parse['path'] . '?' . http_build_query($params);
		}

		$prevRow = $this->nowPage - 1;
		$downRow = $this->nowPage + 1;

		if (0 < $prevRow) {
			$upPage = '<a href=\'' . $url . '&' . $banner_web_show_tt . '=' . $prevRow . '\'>' . $this->config['prev'] . '</a>&nbsp;';
		}
		else if (1 < $this->style) {
			$upPage = '<span class=\'disabled\'>' . $this->config['prev'] . '</span>&nbsp;';
		}
		else {
			$upPage = '';
		}

		if ($downRow <= $this->totalPages) {
			$downPage = '&nbsp;<a href=\'' . $url . '&' . $banner_web_show_tt . '=' . $downRow . '\'>' . $this->config['next'] . '</a>&nbsp;';
		}
		else if (1 < $this->style) {
			$downPage = '&nbsp;<span class=\'disabled\'>' . $this->config['next'] . '</span>';
		}
		else {
			$downPage = '';
		}

		if ($_obfuscate_0J9maLP1Y5PBjw == 1) {
			$theFirst = '';
			$prePage = '';

			if (1 < $this->style) {
				$theFirst = '&nbsp;&nbsp;&nbsp;&nbsp;<span class=\'disabled\'>' . $this->config['first'] . '</span>';
			}
		}
		else {
			$preRow = $this->nowPage - $this->rollPage;
			$prePage = '<a href=\'' . $url . '&' . $banner_web_show_tt . '=' . $preRow . '\' >' . $this->config['up'] . '</a>';
			$theFirst = '&nbsp;&nbsp;&nbsp;&nbsp;<a href=\'' . $url . '&' . $banner_web_show_tt . '=1\' >' . $this->config['first'] . '</a>';
		}

		if ($_obfuscate_0J9maLP1Y5PBjw == $this->ColPages) {
			$_obfuscate_GtG52JTi4GE = '';
			$theEnd = '';

			if (1 < $this->style) {
				$theEnd = '<span class=\'disabled\'>' . $this->config['last'] . '</span>';
			}
		}
		else {
			$nextRow = $this->nowPage + $this->rollPage;
			$theEndRow = $this->totalPages;
			$_obfuscate_GtG52JTi4GE = '<a href=\'' . $url . '&' . $banner_web_show_tt . '=' . $nextRow . '\' >' . $this->config['down'] . '</a>';
			$theEnd = '<a href=\'' . $url . '&' . $banner_web_show_tt . '=' . $theEndRow . '\' >' . $this->config['last'] . '</a>';
		}

		$linkPage = '';

		for ($dos_skipping = 1; $dos_skipping <= $this->rollPage; $dos_skipping++) {
			$page = (($_obfuscate_0J9maLP1Y5PBjw - 1) * $this->rollPage) + $dos_skipping;

			if ($page != $this->nowPage) {
				if ($page <= $this->totalPages) {
					$linkPage .= '&nbsp;<a href=\'' . $url . '&' . $banner_web_show_tt . '=' . $page . '\'>' . $_obfuscate_pn0[0] . '&nbsp;' . $page . '&nbsp;' . $_obfuscate_pn0[1] . '</a>&nbsp;';
				}
				else {
					break;
				}
			}
			else if ($this->totalPages != 1) {
				$linkPage .= '&nbsp;<span class=\'current\'>' . $page . '</span>&nbsp;';
			}
		}

		if ($this->type == 3) {
			$_obfuscate_WWoEExOi3SI = '<div class="' . $style . '">' . '%rows_info% %totalRows% %pages_info% %nowPage%/%totalPage% &nbsp; %first% %prePage% %upPage% %linkPage% %downPage% %nextPage% %end%' . '</div>';
		}
		else if ($this->type == 2) {
			$_obfuscate_WWoEExOi3SI = '<div class="' . $style . '">' . '%rows_info% %totalRows% %pages_info% %nowPage%/%totalPage% &nbsp; %first% %upPage% %linkPage% %downPage% %end%' . '</div>';
		}
		else if ($this->type == 1) {
			$_obfuscate_WWoEExOi3SI = '<div class="' . $style . '">' . '%first% %upPage% %linkPage% %downPage% %end%' . '</div>';
		}
		else if ($this->type == 0) {
			$_obfuscate_WWoEExOi3SI = '<div class="' . $style . '">' . '%first% %upPage%%downPage% %end%' . '</div>';
		}
		else {
			$_obfuscate_WWoEExOi3SI = '<div class="' . $style . '">' . $this->config['theme'] . '</div>';
		}

		$_obfuscate_9k1ui89yUg = str_replace(array('%rows_info%', '%pages_info%', '%nowPage%', '%totalRows%', '%totalPage%', '%upPage%', '%downPage%', '%first%', '%prePage%', '%linkPage%', '%nextPage%', '%end%'), array($this->config['rows_info'], $this->config['pages_info'], $this->nowPage, $this->totalRows, $this->totalPages, $upPage, $downPage, $theFirst, $prePage, $linkPage, $_obfuscate_GtG52JTi4GE, $theEnd), $_obfuscate_WWoEExOi3SI);
		return $_obfuscate_9k1ui89yUg;
	}
}


?>
