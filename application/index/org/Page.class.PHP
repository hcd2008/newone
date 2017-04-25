<?php

class Page
{
	/**
     +----------------------------------------------------------
     * 分页起始行数
     +----------------------------------------------------------
     * @var integer
     * @access protected
     +----------------------------------------------------------
     */
	public $firstRow;
	/**
     +----------------------------------------------------------
     * 列表每页显示行数
     +----------------------------------------------------------
     * @var integer
     * @access protected
     +----------------------------------------------------------
     */
	public $listRows;
	/**
     +----------------------------------------------------------
     * 页数跳转时要带的参数
     +----------------------------------------------------------
     * @var integer
     * @access protected
     +----------------------------------------------------------
     */
	protected $parameter;
	/**
     +----------------------------------------------------------
     * 分页总页面数
     +----------------------------------------------------------
     * @var integer
     * @access protected
     +----------------------------------------------------------
     */
	protected $totalPages;
	/**
     +----------------------------------------------------------
     * 总行数
     +----------------------------------------------------------
     * @var integer
     * @access protected
     +----------------------------------------------------------
     */
	protected $totalRows;
	/**
     +----------------------------------------------------------
     * 当前页数
     +----------------------------------------------------------
     * @var integer
     * @access protected
     +----------------------------------------------------------
     */
	protected $nowPage;
	/**
     +----------------------------------------------------------
     * 分页的栏的总页数
     +----------------------------------------------------------
     * @var integer
     * @access protected
     +----------------------------------------------------------
     */
	protected $coolPages;
	/**
     +----------------------------------------------------------
     * 分页栏每页显示的页数
     +----------------------------------------------------------
     * @var integer
     * @access protected
     +----------------------------------------------------------
     */
	protected $rollPage;
	/**
     +----------------------------------------------------------
     * 分页记录名称
     +----------------------------------------------------------
     * @var integer
     * @access protected
     +----------------------------------------------------------
     */
	protected $config = array('header' => '条记录', 'prev' => '上一页', 'next' => '下一页', 'first' => '第一页', 'last' => '最后一页');

	public function __construct($totalRows, $listRows = '', $parameter = '')
	{
		$this->totalRows = $totalRows;
		$this->parameter = $parameter;
		$this->rollPage = c('PAGE_NUMBERS');
		$this->listRows = !empty($listRows) ? $listRows : c('LIST_NUMBERS');
		$this->totalPages = ceil($this->totalRows / $this->listRows);
		$this->coolPages = ceil($this->totalPages / $this->rollPage);
		$this->nowPage = !empty($_GET[c('VAR_PAGE')]) && (0 < $_GET[c('VAR_PAGE')]) ? $_GET[c('VAR_PAGE')] : 1;
		if (!empty($this->totalPages) && ($this->totalPages < $this->nowPage)) {
			$this->nowPage = $this->totalPages;
		}

		$this->firstRow = $this->listRows * ($this->nowPage - 1);
	}

	public function setConfig($name, $value)
	{
		if (isset($this->config[$name])) {
			$this->config[$name] = $value;
		}
	}

	public function show($isArray = false)
	{
		if (0 == $this->totalRows) {
			return NULL;
		}

		$nowCoolPage = ceil($this->nowPage / $this->rollPage);
		$url = $_SERVER['REQUEST_URI'] . (strpos($_SERVER['REQUEST_URI'], '?') ? '' : '?') . $this->parameter;
		$prevRow = $this->nowPage - 1;
		$downRow = $this->nowPage + 1;

		if (0 < $prevRow) {
			$upPage = '[<a href=\'' . $url . '&' . c('VAR_PAGE') . '=' . $prevRow . '\'>' . $this->config['prev'] . '</a>]';
		}
		else {
			$upPage = '';
		}

		if ($downRow <= $this->totalPages) {
			$downPage = '[<a href=\'' . $url . '&' . c('VAR_PAGE') . '=' . $downRow . '\'>' . $this->config['next'] . '</a>]';
		}
		else {
			$downPage = '';
		}

		if ($nowCoolPage == 1) {
			$theFirst = '';
			$prePage = '';
		}
		else {
			$preRow = $this->nowPage - $this->rollPage;
			$prePage = '[<a href=\'' . $url . '&' . c('VAR_PAGE') . '=' . $preRow . '\' >上' . $this->rollPage . '页</a>]';
			$theFirst = '[<a href=\'' . $url . '&' . c('VAR_PAGE') . '=1\' >' . $this->config['first'] . '</a>]';
		}

		if ($nowCoolPage == $this->coolPages) {
			$_obfuscate_GtG52JTi4GE = '';
			$theEnd = '';
		}
		else {
			$nextRow = $this->nowPage + $this->rollPage;
			$theEndRow = $this->totalPages;
			$_obfuscate_GtG52JTi4GE = '[<a href=\'' . $url . '&' . c('VAR_PAGE') . '=' . $nextRow . '\' >下' . $this->rollPage . '页</a>]';
			$theEnd = '[<a href=\'' . $url . '&' . c('VAR_PAGE') . '=' . $theEndRow . '\' >' . $this->config['last'] . '</a>]';
		}

		$linkPage = '';

		for ($dos_skipping = 1; $dos_skipping <= $this->rollPage; $dos_skipping++) {
			$page = (($nowCoolPage - 1) * $this->rollPage) + $dos_skipping;

			if ($page != $this->nowPage) {
				if ($page <= $this->totalPages) {
					$linkPage .= '&nbsp;<a href=\'' . $url . '&' . c('VAR_PAGE') . '=' . $page . '\'>&nbsp;' . $page . '&nbsp;</a>';
				}
				else {
					break;
				}
			}
			else if ($this->totalPages != 1) {
				$linkPage .= ' [' . $page . ']';
			}
		}

		$_obfuscate_9k1ui89yUg = '共' . $this->totalRows . ' ' . $this->config['header'] . '/' . $this->totalPages . '页 ' . $upPage . ' ' . $downPage . ' ' . $theFirst . ' ' . $prePage . ' ' . $linkPage . ' ' . $_obfuscate_GtG52JTi4GE . ' ' . $theEnd;

		if ($isArray) {
			$pageArray['totalRows'] = $this->totalRows;
			$pageArray['upPage'] = $url . '&' . c('VAR_PAGE') . '=' . $prevRow;
			$pageArray['downPage'] = $url . '&' . c('VAR_PAGE') . '=' . $downRow;
			$pageArray['totalPages'] = $this->totalPages;
			$pageArray['firstPage'] = $url . '&' . c('VAR_PAGE') . '=1';
			$pageArray['endPage'] = $url . '&' . c('VAR_PAGE') . '=' . $theEndRow;
			$pageArray['nextPages'] = $url . '&' . c('VAR_PAGE') . '=' . $nextRow;
			$pageArray['prePages'] = $url . '&' . c('VAR_PAGE') . '=' . $preRow;
			$pageArray['linkPages'] = $linkPage;
			$pageArray['nowPage'] = $this->nowPage;
			return $pageArray;
		}

		return $_obfuscate_9k1ui89yUg;
	}
}


?>
