(function($) {
	if (!Array.prototype.indexOf)
	{
	  Array.prototype.indexOf = function(elt /*, from*/)
	  {
		var len = this.length >>> 0;

		var from = Number(arguments[1]) || 0;
		from = (from < 0)
			 ? Math.ceil(from)
			 : Math.floor(from);
		if (from < 0)
		  from += len;

		for (; from < len; from++)
		{
		  if (from in this &&
			  this[from] === elt)
			return from;
		}
		return -1;
	  };
	}
    if (/^1.2/.test($.fn.jquery) || /^1.1/.test($.fn.jquery)) {
        alert("requires jQuery v1.3 or later!  You are using v" + $.fn.jquery);
        return
    }
    $.playInit = function(opts) {    	
        var ps = {
            data_label: [],
            data_id: {
                id_cur_issue: "#current_issue",//当前期数
                id_cur_end: "#current_endtime",//距本期销售截止时间
                id_cur_sale: "#current_sale",
                id_cur_left: "#current_left",
                id_count_down: "#count_down",//购买剩余时间
                id_labelbox: "#tabbar-div-s2",
                id_smalllabel: "#tabbar-div-s3",
                id_methoddesc: "#lt_desc",
                id_methodhelp: "#lt_help",
                id_helpdiv: "#lt_help_div",
                id_selector: "#lt_selector",//数字显示区域
                id_sel_num: "#lt_sel_nums",
                id_sel_money: "#lt_sel_money",
                id_sel_times: "#lt_sel_times",
                id_sel_insert: "#lt_sel_insert",
                id_sel_modes: "#lt_sel_modes",
                id_sel_prize: "#lt_sel_prize",
                id_cf_count: "#lt_cf_count",
                id_cf_clear: "#lt_cf_clear",
                id_cf_content: "#lt_cf_content",
                id_cf_num: "#lt_cf_nums",
                id_cf_money: "#lt_cf_money",
                id_cf_help: "#lt_cf_help",
                id_issues: "#lt_issues",
                id_sendok: "#lt_buy",
                id_tra_if: "#lt_trace_if",
                id_tra_stop: "#lt_trace_stop",
                id_tra_box1: "#lt_trace_box",
                id_tra_box2: "#lt_trace_box2",
                id_tra_alct: "#lt_trace_alcount",
                id_tra_label: "#lt_trace_label",
                id_tra_lhtml: "#lt_trace_labelhtml",
                id_tra_ok: "#lt_trace_ok",
                id_tra_issues: "#lt_trace_issues"
            },
            cur_issue: {
                issue: "20100210-001",
                endtime: "2010-02-10 09:10:00",
                opentime: "2011-02-10 09:10:00"
            },
            issues: {
                today: [],
                tomorrow: []
            },
            servertime: "2011-02-10 09:09:40",
            ajaxurl: "",
            lotteryid: 1,
            isdynamic: 1,
            ontimeout: function() {},
            onfinishbuy: function() {$("#leftframe", parent.document).contents().find("#refreshimg").click();},
            test: "jiang"
        };
        
        opts = $.extend({}, ps, opts || {});
     // alert(opts.data_id.id_tra_box2);
        //该方法就是将src合并到jquery的全局对象中去
        $.extend({
            lt_id_data: opts.data_id,
            lt_method_data: {},
            lt_method: {
                14 : "ZX3",
                15 : "ZXHZ",
                16 : "ZX3",
                17 : "ZXHZ",
                18 : "ZUS",
                19 : "ZUL",
                20 : "HHZX",
                21 : "ZUHZ",
                22 : "ZUS",
                23 : "ZUL",
                24 : "HHZX",
                25 : "ZUHZ",
                26 : "BDW1",
                27 : "BDW2",
                28 : "ZX2",
                30 : "ZU2",
                29 : "ZX2",
                31 : "ZU2",
                32 : "DWD",
                33 : "DWD",
                34 : "DWD",
                35 : "DWD",
                36 : "DWD",
                37 : "DXDS",
                38 : "DXDS",
				39 : "BDW1",
                40 : "BDW2",
                52 : "ZX3",
                53 : "ZXHZ",
                54 : "ZX3",
                55 : "ZXHZ",
                56 : "ZUS",
                57 : "ZUL",
                58 : "HHZX",
                59 : "ZUHZ",
                60 : "ZUS",
                61 : "ZUL",
                62 : "HHZX",
                63 : "ZUHZ",
                64 : "BDW1",
                65 : "BDW2",
                66 : "ZX2",
                67 : "ZX2",
                68 : "ZU2",
                69 : "ZU2",
                70 : "DWD",
                71 : "DWD",
                72 : "DWD",
                73 : "DWD",
                74 : "DWD",
                75 : "DXDS",
                76 : "DXDS",
                90 : "ZX3",
                91 : "ZXHZ",
                92 : "ZX3",
                93 : "ZXHZ",
                94 : "ZUS",
                95 : "ZUL",
                96 : "HHZX",
                97 : "ZUHZ",
                98 : "ZUS",
                99 : "ZUL",
                100 : "HHZX",
                101 : "ZUHZ",
                102 : "BDW1",
                103 : "BDW2",
                104 : "ZX2",
                105 : "ZX2",
                106 : "ZU2",
                107 : "ZU2",
                108 : "DWD",
                109 : "DWD",
                110 : "DWD",
                111 : "DWD",
                112 : "DWD",
                113 : "DXDS",
                114 : "DXDS",
				115 : "BDW1",
                116 : "BDW2",
                128 : "ZX3",
                129 : "ZXHZ",
                130 : "ZX3",
                131 : "ZXHZ",
                132 : "ZUS",
                133 : "ZUL",
                134 : "HHZX",
                135 : "ZUHZ",
                136 : "ZUS",
                137 : "ZUL",
                138 : "HHZX",
                139 : "ZUHZ",
                140 : "BDW1",
                141 : "BDW2",
                142 : "ZX2",
                143 : "ZX2",
                144 : "ZU2",
                145 : "ZU2",
                146 : "DWD",
                147 : "DWD",
                148 : "DWD",
                149 : "DWD",
                150 : "DWD",
                151 : "DXDS",
                152 : "DXDS",
				153 : "BDW1",
                154 : "BDW2",
                164 : "ZX3",
                165 : "ZXHZ",
                166 : "ZUS",
                167 : "ZUL",
                168 : "HHZX",
                169 : "ZUHZ",
                170 : "BDW1",
                171 : "BDW2",
                172 : "ZX2",
                173 : "ZX2",
                174 : "ZU2",
                175 : "ZU2",
                176 : "DWD",
                177 : "DWD",
                178 : "DWD",
                179 : "DXDS",
                180 : "DXDS",
                197 : "SDZX3",
                198 : "SDZU3",
                199 : "SDZX2",
                200 : "SDZU2",
                201 : "SDBDW",
                202 : "SDDWD",
                203 : "SDDWD",
                204 : "SDDWD",
                205 : "SDDDS",
                206 : "SDCZW",
                207 : "SDRX1",
                208 : "SDRX2",
                209 : "SDRX3",
                210 : "SDRX4",
                211 : "SDRX5",
                212 : "SDRX6",
                213 : "SDRX7",
                214 : "SDRX8",
                231 : "SDZX3",
                232 : "SDZU3",
                233 : "SDZX2",
                234 : "SDZU2",
                235 : "SDBDW",
                236 : "SDDWD",
                237 : "SDDWD",
                238 : "SDDWD",
                239 : "SDDDS",
                240 : "SDCZW",
                241 : "SDRX1",
                242 : "SDRX2",
                243 : "SDRX3",
                244 : "SDRX4",
                245 : "SDRX5",
                246 : "SDRX6",
                247 : "SDRX7",
                248 : "SDRX8",
                265 : "SDZX3",
                266 : "SDZU3",
                267 : "SDZX2",
                268 : "SDZU2",
                269 : "SDBDW",
                270 : "SDDWD",
                271 : "SDDWD",
                272 : "SDDWD",
                273 : "SDDDS",
                274 : "SDCZW",
                275 : "SDRX1",
                276 : "SDRX2",
                277 : "SDRX3",
                278 : "SDRX4",
                279 : "SDRX5",
                280 : "SDRX6",
                281 : "SDRX7",
                282 : "SDRX8",
                294 : "ZX3",
                295 : "ZXHZ",
                296 : "ZUS",
                297 : "ZUL",
                298 : "HHZX",
                299 : "ZUHZ",
                300 : "BDW1",
                301 : "BDW2",
                302 : "ZX2",
                303 : "ZX2",
                304 : "ZU2",
                305 : "ZU2",
                306 : "DWD",
                307 : "DWD",
                308 : "DWD",
                309 : "DXDS",
                310 : "DXDS",
                322 : "ZX3",
                323 : "ZXHZ",
                324 : "ZUS",
                325 : "ZUL",
                326 : "HHZX",
                327 : "ZUHZ",
                328 : "BDW1",
                329 : "BDW2",
                330 : "ZX2",
                331 : "ZX2",
                332 : "ZU2",
                333 : "ZU2",
                334 : "DWD",
                335 : "DWD",
                336 : "DWD",
                337 : "DWD",
                338 : "DWD",
                339 : "DXDS",
                340 : "DXDS",
                358 : "SDZX3",
                359 : "SDZU3",
                360 : "SDZX2",
                361 : "SDZU2",
                362 : "SDBDW",
                363 : "SDDWD",
                364 : "SDDWD",
                365 : "SDDWD",
                366 : "SDDDS",
                367 : "SDCZW",
                368 : "SDRX1",
                369 : "SDRX2",
                370 : "SDRX3",
                371 : "SDRX4",
                372 : "SDRX5",
                373 : "SDRX6",
                374 : "SDRX7",
                375 : "SDRX8",
				400:"ZX5",
				1240:"ZX5",
				401:"ZX4",
				402:"ZX4",
				403:"ZX3",
				404:"ZXHZ",
				405:"ZUS",
				406:"ZUL",
				407:"HHZX",
				408:"ZUHZ",
				409:"BJL",
				410:"RX3",
				411:"RX2",
				420:"ZX5",
				421:"ZX4",
				422:"ZX4",
				423:"ZX3",
				424:"ZXHZ",
				425:"ZUS",
				426:"ZUL",
				427:"HHZX",
				428:"ZUHZ",
				429:"DWD",
				430:"RX3",
				431:"RX2",
				440:"ZX5",
				441:"ZX4",
				442:"ZX4",
				443:"ZX3",
				444:"ZXHZ",
				445:"ZUS",
				446:"ZUL",
				447:"HHZX",
				448:"ZUHZ",
				449:"BJL",
				450:"RX3",
				451:"RX2",
				460:"ZX5",
				461:"ZX4",
				462:"ZX4",
				463:"ZX3",
				464:"ZXHZ",
				465:"ZUS",
				466:"ZUL",
				467:"HHZX",
				468:"ZUHZ",
				469:"BJL",
				470:"RX3",
				471:"RX2",
				501:"SB",
				502:"SX",
				1241:"ZX4",
				1242:"ZX4",
				1214:"ZX3",
				1215:"ZXHZ",
				1218:"ZUS",
				1219:"ZUL",
				1220:"HHZX",
				1221:"ZUHZ",
				1243:"ZX3",
				1244:"ZXHZ",
				1245:"ZUS",
				1246:"ZUL",
				1247:"HHZX",
				1248:"ZUHZ",
				1216:"ZX3",
				1217:"ZXHZ",
				1222:"ZUS",
				1223:"ZUL",
				1224:"HHZX",
				1225:"ZUHZ",
				1226:"BDW1",
				1227:"BDW2",
				1229:"ZX2",
				1231:"ZU2",
				1228:"ZX2",
				1230:"ZU2",
				1232:"DWD",
				1237:"DXDS",
				1238:"DXDS",
				1250:"RX3",
				1251:"RX2",
				1249:"BJL"
            },
            lt_issues: opts.issues,
            lt_ajaxurl: opts.ajaxurl,
            lt_lottid: opts.lotteryid,
            lt_isdyna: opts.isdynamic,
            lt_total_nums: 0,
            lt_total_money: 0,
            lt_time_leave: 0,
            lt_time_open: 0,
            lt_open_time: opts.cur_issue.opentime,
            lt_open_status: true,
            lt_same_code: [],
            lt_ontimeout: opts.ontimeout,
            lt_onfinishbuy: opts.onfinishbuy,
            lt_trace_base: 0,
            lt_submiting: false,
            lt_ismargin: true,
            lt_prizes: [],
            jiangprize:opts.jiangprize,
            currentmode:opts.currentmode
        });
        ps = null;
        opts.data_id = null;
        opts.issues = null;
        opts.ajaxurl = null;
        opts.lotteryid = null;
        
        //是否为IE浏览器
        if ($.browser.msie) {
        	//IE的一个特有属性,用于释放内存的
            CollectGarbage();
        }
        //用于显示该期剩于时间--右侧开奖时间
        $($.lt_id_data.id_count_down).lt_timer(opts.servertime, opts.cur_issue.endtime);
        
        var bhtml = "";
        //循环输出大玩法标签,并且调用lt_smalllabel 输出小标签内容
        $.each(opts.data_label,
        function(i, n) {
            if (typeof(n) == "object") {
                if (i == 0) {
                    bhtml += '<span class="tab-front" value="' + i + '"><span class="tabbar-left"></span><span class="content">' + n.title + '</span><span class="tabbar-right"></span></span>';
                  
                    lt_smalllabel({
                        title: n.title,
                        label: n.label
                    })
                } else {
                    bhtml += '<span class="tab-back" value="' + i + '"><span class="tabbar-left"></span><span class="content">' + n.title + '</span><span class="tabbar-right"></span></span>'
                }
            }
        });
        
        //变为对象了
        $bhtml = $(bhtml);
       
        $($.lt_id_data.id_labelbox).empty();//页面id=tabbar-div-s2 的地方变为空
        $(bhtml).appendTo($.lt_id_data.id_labelbox);//向页面添加大标签
        
        //循环每一个大标签,点加单击时标签变色,并且调用lt_smalllabel 输出小标签内容
        $($.lt_id_data.id_labelbox).children().click(function() {
            if ($.trim($(this).attr("class")) == "tab-front") {
                return
            }
            $($.lt_id_data.id_labelbox).children().attr("class", "tab-back");
            $(this).attr("class", "tab-front");
            var index = parseInt($(this).attr("value"), 10);
            lt_smalllabel({
                title: opts.data_label[index].title,
                label: opts.data_label[index].label
            })
        });
        
        //将后面的期数全部以下拉列表形式显示出来
        var chtml = '<select name="lt_issue_start" id="lt_issue_start">';
        $.each($.lt_issues.today,
        function(i, n) {
            chtml += '<option value="' + n.issue + '">' + n.issue + (n.issue == opts.cur_issue.issue ? lot_lang.dec_s7: "") + "</option>"
        });
        var t = $.lt_issues.tomorrow.length - $.lt_issues.today.length;
       
        if (t > 0) {
            for (i = 0; i < t; i++) {
                chtml += '<option value="' + $.lt_issues.tomorrow[i].issue + '">' + $.lt_issues.tomorrow[i].issue + "</option>"
            }
        }
        chtml += '</select><input type="hidden" name="lt_total_nums" id="lt_total_nums" value="0"><input type="hidden" name="lt_total_money" id="lt_total_money" value="0">';
        $(chtml).appendTo($.lt_id_data.id_issues);
      //将后面的期数全部以下拉列表形式显示出来--结束
        
        $("tr", $($.lt_id_data.id_cf_content)).live("mouseover",
        function() {
            $(this).addClass("on")
        }).live("mouseout",
        function() {
            $(this).removeClass("on")
        });
        //给清空按钮添加单击事件
        $($.lt_id_data.id_cf_clear).click(function() {
            $.confirm(lot_lang.am_s5,
            function() {
                $.lt_total_nums = 0;
                $.lt_total_money = 0;
                $.lt_trace_base = 0;
                $.lt_same_code = [];
                $($.lt_id_data.id_cf_num).html(0);
                $($.lt_id_data.id_cf_money).html(0);
                $($.lt_id_data.id_cf_count).html(0);
                $($.lt_id_data.id_cf_content).children().empty();
                $('<tr class="nr"><td colspan=7>暂无投注项</td></tr>').prependTo($.lt_id_data.id_cf_content);
                cleanTraceIssue();
                if ($.lt_ismargin == false) {
                    traceCheckMarginSup()
                }
            })
        });
      //给清空按钮添加单击事件------结束
        
        //帮助提示?框
        $($.lt_id_data.id_cf_help).mouseover(function() {
        	
            var $h = $('<div class=ibox><table border=0 cellspacing=0 cellpadding=0><tr class=t><td class=tl></td><td class=tm></td><td class=tr></td></tr><tr class=mm><td class=ml><img src="/images/comm/t.gif"></td><td>' + lot_lang.am_s35 + '</td><td class=mr><img src="/images/comm/t.gif"></td></tr><tr class=b><td class=bl></td><td class=bm><img src="/images/comm/t.gif"></td><td class=br> </td></tr></table><div class=ar><div class=ic></div></div></div>');
            var offset = $(this).offset();
            var left = offset.left - 37;
            var top = offset.top - 51;
            $(this).openFloat($h, "more", left, top)
        }).mouseout(function() {
            $(this).closeFloat()
        });
      //帮助提示?框---结束
        
        //1613行lt_trace方法--追号太复杂我操
        $($.lt_id_data.id_tra_if).lt_trace({
            issues: opts.issues
        });
        //确认投注按钮添加单击ajax事件
        $($.lt_id_data.id_sendok).lt_ajaxSubmit();
        
        //玩法帮助事件凤凰里有
        $($.lt_id_data.id_methodhelp).hover(function() {
            if ($($.lt_id_data.id_helpdiv).html().length > 2) {
                var offset = $(this).offset();
                if ($($.lt_id_data.id_helpdiv).html().length > 30) {
                    $($.lt_id_data.id_helpdiv).css({
                        width: "300px"
                    })
                } else {
                    $($.lt_id_data.id_helpdiv).css({
                        width: ($.browser.msie ? "300px": "auto")
                    })
                }
                $($.lt_id_data.id_helpdiv).css({
                    left: (offset.left + $(this).width() + 2) + "px",
                    top: (offset.top - 20) + "px"
                }).show()
            }
        },
        function() {
            $($.lt_id_data.id_helpdiv).hide()
        })
    };
    
    //小标签玩法
    var lt_smalllabel = function(opts) {
        var ps = {
            title: "",
            label: []
        };
        //opts 是局部变量 外面传递过来的
        opts = $.extend({}, ps, opts || {});
        
        var html = "";
        var dyhtml = "";
        $.each(opts.label,
        function(i, n) {
            if (typeof(n) == "object") {
                if (i > 0 && i % 8 == 0) {
                    html += "</td></tr><tr><td>"
                }
                //init_GZfRulurControlData(n.prize[1]);//鹏哥加的
                if (i == 0) {//当点击大标签时第一个默认显示的小标签
                    html += '<span class="tab-front" id="smalllabel_' + i + '"><span class="tabbar-left"></span><span class="content">' + n.desc + '</span><span class="tabbar-right"></span></span>';
                    lt_selcountback();//您选择了 0 注, 共 0 元, 请填写倍数 初始化
                   //给全局变量lt_method_data赋值
                    $.lt_method_data = {
                        methodid: n.methodid,
                        title: opts.title,
                        name: n.name,
                        str: n.show_str,
                        prize: n.prize,
                        dyprize: n.dyprize,
                        modes: $.lt_method_data.modes ? $.lt_method_data.modes: {},
                        sp: n.code_sp
                    };
                    
                    jiangmethodprize="$.jiangprize.method"+n.methodid;
                    
                   
                    
                    if(opts.title.indexOf("不定位") != -1 || opts.title=="趣味型" || opts.title=="百家乐" || opts.title=="龙虎斗" || $.lt_lottid == 9 || $.lt_lottid == 10) { 
                    	//alert("fffffmm");
                    	init_GZfRulurControlData(eval(jiangmethodprize),true);//鹏哥加的
                    }else{
                    	init_GZfRulurControlData(eval(jiangmethodprize),false);//鹏哥加的
                    }
                    
                    
                    if (opts.label[0].methoddesc.length > 0) {
                        $($.lt_id_data.id_methoddesc).html(opts.label[0].methoddesc).parent().show()
                    } else {
                        $($.lt_id_data.id_methoddesc).parent().hide()
                    }
                    if (opts.label[0].methodhelp && opts.label[0].methodhelp.length > 0) {
                        $($.lt_id_data.id_helpdiv).html(opts.label[0].methodhelp)
                    } else {
                        $($.lt_id_data.id_helpdiv).html("")
                    }
                    
                   //把数字画出来
                    $($.lt_id_data.id_selector).lt_selectarea(n.selectarea);
                    
                    selmodes = getCookie("modes");
                    
                   //生成页面上面的模式元角下拉,顺便把$.lt_method_data.modes[] 加进元 1 角0.1
                    $($.lt_id_data.id_sel_modes).empty();                    
                    $.each(n.modes,
                    function(j, m) {
                        $.lt_method_data.modes[m.modeid] = {
                            name: m.name,
                            rate: Number(m.rate)
                        };
                        addItem($($.lt_id_data.id_sel_modes)[0], "" + m.name + "", m.modeid)
                    });
                  
                    SelectItem($($.lt_id_data.id_sel_modes)[0], selmodes);//让默认有选择
                    dypoint = getCookie("dypoint");//得到返点
                    $($.lt_id_data.id_sel_prize).empty();
                    if (n.dyprize.length == 10 && $.lt_isdyna == 1) {
                    	
                        dyhtml = '<SELECT name="lt_sel_dyprize" id="lt_sel_dyprize">';
                        $.each(n.dyprize[0].prize,
                        function(j, m) {
                            dyhtml += '<OPTION value="' + m.prize + "|" + m.point + '"' + (dypoint == m.point ? " selected": "") + ">" + m.prize + "-" + (Math.ceil(m.point * 1000) / 10) + "%</OPTION>"
                        });
                        dyhtml += "</SELECT>";
                        $($.lt_id_data.id_sel_prize).html(lot_lang.dec_s37);
                        $(dyhtml).appendTo($.lt_id_data.id_sel_prize)
                    }
                } else {//当点击大标签时第一个默认显示的小标签--除外  不显示的小标签
                    html += '<span class="tab-back" id="smalllabel_' + i + '"><span class="tabbar-left"></span><span class="content">' + n.desc + '</span><span class="tabbar-right"></span></span>'
                }
            }
        });
        //把小标签玩法加进页面
        $html = $("<tr><td>" + html + "</td></tr>");
        $($.lt_id_data.id_smalllabel).empty();
        $html.appendTo($.lt_id_data.id_smalllabel);
        
        
      //定位胆下面就一个小玩法标签,直接隐藏了
        if (opts.label.length == 1) {
            $($.lt_id_data.id_smalllabel).empty()
        }
        //第一个小标签添加data ischecked
        $("span[id^='smalllabel_']:first", $($.lt_id_data.id_smalllabel)).attr("class", "tab-front").data("ischecked", "yes");
        //为所有小标签添加单击事件
        $("span[id^='smalllabel_']", $($.lt_id_data.id_smalllabel)).click(function() {
        	
        	
        	var index = parseInt($(this).attr("id").replace("smalllabel_", ""), 10);//第几个标签 

			//alert(index);
        	jiangmethodprize="$.jiangprize.method"+opts.label[index].methodid;
        	
        	 

        	
        	if(opts.title.indexOf("不定位") != -1 || opts.title=="趣味型" || opts.title=="百家乐" || opts.title=="龙虎斗" || $.lt_lottid == 9 || $.lt_lottid == 10) {  
        		
        		init_GZfRulurControlData(eval(jiangmethodprize),true);//鹏哥加的
        	}else{
        		init_GZfRulurControlData(eval(jiangmethodprize),false);//鹏哥加的
        	}
        	//如果是默认的第一个则退出
            if ($(this).data("ischecked") == "yes") {
                return
            }
            
            if (opts.label[index].methoddesc.length > 0) {
                $($.lt_id_data.id_methoddesc).html(opts.label[index].methoddesc).parent().show()
            } else {
                $($.lt_id_data.id_methoddesc).parent().hide()
            }
            if (opts.label[index].methodhelp && opts.label[index].methodhelp.length > 0) {
                $($.lt_id_data.id_helpdiv).html(opts.label[index].methodhelp)
            } else {
                $($.lt_id_data.id_helpdiv).html("")
            }
            //初始化
            lt_selcountback();
            $.lt_method_data = {
                methodid: opts.label[index].methodid,
                title: opts.title,
                name: opts.label[index].name,
                str: opts.label[index].show_str,
                prize: opts.label[index].prize,
                dyprize: opts.label[index].dyprize,
                modes: $.lt_method_data.modes ? $.lt_method_data.modes: {},
                sp: opts.label[index].code_sp
            };
            $("span[id^='smalllabel_']", $($.lt_id_data.id_smalllabel)).removeData("ischecked").attr("class", "tab-back");
            $(this).data("ischecked", "yes").attr("class", "tab-front");
            $($.lt_id_data.id_selector).lt_selectarea(opts.label[index].selectarea);
            $($.lt_id_data.id_sel_modes).empty();
            selmodes = getCookie("modes");
            $.each(opts.label[index].modes,
            function(j, m) {
                $.lt_method_data.modes[m.modeid] = {
                    name: m.name,
                    rate: Number(m.rate)
                };
                addItem($($.lt_id_data.id_sel_modes)[0], "" + m.name + "", m.modeid)
            });
            SelectItem($($.lt_id_data.id_sel_modes)[0], selmodes);
            dypoint = getCookie("dypoint");  //得到cookie中的返点值
            $($.lt_id_data.id_sel_prize).empty();
            if (opts.label[index].dyprize.length == 10 && $.lt_isdyna == 1) {
                dyhtml = '<SELECT name="lt_sel_dyprize" id="lt_sel_dyprize">';
                $.each(opts.label[index].dyprize[0].prize,
                function(j, m) {
                    dyhtml += '<OPTION value="' + m.prize + "|" + m.point + '"' + (dypoint == m.point ? " selected": "") + ">" + m.prize + "-" + (Math.ceil(m.point * 1000) / 10) + "%</OPTION>"
                });
                dyhtml += "</SELECT>";
                $($.lt_id_data.id_sel_prize).html(lot_lang.dec_s37);
                $(dyhtml).appendTo($.lt_id_data.id_sel_prize)
            }
        })
    };
    //让您选择了 0 注, 共 0 元, 请填写倍数 1  初始化
    var lt_selcountback = function() {
        $($.lt_id_data.id_sel_times).val(1);
        $($.lt_id_data.id_sel_money).html(0);
        $($.lt_id_data.id_sel_num).html(0)
    };
    
    //在页面上面画出数字球区的方法
    $.fn.lt_selectarea = function(opts) {
        var ps = {
            type: "digital",
            layout: [{
                title: "百位",
                no: "0|1|2|3|4|5|6|7|8|9",
                place: 0,
                cols: 1
            },
            {
                title: "十位",
                no: "0|1|2|3|4|5|6|7|8|9",
                place: 1,
                cols: 1
            },
            {
                title: "个位",
                no: "0|1|2|3|4|5|6|7|8|9",
                place: 2,
                cols: 1
            }],
            noBigIndex: 5,
            isButton: true
        };
        opts = $.extend({},ps, opts || {});
        
        var data_sel = [];
        var max_place = 0;
        var otype = opts.type.toLowerCase();
        var methodname = $.lt_method[$.lt_method_data.methodid];
        var html = "";
        if (otype == "input") {
            var tempdes = "";
            switch (methodname) {
            case "SDZX3":
            case "SDZU3":
            case "SDZX2":
            case "SDRX1":
            case "SDRX2":
            case "SDRX3":
            case "SDRX4":
            case "SDRX5":
            case "SDRX6":
            case "SDRX7":
            case "SDRX8":
            case "SDZU2":
                tempdes = lot_lang.dec_s26;
                break;
			case "RX3":
               tempdes = '<input type="checkbox" name="rx3" value="w">万位&nbsp;<input type="checkbox" name="rx3" value="q">千位&nbsp;<input type="checkbox" name="rx3" value="b">百位&nbsp;<input type="checkbox" name="rx3" value="s">十位&nbsp;<input type="checkbox" name="rx3" value="g">个位&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:#999999">必须选择三个位数</span>';
                break;
			case "RX2":
               tempdes = '<input type="checkbox" name="rx2" value="w">万位&nbsp;<input type="checkbox" name="rx2" value="q">千位&nbsp;<input type="checkbox" name="rx2" value="b">百位&nbsp;<input type="checkbox" name="rx2" value="s">十位&nbsp;<input type="checkbox" name="rx2" value="g">个位&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:#999999">必须选择二个位数</span>';
                break;
            default:
                tempdes = lot_lang.dec_s4;
                break
            }
            html += '<div class=nbs><table class=ha><tr><td valign=top><textarea id="lt_write_box" style="width:600px;height:80px;"></textarea><br />' + tempdes + '</td><td valign=top><span class=ds><span class=lsbb><input name="lt_write_del" type="button" value="删除重复号" class="lsb" id="lt_write_del"></span></span><span class=ds><span class=lsbb style="display:none;"><input name="lt_write_import" type="button" value="&nbsp;导入文件&nbsp;" class="lsb" id="lt_write_import" ></span></span><span class=ds><span class=lsbb><input name="lt_write_empty" type="button" value="&nbsp;清&nbsp;&nbsp;空&nbsp;" class="lsb" id="lt_write_empty"></span></span></td></tr></table></div>';
            data_sel[0] = [];
           
            tempdes = null
        } else {
            if (otype == "digital") {
                $.each(opts.layout,
                function(i, n) {
                    if (typeof(n) == "object") {
                        n.place = parseInt(n.place, 10);
                        max_place = n.place > max_place ? n.place: max_place;
                        data_sel[n.place] = [];
                        html += '<div class="nbs">';
                        if (n.cols > 0) {
                            html += "<div class=ti><div class=l></div>";
                            if (n.title.length > 0) {
                                html += n.title
                            }
                            html += "<div class=r></div></div>"
                        }
                        html += '<div class="nb">';
                        numbers = n.no.split("|");
                        j = numbers.length;
                        if (j > 12) {
                            html += "<span>"
                        }
                        for (i = 0; i < j; i++) {
                            if ((methodname == "ZXHZ" && i == 14) || (methodname == "ZUHZ" && i == 13)) {
                                html += "</span><span>"
                            }
                            //输出数字了
                            html += '<div name="lt_place_' + n.place + '">' + numbers[i] + "</div>"
                        }
                        if (j > 12) {
                            html += "</span>"
                        }                        
                        html += "</div>";
                       
                        if (opts.isButton == true) {
                        	//在数字后面添加全 大小奇偶清
                            html += '<div class=to><ul><li class="l"></li><li class="dxjoq" name="all">' + lot_lang.bt_sel_all + '</li><li class="dxjoq" name="big">' + lot_lang.bt_sel_big + '</li><li class="dxjoq" name="small">' + lot_lang.bt_sel_small + '</li><li class="dxjoq" name="odd">' + lot_lang.bt_sel_odd + '</li><li class="dxjoq" name="even">' + lot_lang.bt_sel_even + '</li><li class="dxjoq" name="clean">' + lot_lang.bt_sel_clean + '</li><li class="r"></li></ul></div>'
                        }
                        html += "</div>"
                    }
                })
            } else {
                if (otype == "dxds") {
                    $.each(opts.layout,
                    function(i, n) {
                        n.place = parseInt(n.place, 10);
                        max_place = n.place > max_place ? n.place: max_place;
                        data_sel[n.place] = [];
                        html += '<div class="nbs" style="width:80%;">';
                        if (n.cols > 0) {
                            html += "<div class=ti><div class=l></div>";
                            if (n.title.length > 0) {
                                html += n.title
                            }
                            html += "<div class=r></div></div>"
                        }
                        html += '<div class="nb">';
                        numbers = n.no.split("|");
                        j = numbers.length;
                        for (i = 0; i < j; i++) {
                            html += '<div name="lt_place_' + n.place + '">' + numbers[i] + "</div>"
                        }
                        html += '</div><div class=to><ul><li class="l"></li><li class="dxjoq" name="clean">' + lot_lang.bt_sel_clean + '</li><li class="r"></li></ul></div></div>'
                    })
                } else {
                    if (otype == "dds") {
                        $.each(opts.layout,
                        function(i, n) {
                            n.place = parseInt(n.place, 10);
                            max_place = n.place > max_place ? n.place: max_place;
                            data_sel[n.place] = [];
                            html += '<div class="nbs">';
                            if (n.cols > 0) {
                                html += "<div class=ti><div class=l></div>";
                                if (n.title.length > 0) {
                                    html += n.title
                                }
                                html += "<div class=r></div></div>"
                            }
                            html += '<div class="bl">';
                            numbers = n.no.split("|");
                            temphtml = "";
                            if (n.prize) {
                                tmpprize = n.prize.split(",")
                            }
                            j = numbers.length;
                            for (i = 0; i < j; i++) {
                                html += '<div name="lt_place_' + n.place + '">' + numbers[i] + "</div>";
                                if (n.prize) {
                                    temphtml += "<span>" + $.lt_method_data.prize[parseInt(tmpprize[i], 10)] + "</span>"
                                }
                            }
                            html += temphtml + "</div>"
                        })
                    }
                }
            }
        }
        html += '<div class="c"></div>';
        $html = $(html);
        $(this).empty();
        $html.appendTo(this);
      //选择数字区域画完
        var me = this;
     //数据排序函数,从小到大
        var _SortNum = function(a, b) {
            if (otype != "input") {            	
                a = a.replace(/5单0双/g, 0).replace(/4单1双/g, 1).replace(/3单2双/g, 2).replace(/2单3双/g, 3).replace(/1单4双/g, 4).replace(/0单5双/g, 5);
                a = a.replace(/大/g, 0).replace(/小/g, 1).replace(/单/g, 2).replace(/双/g, 3).replace(/\s/g, "");
                b = b.replace(/5单0双/g, 0).replace(/4单1双/g, 1).replace(/3单2双/g, 2).replace(/2单3双/g, 3).replace(/1单4双/g, 4).replace(/0单5双/g, 5);
                b = b.replace(/大/g, 0).replace(/小/g, 1).replace(/单/g, 2).replace(/双/g, 3).replace(/\s/g, "")
            }
            a = parseInt(a, 10);
            b = parseInt(b, 10);
            if (isNaN(a) || isNaN(b)) {
                return true
            }
            return (a - b)
        };
        //和豹子号有关系
        var _HHZXcheck = function(n, len) {
        	
            if (len == 2) {
                var a = ["00", "11", "22", "33", "44", "55", "66", "77", "88", "99"]
            } else {
                var a = ["000", "111", "222", "333", "444", "555", "666", "777", "888", "999"]
            }
            n = n.toString();
            if ($.inArray(n, a) == -1) {
                return true
            }
            return false
        };
        var _SDinputCheck = function(n, len) {
            t = n.split(" ");
            l = t.length;
            for (i = 0; i < l; i++) {
                if (Number(t[i]) > 11 || Number(t[i]) < 1) {
                    return false
                }
                for (j = i + 1; j < l; j++) {
                    if (Number(t[i]) == Number(t[j])) {
                        return false
                    }
                }
            }
            return true
        };
        
        //当e为true时返回error[]数组里面的内容,当e为false时返回nums 几组号码
        var _inputCheck_Num = function(l, e, fun, sort) {
            var nums = data_sel[0].length; 
           
            var error = [];
            var newsel = [];
            var partn = "";
            l = parseInt(l, 10);
            switch (l) {
            case 2:
                partn = /^[0-9]{2}$/;
                break;
				 case 4:
                partn = /^[0-9]{4}$/;
                break;
            case 5:
                partn = /^[0-9\s]{5}$/;
                break;
            case 8:
                partn = /^[0-9\s]{8}$/;
                break;
            case 11:
                partn = /^[0-9\s]{11}$/;
                break;
            case 14:
                partn = /^[0-9\s]{14}$/;
                break;
            case 17:
                partn = /^[0-9\s]{17}$/;
                break;
            case 20:
                partn = /^[0-9\s]{20}$/;
                break;
            case 23:
                partn = /^[0-9\s]{23}$/;
                break;
            default:
                partn = /^[0-9]{3}$/;
                break
            }
            fun = $.isFunction(fun) ? fun: function(s) {
            	
                return true
            };
            $.each(data_sel[0],
            function(i, n) {
            	
                n = $.trim(n);
                
                if (partn.test(n) && fun(n, l)) {
                	
                    if (sort) {
                        if (n.indexOf(" ") == -1) {
                            n = n.split("");
                            n.sort(_SortNum);
                            n = n.join("")
                        } else {
                            n = n.split(" ");
                            n.sort(_SortNum);
                            n = n.join(" ")
                        }
                    }
                    data_sel[0][i] = n;
                    newsel.push(n)
                } else {
                    if (n.length > 0) {
                        error.push(n)
                    }
                    nums = nums - 1
                }
            });
            if (e == true) {
                data_sel[0] = newsel;
                return error
            }
            return nums
        };
        
        //单击选择数字或者单式中手动输入号码,,,计算出金额和注数
        function checkNum() {
            var nums = 0,
            mname = $.lt_method[$.lt_method_data.methodid];//从全局lt_method中取得玩法名称英文            
            var modes = parseInt($($.lt_id_data.id_sel_modes).val(), 10);  //元角模式
            if (otype == "input") {            	
                if (data_sel[0].length > 0) {
                    switch (mname) {
                    case "ZX3":
                        nums = _inputCheck_Num(3, false);
                        break;
						case "ZX4":
                        nums = _inputCheck_Num(4, false);
                        break;
					 case "RX3":
                        nums = _inputCheck_Num(3, false);
                       break;
                    case "HHZX":
                        nums = _inputCheck_Num(3, false, _HHZXcheck, true);
                        break;
                    case "ZX2":
                        nums = _inputCheck_Num(2, false);
                        break;
					 case "RX2":
                        nums = _inputCheck_Num(2, false);
                        break;
                    case "ZU2":
                        nums = _inputCheck_Num(2, false, _HHZXcheck, true);
                        break;
                    case "SDZX3":
                        nums = _inputCheck_Num(8, false, _SDinputCheck, false);
                        break;
                    case "SDZU3":
                        nums = _inputCheck_Num(8, false, _SDinputCheck, true);
                        break;
                    case "SDZX2":
                        nums = _inputCheck_Num(5, false, _SDinputCheck, false);
                        break;
                    case "SDZU2":
                        nums = _inputCheck_Num(5, false, _SDinputCheck, true);
                        break;
                    case "SDRX1":
                        nums = _inputCheck_Num(2, false, _SDinputCheck, false);
                        break;
                    case "SDRX2":
                        nums = _inputCheck_Num(5, false, _SDinputCheck, true);
                        break;
                    case "SDRX3":
                        nums = _inputCheck_Num(8, false, _SDinputCheck, true);
                        break;
                    case "SDRX4":
                        nums = _inputCheck_Num(11, false, _SDinputCheck, true);
                        break;
                    case "SDRX5":
                        nums = _inputCheck_Num(14, false, _SDinputCheck, true);
                        break;
                    case "SDRX6":
                        nums = _inputCheck_Num(17, false, _SDinputCheck, true);
                        break;
                    case "SDRX7":
                        nums = _inputCheck_Num(20, false, _SDinputCheck, true);
                        break;
                    case "SDRX8":
                        nums = _inputCheck_Num(23, false, _SDinputCheck, true);
                        break;
                    default:
                        break
                    }
                }
            } else {
                var tmp_nums = 1;
                switch (mname) {
                case "ZXHZ":
                    var cc = {
                        0 : 1,
                        1 : 3,
                        2 : 6,
                        3 : 10,
                        4 : 15,
                        5 : 21,
                        6 : 28,
                        7 : 36,
                        8 : 45,
                        9 : 55,
                        10 : 63,
                        11 : 69,
                        12 : 73,
                        13 : 75,
                        14 : 75,
                        15 : 73,
                        16 : 69,
                        17 : 63,
                        18 : 55,
                        19 : 45,
                        20 : 36,
                        21 : 28,
                        22 : 21,
                        23 : 15,
                        24 : 10,
                        25 : 6,
                        26 : 3,
                        27 : 1
                    };
                case "ZUHZ":
                    if (mname == "ZUHZ") {
                        cc = {
                            1 : 1,
                            2 : 2,
                            3 : 2,
                            4 : 4,
                            5 : 5,
                            6 : 6,
                            7 : 8,
                            8 : 10,
                            9 : 11,
                            10 : 13,
                            11 : 14,
                            12 : 14,
                            13 : 15,
                            14 : 15,
                            15 : 14,
                            16 : 14,
                            17 : 13,
                            18 : 11,
                            19 : 10,
                            20 : 8,
                            21 : 6,
                            22 : 5,
                            23 : 4,
                            24 : 2,
                            25 : 2,
                            26 : 1
                        }
                    }
                    for (i = 0; i <= max_place; i++) {
                        var s = data_sel[i].length;
                        for (j = 0; j < s; j++) {
                            nums += cc[parseInt(data_sel[i][j], 10)]
                        }
                    }
                    break;
                case "ZUS":
                    for (i = 0; i <= max_place; i++) {
                        var s = data_sel[i].length;  
                       
                        if (s > 1) {
                            nums += s * (s - 1);
                          
                        }
                    }
                    break;
                case "ZUL":
                    for (i = 0; i <= max_place; i++) {
                        var s = data_sel[i].length;
                        if (s > 2) {
                            nums += s * (s - 1) * (s - 2) / 6
                        }
                    }
                    break;
                case "BDW2":
                case "ZU2":
                    for (i = 0; i <= max_place; i++) {
                        var s = data_sel[i].length;
                        if (s > 1) {
                            nums += s * (s - 1) / 2
                        }
                    }
                    break;
                case "DWD":
                    for (i = 0; i <= max_place; i++) {
                        nums += data_sel[i].length
                    }
                    break;
				 case "BJL":
                    for (i = 0; i <= max_place; i++) {
                        nums += data_sel[i].length
                    }
                    break;
                case "SDZX3":
                    nums = 0;
                  
                    if (data_sel[0].length > 0 && data_sel[1].length > 0 && data_sel[2].length > 0) {
                        for (i = 0; i < data_sel[0].length; i++) {
                            for (j = 0; j < data_sel[1].length; j++) {
                                for (k = 0; k < data_sel[2].length; k++) {
                                    if (data_sel[0][i] != data_sel[1][j] && data_sel[0][i] != data_sel[2][k] && data_sel[1][j] != data_sel[2][k]) {
                                        nums++
                                    }
                                }
                            }
                        }
                    }
                    break;
                case "SDZU3":
                    for (i = 0; i <= max_place; i++) {
                        var s = data_sel[i].length;
                        if (s > 2) {
                            nums += s * (s - 1) * (s - 2) / 6
                        }
                    }
                    break;
                case "SDZX2":
                    nums = 0;
                    if (data_sel[0].length > 0 && data_sel[1].length > 0) {
                        for (i = 0; i < data_sel[0].length; i++) {
                            for (j = 0; j < data_sel[1].length; j++) {
                                if (data_sel[0][i] != data_sel[1][j]) {
                                    nums++
                                }
                            }
                        }
                    }
                    break;
                case "SDZU2":
                    for (i = 0; i <= max_place; i++) {
                        var s = data_sel[i].length;
                        if (s > 1) {
                            nums += s * (s - 1) / 2
                        }
                    }
                    break;
                case "SDBDW":
                case "SDDWD":
                case "SDDDS":
                case "SDCZW":
                case "SDRX1":
                    for (i = 0; i <= max_place; i++) {
                        nums += data_sel[i].length
                    }
                    break;
                case "SDRX2":
                    for (i = 0; i <= max_place; i++) {
                        var s = data_sel[i].length;
                        if (s > 1) {
                            nums += s * (s - 1) / 2
                        }
                    }
                    break;
                case "SDRX3":
                    for (i = 0; i <= max_place; i++) {
                        var s = data_sel[i].length;
                        if (s > 2) {
                            nums += s * (s - 1) * (s - 2) / 6
                        }
                    }
                    break;
                case "SDRX4":
                    for (i = 0; i <= max_place; i++) {
                        var s = data_sel[i].length;
                        if (s > 3) {
                            nums += s * (s - 1) * (s - 2) * (s - 3) / 24
                        }
                    }
                    break;
                case "SDRX5":
                    for (i = 0; i <= max_place; i++) {
                        var s = data_sel[i].length;
                        if (s > 4) {
                            nums += s * (s - 1) * (s - 2) * (s - 3) * (s - 4) / 120
                        }
                    }
                    break;
                case "SDRX6":
                    for (i = 0; i <= max_place; i++) {
                        var s = data_sel[i].length;
                        if (s > 5) {
                            nums += s * (s - 1) * (s - 2) * (s - 3) * (s - 4) * (s - 5) / 720
                        }
                    }
                    break;
                case "SDRX7":
                    for (i = 0; i <= max_place; i++) {
                        var s = data_sel[i].length;
                        if (s > 6) {
                            nums += s * (s - 1) * (s - 2) * (s - 3) * (s - 4) * (s - 5) * (s - 6) / 5040
                        }
                    }
                    break;
                case "SDRX8":
                    for (i = 0; i <= max_place; i++) {
                        var s = data_sel[i].length;
                        if (s > 7) {
                            nums += s * (s - 1) * (s - 2) * (s - 3) * (s - 4) * (s - 5) * (s - 6) * (s - 7) / 40320
                        }
                    }
                    break;
					case"RX3":
					var nums1=0;
					var nums=1;
					for(i=0;i<=max_place;i++){
						if(data_sel[i].length>0){
							nums1=nums1+1;	
							nums=nums*data_sel[i].length
						}
					}
					if(nums1!=3){
						nums=0;
					}
					break;
				case"RX2":
					var nums1=0;
					var nums=1;
					for(i=0;i<=max_place;i++){
						if(data_sel[i].length>0){
							nums1=nums1+1;	
							nums=nums*data_sel[i].length
						}
					}
					if(nums1!=2){
						nums=0;
					}
					break;
				case"SB":
					for (i = 0; i <= max_place; i++) {
                        if (data_sel[i].length == 0) {
                            tmp_nums = 0;
                            break;
                            
                        }

						
                        tmp_nums *= data_sel[i].length;
						tmp_nums *= 16;
						var s=data_sel[i].indexOf('红波');
						if(s==-1){
							//tmp_nums *= 4;
						}else{
							tmp_nums++;
						}

						
                    }
                    nums = tmp_nums;
					break;
				case"SX":
					for (i = 0; i <= max_place; i++) {
                        if (data_sel[i].length == 0) {
                            tmp_nums = 0;
                            break;
                            
                        }

						
                        tmp_nums *= data_sel[i].length;
						tmp_nums *= 4;
						var s=data_sel[i].indexOf('马');
						if(s==-1){
							//tmp_nums *= 4;
						}else{
							tmp_nums++;
						}

						
                    }
                    nums = tmp_nums;
					break;
                default:
                
                    for (i = 0; i <= max_place; i++) {
                        if (data_sel[i].length == 0) {
                            tmp_nums = 0;
                            break;
                            break
                        }
                     
                        tmp_nums *= data_sel[i].length
                    }
                    nums = tmp_nums;
                    break
                }
            }
            var times = parseInt($($.lt_id_data.id_sel_times).val(), 10);
            if (isNaN(times)) {
                times = 1;
                $($.lt_id_data.id_sel_times).val(1)
            }
            var money = Math.round(times * nums * 2 * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;
            
            money = isNaN(money) ? 0 : money;
            
            $($.lt_id_data.id_sel_num).html(nums);//页面上显示你选择了多少注
            $($.lt_id_data.id_sel_money).html(money)//页面上显示共多少元
        }
        //删除重复号的方法
        var dumpNum = function(isdeal) {
            var l = data_sel[0].length;           
            var err = [];
            var news = [];
			if(l>2000) return err;
            if (l == 0) {//单式输入框里没有东东返回空数组
                return err
            }
            for (i = 0; i < l; i++) {
                if ($.inArray(data_sel[0][i], err) != -1) {
                    continue
                }
                for (j = i + 1; j < l; j++) {
                    if (data_sel[0][i] == data_sel[0][j]) {
                        err.push(data_sel[0][i]);
                        break
                    }
                }
                news.push(data_sel[0][i])
            }
            if (isdeal) {
                data_sel[0] = news
            }
            return err
        };
      //单式输入框change事件
        function _inptu_deal() {
            var s = $.trim($("#lt_write_box", $(me)).val());
            s = $.trim(s.replace(/[^\s\r,;，；　０１２３４５６７８９0-9]/g, ""));
            var m = s;
            switch (methodname) {
            case "SDZX3":
            case "SDZU3":
            case "SDZX2":
            case "SDRX1":
            case "SDRX2":
            case "SDRX3":
            case "SDRX4":
            case "SDRX5":
            case "SDRX6":
            case "SDRX7":
            case "SDRX8":
            case "SDZU2":
                s = s.replace(/[\r\n,;，；]/g, "|").replace(/(\|)+/g, "|");
                break;
            default:
                s = s.replace(/[\s\r,;，；　]/g, "|").replace(/(\|)+/g, "|");
                break
            }
            s = s.replace(/０/g, "0").replace(/１/g, "1").replace(/２/g, "2").replace(/３/g, "3").replace(/４/g, "4").replace(/５/g, "5").replace(/６/g, "6").replace(/７/g, "7").replace(/８/g, "8").replace(/９/g, "9");
            if (s == "") {
                data_sel[0] = []
            } else {            
                data_sel[0] = s.split("|")
            }
           
            return m
        }
        
        
        if (otype == "input") {
        	//对单式输入框的"删除重复号"添加单击事件
            $("#lt_write_del", $(me)).click(function() {
                var err = dumpNum(true);
                if (err.length > 0) {
                    checkNum();
                    switch (methodname) {
                    case "SDZX3":
                    case "SDZU3":
                    case "SDZX2":
                    case "SDRX1":
                    case "SDRX2":
                    case "SDRX3":
                    case "SDRX4":
                    case "SDRX5":
                    case "SDRX6":
                    case "SDRX7":
                    case "SDRX8":
                    case "SDZU2":
                        $("#lt_write_box", $(me)).val(data_sel[0].join(";"));
                        $.alert(lot_lang.am_s3 + "\r" + err.join(";") + "\r&nbsp;");
                        break;
                    default:
                        $("#lt_write_box", $(me)).val(data_sel[0].join(" "));
                        $.alert(lot_lang.am_s3 + "\r" + err.join(" ") + "\r&nbsp;");
                        break
                    }
                } else {
                    $.alert(lot_lang.am_s4)
                }
            });
            //添加上传文件事件
            $("#lt_write_import", $(me)).click(function() {
                $.ajaxUploadUI({
                    title: lot_lang.dec_s27,
                    url: "./js/dialog/fileupload.php",
                    loadok: lot_lang.dec_s28,
                    filetype: ["txt", "csv"],
                    success: function(data) {
                        $("#lt_write_box", $(me)).val(data).change()
                    },
                    onfinish: function() {
                        $("#lt_write_box", $(me)).focus()
                    }
                })
            });
            //单式输入框添加发生改变的事件
            $("#lt_write_box", $(me)).change(function() {             	
                var s = _inptu_deal();               
                $(this).val(s);
                checkNum()
            }).keyup(function() {            	
                _inptu_deal();
                checkNum()
            });
          //对单式输入框的"清空"按钮添加单击事件
            $("#lt_write_empty", $(me)).click(function() {
                data_sel[0] = [];
                $("#lt_write_box", $(me)).val("");
                checkNum()
            })
        }
        //选中数字号码球
        function selectNum(obj, isButton) {
            if ($.trim($(obj).attr("class")) == "on") {
                return
            }
            $(obj).attr("class", "on");
            place = Number($(obj).attr("name").replace("lt_place_", ""));//拿到place           
            var number = $.trim($(obj).html());
            data_sel[place].push(number);
            if (!isButton) {
                checkNum()
            }
          
        }
      //取消选中数字号码球
        function unSelectNum(obj, isButton) {
            if ($.trim($(obj).attr("class")) != "on") {
                return
            }
            $(obj).attr("class", "");
            place = Number($(obj).attr("name").replace("lt_place_", ""));
            var number = $.trim($(obj).html());
            data_sel[place] = $.grep(data_sel[place],
            function(n, i) {
                return n == number
            },
            true);
            if (!isButton) {
                checkNum()
            }
        }
        //改变数字按扭选中状态
        function changeNoCss(obj) {
            if ($.trim($(obj).attr("class")) == "on") {            	
                unSelectNum(obj, false)
            } else {
                selectNum(obj, false)
            }
        }
        function selectOdd(obj) {
            if (Number($(obj).html()) % 2 == 1) {
                selectNum(obj, true)
            } else {
                unSelectNum(obj, true)
            }
        }
        function selectEven(obj) {
            if (Number($(obj).html()) % 2 == 0) {
                selectNum(obj, true)
            } else {
                unSelectNum(obj, true)
            }
        }
        function selectBig(i, obj) {
            if (i >= opts.noBigIndex) {
                selectNum(obj, true)
            } else {
                unSelectNum(obj, true)
            }
        }
        function selectSmall(i, obj) {
            if (i < opts.noBigIndex) {
                selectNum(obj, true)
            } else {
                unSelectNum(obj, true)
            }
        }
        //为每一个数字按钮添加单击事件,把选择的数字添加到data_sel[place]
        $(this).find("div[name^='lt_place_']").click(function() {
            changeNoCss(this);
            //改点后面全大小奇偶清的着色状态
            $("li[class^='dxjoq']", $(this).closest("div[class='nbs']")).attr("class", "dxjoq")
        });
        
        //为后面全大小奇偶清添加单击事件
        if (opts.isButton == true || otype == "dxds") {        
            $("li[class='dxjoq']", $(this)).click(function() {
            	
                $("li[class^='dxjoq']", $(this).parent()).attr("class", "dxjoq");
                $(this).attr("class", "dxjoq on");
                switch ($(this).attr("name")) {
                case "all":
                    $.each($(this).closest("div[class='nbs']").find("div[name^='lt_place_']"),
                    function(i, n) {
                        selectNum(n, true)
                    });
                    break;
                case "big":
                    $.each($(this).closest("div[class='nbs']").find("div[name^='lt_place_']"),
                    function(i, n) {
                        selectBig(i, n)
                    });
                    break;
                case "small":
                    $.each($(this).closest("div[class='nbs']").find("div[name^='lt_place_']"),
                    function(i, n) {
                        selectSmall(i, n)
                    });
                    break;
                case "odd":
                    $.each($(this).closest("div[class='nbs']").find("div[name^='lt_place_']"),
                    function(i, n) {
                        selectOdd(n)
                    });
                    break;
                case "even":
                    $.each($(this).closest("div[class='nbs']").find("div[name^='lt_place_']"),
                    function(i, n) {
                        selectEven(n)
                    });
                    break;
                case "clean":
                    $.each($(this).closest("div[class='nbs']").find("div[name^='lt_place_']"),
                    function(i, n) {
                        unSelectNum(n, true)
                    });
                default:
                    break
                }
                checkNum()
            })
        }
        
        //为请填写倍数添加输入keyup事件
        $($.lt_id_data.id_sel_times).keyup(function() {
            var times = $(this).val().replace(/[^0-9]/g, "").substring(0, 5);
            $(this).val(times);
            if (times == "") {
                times = 0
            } else {
                times = parseInt(times, 10)
            }
            var nums = parseInt($($.lt_id_data.id_sel_num).html(), 10);
            var modes = parseInt($($.lt_id_data.id_sel_modes).val(), 10);
            var money = Math.round(times * nums * 2 * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;
            money = isNaN(money) ? 0 : money;
            $($.lt_id_data.id_sel_money).html(money)
        });
        //不清楚了
        $($.lt_id_data.id_sel_times).nextAll("a").click(function() {
        	
            $($.lt_id_data.id_sel_times).val($(this).html()).keyup()
        });
        //元角模式改变事件
        $($.lt_id_data.id_sel_modes).change(function() {
            var nums = parseInt($($.lt_id_data.id_sel_num).html(), 10);
            var times = parseInt($($.lt_id_data.id_sel_times).val(), 10);
            var modes = parseInt($($.lt_id_data.id_sel_modes).val(), 10);
            var money = Math.round(times * nums * 2 * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;
            money = isNaN(money) ? 0 : money;
            $($.lt_id_data.id_sel_money).html(money)
        });
        //为选好了按钮添加单击事件       
        $($.lt_id_data.id_sel_insert).unbind("click").click(function() {
        
            var nums = parseInt($($.lt_id_data.id_sel_num).html(), 10);//总注数
            var times = parseInt($($.lt_id_data.id_sel_times).val(), 10);//倍数
            var modes = parseInt($($.lt_id_data.id_sel_modes).val(), 10);//模式
            var money = Math.round(times * nums * 2 * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;//请算出金额
            var mid = $.lt_method_data.methodid;//玩法中的methodid 数字的
         
            if (isNaN(nums) || isNaN(times) || isNaN(money) || money <= 0) {

                $.alert(otype == "input" ? lot_lang.am_s29: lot_lang.am_s19);
                return
            }
            if (otype == "input") {
                var mname = $.lt_method[mid];
                var error = [];
                var edump = [];
                var ermsg = "";
				var rxmsg="";
                edump = dumpNum(true);//过虑重复的
                if (edump.length > 0) {
                    ermsg += lot_lang.em_s2 + "\n" + edump.join(", ") + "\r&nbsp;";
                    checkNum();
                    nums = parseInt($($.lt_id_data.id_sel_num).html(), 10);
                    money = Math.round(times * nums * 2 * ($.lt_method_data.modes[modes].rate * 1000)) / 1000
                }
                switch (mname) {
                case "ZX3":
                    error = _inputCheck_Num(3, true);//看看输入的有没有错误
                    break;
				case "RX3":
                    error = _inputCheck_Num(3, true);//看看输入的有没有错误
					chedk=0;
					 $("[name='rx3']:checkbox").each(function(n){
					 
							if($(this).attr("checked")){
								chedk++;
								rxmsg+=$(this).attr("value");
								
							}
					 });
					if(chedk!=3){
						$.alert('<IMG src="/images/comm/t.gif" class=icons_mb5_e style="margin:10px 15px 0 15px;">必须选择三个有效的位数') ;
						return;
					}
                    break;
                case "HHZX":
                    error = _inputCheck_Num(3, true, _HHZXcheck, true);
                    break;
                case "ZX2":
                    error = _inputCheck_Num(2, true);
                    break;
				case "RX2":
                    error = _inputCheck_Num(2, true);
					chedk=0;
					 $("[name='rx2']:checkbox").each(function(n){
					 
							if($(this).attr("checked")){
								chedk++;
								rxmsg+=$(this).attr("value");
								
							}
					 });
					if(chedk!=2){
						$.alert('<IMG src="/images/comm/t.gif" class=icons_mb5_e style="margin:10px 15px 0 15px;">必须选择二个有效的位数') ;
						return;
					}
                    break;
                case "ZU2":
                    error = _inputCheck_Num(2, true, _HHZXcheck, true);
                    break;
                case "SDZX3":
                    error = _inputCheck_Num(8, true, _SDinputCheck, false);
                    break;
                case "SDZU3":
                    error = _inputCheck_Num(8, true, _SDinputCheck, true);
                    break;
                case "SDZX2":
                    error = _inputCheck_Num(5, true, _SDinputCheck, false);
                    break;
                case "SDZU2":
                    error = _inputCheck_Num(5, true, _SDinputCheck, true);
                    break;
                case "SDRX1":
                    error = _inputCheck_Num(2, true, _SDinputCheck, false);
                    break;
                case "SDRX2":
                    error = _inputCheck_Num(5, true, _SDinputCheck, true);
                    break;
                case "SDRX3":
                    error = _inputCheck_Num(8, true, _SDinputCheck, true);
                    break;
                case "SDRX4":
                    error = _inputCheck_Num(11, true, _SDinputCheck, true);
                    break;
                case "SDRX5":
                    error = _inputCheck_Num(14, true, _SDinputCheck, true);
                    break;
                case "SDRX6":
                    error = _inputCheck_Num(17, true, _SDinputCheck, true);
                    break;
                case "SDRX7":
                    error = _inputCheck_Num(20, true, _SDinputCheck, true);
                    break;
                case "SDRX8":
                    error = _inputCheck_Num(23, true, _SDinputCheck, true);
                    break;
                default:
                    break
                }
                if (error.length > 0) {
                    ermsg += lot_lang.em_s1 + "\n" + error.join(", ") + "\r&nbsp;"
                }
                if (ermsg.length > 1) {
                    $.alert(ermsg, "", "", 300)
                }
            }
            var nos = $.lt_method_data.str;//'-,-,X,X,X'
            var serverdata = "{'type':'" + otype + "','methodid':" + mid + ",'codes':'";
            var temp = [];
			 var mname = $.lt_method[mid];
            for (i = 0; i < data_sel.length; i++) {
				if(mname=="DWD"){
					if(data_sel[i].length>7){
						alert("定位胆,每行最多可选7码!");
						return;
					}
				}
            	//进行形态替换
                nos = nos.replace("X", data_sel[i].sort(_SortNum).join($.lt_method_data.sp));
              //temp里的东西要发到服务器上的
                temp.push(data_sel[i].sort(_SortNum).join("&"))
            }
            if (nos.length > 40) {
                var nohtml = nos.substring(0, 35) + "..."
            } else {
                var nohtml = nos
            }
          //判断确认区是否有相同的内容 
            if ($.lt_same_code[mid] != undefined && $.lt_same_code[mid][modes] != undefined && $.lt_same_code[mid][modes].length > 0) {
                if ($.inArray(temp.join("|"), $.lt_same_code[mid][modes]) != -1) {
                    $.alert(lot_lang.am_s28);
                    return false
                }
            }
            var sel_isdy = false;
            var sel_prize = 0;//奖金
            var sel_point = 1;//返点
          
            if ($.lt_method_data.dyprize.length == 12 && $.lt_isdyna == 1) {
                if ($("#lt_sel_dyprize") == undefined) {
                    $.alert(lot_lang.am_s27);
                    return false
                }
                var sel_dy = $("#lt_sel_dyprize").val();
                sel_dy = sel_dy.split("|");
                //如果没有返点信息提示数据错误
                if (sel_dy[1] == undefined) {
                    $.alert(lot_lang.am_s27);
                    return false
                }
                sel_isdy = true;
                sel_prize = Math.round(Number(sel_dy[0]) * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;//根据元角模式算出奖金
                sel_point = Number(sel_dy[1])//返点
            }
            sel_isdy = true;
           
          
          switch(parseInt($.currentmode,10)){
          		case 1:
          			 var sel_prize = 1700;	//得到滚到条上面的奖金
          		break;
          		case 2:
          			 var sel_prize = 1800;
              	break;
          		case 3:
          			 var sel_prize = 1900;
              	break;
          		case 4:
          			 var sel_prize = formatFloat(gr.getValue()[0]);	//得到滚到条上面的奖金
              	break;
              	default:
              		 var sel_prize = 1700;	//得到滚到条上面的奖金
              	break;
          }

			//限制号码lt_lottid  HHZX
			//mname = $.lt_method[$.lt_method_data.methodid];//从全局lt_method中取得玩法名称英文  

	

			if (otype == "input") {
				if(mname=='ZX4'){
					
					if(nums>8000){
						
						alert("最多可选8000注");
						return;
					}
					
				
				}
				if(mname=='ZX3'){
					
					if(nums>800){
						
						alert("最多可选800注");
						return;
					}
					
				
				}
				

			}else{
				
				if(mname=='ZX5'){
					
					if(nums>1 || times>1){
						
					//	alert("只可以选一注一倍");
						//return;
					}
					
				
				}
				if(mname=='ZX4'){
					
					if(nums>8000){
						
						alert("最多可选8000注");
						return;
					}
					
				
				}
				if(mname=='ZX3'){
					
					if(nums>800){
						
						alert("最多可选800注");
						return;
					}
					
				
				}
				
				if(mname=='ZUL'){
					/*
					if(nums>56){
						
						alert("最多可选56注");
						return;
					}
					
				*/
				}

				if(mname=='BDW1'){
					
					if(nums>4){
						
						alert("每注最多选4码");
						return;
					}					
				
				}
				if(mname=='BDW2'){
					
					if(nums>6){
						
						alert("每注最多选6码");
						return;
					}					
				
				}
				
				if(mname=='ZU2'){
				
					if(data_sel[0].length>8 ){

						alert("每行最多可选为8码");
						
						return;
					}
				
				}
				

			}

            //alert(sel_prize);
           // sel_prize =1700;
            sel_point=fd;
            noshtml = "[" + $.lt_method_data.title + "_" + $.lt_method_data.name + "] " + nohtml;
             serverdata += temp.join("|") + "','nums':" + nums + ",'rxmsg':'" + rxmsg + "','times':" + times + ",'money':" + money + ",'mode':" + modes + ",'prizeMode':'" + sel_prize + "','desc':'" + noshtml + "'}";
          
            var cfhtml = '<tr style="cursor:pointer;"><td>' + noshtml + "</td><td width=6>" + $.lt_method_data.modes[modes].name + '</td><td width=50 class="r">' + nums + lot_lang.dec_s1 + '</td><td width=50 class="r">' + times + lot_lang.dec_s2 + '</td><td width=70 class="r">' + money + lot_lang.dec_s3 + '</td><td width=20 class="c">X<input type="hidden" name="lt_project[]" value="' + serverdata + '" /></td></tr>';
            var $cfhtml = $(cfhtml);
            if ($.lt_total_nums == 0) {
                $($.lt_id_data.id_cf_content).children().empty()
            }
          //将每注的详细信息添加到页面投注项中
            $cfhtml.prependTo($.lt_id_data.id_cf_content);
            //投注项中添加鼠标滑过事件与单击事件
            $('td[class="c"]', $cfhtml).parent().mouseover(function() {
                var $h = $('<div class=fbox><table border=0 cellspacing=0 cellpadding=0><tr class=t><td class=tl></td><td class=tm></td><td class=tr></td></tr><tr class=mm><td class=ml><img src="/images/comm/t.gif"></td><td>' + lot_lang.dec_s30 + ": " + $.lt_method_data.title + "_" + $.lt_method_data.name + "<br/>" + lot_lang.dec_s31 + ": " + nohtml + "<br/>" + lot_lang.dec_s32 + ": " + $.lt_method_data.modes[modes].name + (sel_isdy ? (", " + lot_lang.dec_s33 + " 1900") : "") + "<br/><div class=in><span class=ic></span>  " + lot_lang.dec_s35 + " " + nums + " " + lot_lang.dec_s1 + ", " + times + " " + lot_lang.dec_s2 + ", " + lot_lang.dec_s36 + " " + money + " " + lot_lang.dec_s3 + '</div></td><td class=mr><img src="/images/comm/t.gif"></td></tr><tr class=b><td class=bl></td><td class=bm><img src="/images/comm/t.gif"></td><td class=br></td></tr></table><div class=ar><div class=ic></div></div></div>');
                var offset = $(this).offset();
                var left = offset.left + 200;
                var top = offset.top - 79;
                $(this).openFloat($h, "more", left, top)
            }).mouseout(function() {
                $(this).closeFloat()
            }).click(function() {
				
                var sss = '<h4 style="text-align:left;">' + lot_lang.dec_s30 + ": " + $.lt_method_data.title + "_" + $.lt_method_data.name + "<br/>" + lot_lang.dec_s32 + ": " + $.lt_method_data.modes[modes].name + lot_lang.dec_s32 + (sel_isdy ? (", " + lot_lang.dec_s33 + " " + sel_prize + ", " + lot_lang.dec_s34 + " " + (Math.ceil(sel_point * 1000) / 10) + "%") : "") + "<br/>" + lot_lang.dec_s35 + " " + nums + " " + lot_lang.dec_s1 + ", " + times + " " + lot_lang.dec_s2 + ", " + lot_lang.dec_s36 + " " + money + " " + lot_lang.dec_s3 + "</h4>";
                sss += '<div class="data" style="height:60px;"><table border=0 cellspacing=0 cellpadding=0><tr><td>' + nos + "</td></tr></table></div>";
               // $.alert(sss, lot_lang.dec_s5, "", 400, false)
            });
            //增加投注总注数
            $.lt_total_nums += nums;
            $.lt_total_money += money;//总金额
            $.lt_total_money = Math.round($.lt_total_money * 1000) / 1000;
            basemoney = Math.round(nums * 2 * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;//根据元角算出当前投注项的金额
           
            $.lt_trace_base = Math.round(($.lt_trace_base + basemoney) * 1000) / 1000;
           //在页面右下角显示下 总注数 总金额 投注项数目
            $($.lt_id_data.id_cf_num).html($.lt_total_nums);
            $($.lt_id_data.id_cf_money).html($.lt_total_money);
            $($.lt_id_data.id_cf_count).html(parseInt($($.lt_id_data.id_cf_count).html(), 10) + 1);
            
            var pc = 0;
            var pz = 0;
            $.each($.lt_method_data.prize,  //prize:{1:'1800.00'},
            function(i, n) {
                n = isNaN(Number(n)) ? 0 : Number(n);
                pz = pz > n ? pz: n;
                pc++
            });
            if (pc != 1) {
                pz = 0
            }
            pz = Math.round(pz * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;
            //pz = sel_isdy ? sel_prize: pz;
            //绑定数据项到投注项条目上面去
            $cfhtml.data("data", {
                methodid: mid,
                methodname: $.lt_method_data.title + "_" + $.lt_method_data.name,
                nums: nums,
                money: money,
                modes: modes,
                modename: $.lt_method_data.modes[modes].name,
                basemoney: basemoney,
                prize: pz,
                code: temp.join("|"),
                desc: nohtml
            });
            if ($.lt_same_code[mid] == undefined) {
                $.lt_same_code[mid] = []
            }
            if ($.lt_same_code[mid][modes] == undefined) {
                $.lt_same_code[mid][modes] = []
            }
            //将temp中的数组用|连接 放到$.lt_same_code[mid][modes]
            $.lt_same_code[mid][modes].push(temp.join("|"));
            
            //添加投注项条目的删除事件
            $("td", $cfhtml).filter(".c").attr("title", lot_lang.dec_s24).click(function() {
                var n = $cfhtml.data("data").nums;
                var m = $cfhtml.data("data").money;
                var b = $cfhtml.data("data").basemoney;
                var c = $cfhtml.data("data").code;
                var d = $cfhtml.data("data").methodid;
                var f = $cfhtml.data("data").modes;
                var i = null;
                $.each($.lt_same_code[d][f],
                function(k, code) {
                    if (code == c) {
                        i = k
                    }
                });
                if (i != null) {
                    $.lt_same_code[d][f].splice(i, 1)
                } else {
                    $.alert(lot_lang.am_s27);
                    return
                }
                $.lt_total_nums -= n;
                $.lt_total_money -= m;
                $.lt_total_money = Math.round($.lt_total_money * 1000) / 1000;
                $.lt_trace_base = Math.round(($.lt_trace_base - b) * 1000) / 1000;
                $(this).parent().remove();
                if ($.lt_total_nums == 0) {
                    $('<tr class="nr"><td colspan=7>暂无投注项</td></tr>').prependTo($.lt_id_data.id_cf_content)
                }
                $($.lt_id_data.id_cf_num).html($.lt_total_nums);
                $($.lt_id_data.id_cf_money).html($.lt_total_money);
                $($.lt_id_data.id_cf_count).html(parseInt($($.lt_id_data.id_cf_count).html(), 10) - 1);
                cleanTraceIssue();
                if ($.lt_ismargin == false) {                	
                    traceCheckMarginSup()
                }
                $(this).parent().closeFloat()
            });
            SetCookie("modes", modes, 86400);
            SetCookie("dypoint", sel_point, 86400);
            //清空data_sel数据数组
            for (i = 0; i < data_sel.length; i++) {
                data_sel[i] = []
            }
          //清空选择数字区域或者单式输入框的内容
            if (otype == "input") {
                $("#lt_write_box", $(me)).val("")
            } else {
                if (otype == "digital" || otype == "dxds" || otype == "dds") {
                    $("div", $(me)).filter(".on").removeClass("on");
                    $("li[class^='dxjoq']", $(me)).attr("class", "dxjoq")
                }
            }
            //设置默认倍数为1
            $($.lt_id_data.id_sel_times).val(1);
            checkNum();
            cleanTraceIssue();
            if ($.lt_ismargin == true) {
                traceCheckMarginSup()
            }
        })
    };
    $.fn.lt_trace = function() {
        var t_type = "margin";
        $.extend({
            lt_trace_issue: 0,
            lt_trace_money: 0
        });
        var t_count = $.lt_issues.today.length + $.lt_issues.tomorrow.length;//总期数
        var t_nowpos = 0;
        var htmllabel = '<span id="lt_margin" class="tab-front"><span class="tabbar-left"></span><span class="content">' + lot_lang.dec_s13 + '</span><span class="tabbar-right"></span></span>';
        htmllabel += '<span id="lt_sametime" class="tab-back"><span class="tabbar-left"></span><span class="content">' + lot_lang.dec_s10 + '</span><span class="tabbar-right"></span></span>';
        htmllabel += '<span id="lt_difftime" class="tab-back"><span class="tabbar-left"></span><span class="content">' + lot_lang.dec_s11 + '</span><span class="tabbar-right"></span></span>';
        var htmltext = '<span id="lt_margin_html">' + lot_lang.dec_s14 + '&nbsp;<input name="lt_trace_times_margin" type="text" id="lt_trace_times_margin" value="1" size="3" />&nbsp;&nbsp;' + lot_lang.dec_s29 + '&nbsp;<input name="lt_trace_margin" type="text" id="lt_trace_margin" value="50" size="3" />%&nbsp;&nbsp;</span>';
        htmltext += '<span id="lt_sametime_html" style="display:none;">' + lot_lang.dec_s14 + '&nbsp;<input name="lt_trace_times_same" type="text" id="lt_trace_times_same" value="1" size="3" /></span>';
        htmltext += '<span id="lt_difftime_html" style="display:none;">' + lot_lang.dec_s17 + '&nbsp;<input name="lt_trace_diff" type="text" id="lt_trace_diff" value="1" size="3" />&nbsp;' + lot_lang.dec_s18 + "&nbsp;&nbsp;" + lot_lang.dec_s2 + " " + lot_lang.dec_s19 + ' <input name="lt_trace_times_diff" type="text" id="lt_trace_times_diff" value="2" size="3" /></span>';
        htmltext += "&nbsp;&nbsp;" + lot_lang.dec_s15 + '&nbsp;<input name="lt_trace_count_input" type="text" id="lt_trace_count_input" style="width:36px" value="10" size="3" /><input type="hidden" id="lt_trace_money" name="lt_trace_money" value="0" /><input type="hidden" id="lt_trace_alcount" />';
        $(htmllabel).appendTo($.lt_id_data.id_tra_label);
        $(htmltext).appendTo($.lt_id_data.id_tra_lhtml);
        $($.lt_id_data.id_tra_alct).val(t_count);
        $("#lt_margin").click(function() {
            if ($(this).attr("class") != "tab-front") {
                $(this).attr("class", "tab-front");
                $("#lt_sametime").attr("class", "tab-back");
                $("#lt_difftime").attr("class", "tab-back");
                $("#lt_margin_html").show();
                $("#lt_sametime_html").hide();
                $("#lt_difftime_html").hide();
                t_type = "margin"
            }
        });
        $("#lt_sametime").click(function() {
            if ($(this).attr("class") != "tab-front") {
                $(this).attr("class", "tab-front");
                $("#lt_margin").attr("class", "tab-back");
                $("#lt_difftime").attr("class", "tab-back");
                $("#lt_margin_html").hide();
                $("#lt_sametime_html").show();
                $("#lt_difftime_html").hide();
                t_type = "same"
            }
        });
        $("#lt_difftime").click(function() {
            if ($(this).attr("class") != "tab-front") {
                $(this).attr("class", "tab-front");
                $("#lt_margin").attr("class", "tab-back");
                $("#lt_sametime").attr("class", "tab-back");
                $("#lt_margin_html").hide();
                $("#lt_sametime_html").hide();
                $("#lt_difftime_html").show();
                t_type = "diff"
            }
        });
        //更新页面上面的显示
        function upTraceCount() {
            $("#lt_trace_count").html($.lt_trace_issue);//页面上面追号区域的总期数
            $("#lt_trace_hmoney").html(JsRound($.lt_trace_money, 2, true));//页面上面的追号总金额
            $("#lt_trace_money").val($.lt_trace_money);//隐藏表单中的追号总金额
        }
        //追号计划输入框不能输入除数字以外的东西
        $("input", $($.lt_id_data.id_tra_lhtml)).keyup(function() {
            $(this).val(Number($(this).val().replace(/[^0-9]/g, "0")))
        });
        //选择追号期数下拉框  追号期数input框做相应变化 lt_trace_count_input
        $("#lt_trace_qissueno").change(function() {
            var t = 0;
            if ($(this).val() == "all") {
                t = parseInt($($.lt_id_data.id_tra_alct).val(), 10)
            } else {
                t = parseInt($(this).val(), 10)
            }
            t = isNaN(t) ? 0 : t;
            $("#lt_trace_count_input").val(t)
        });
        
      //追号列表添加
        var issueshtml = '<table width="100%" cellspacing=0 cellpadding=0 border=0 id="lt_trace_issues_today">';
        //循环当前期今天以后的所有期数
        $.each($.lt_issues.today,
        function(i, n) {
            issueshtml += '<tr id="tr_trace_' + n.issue + '"><td class="r1"><input type="checkbox" name="lt_trace_issues[]" value="' + n.issue + '" /></td><td>' + n.issue + '</td><td class="nosel"><input name="lt_trace_times_' + n.issue + '" type="text" class="r2" value="0" disabled/>' + lot_lang.dec_s2 + "</td><td>" + lot_lang.dec_s20 + '<span id="lt_trace_money_' + n.issue + '">0.00</span></td><td>' + n.endtime + "</td></tr>"
        });
        issueshtml += '</table><table width="100%" cellspacing=0 cellpadding=0 border=0 id="lt_trace_issues_tom" style="display:none;">';
      //循环当前期明天以后的所有期数
        $.each($.lt_issues.tomorrow,
        function(i, n) {
            issueshtml += '<tr id="tr_trace_' + n.issue + '"><td class="r1"><input type="checkbox" name="lt_trace_issues[]" value="' + n.issue + '" /></td><td>' + n.issue + '</td><td class="nosel"><input name="lt_trace_times_' + n.issue + '" type="text" class="r2" value="0" disabled/>' + lot_lang.dec_s2 + "</td><td>" + lot_lang.dec_s20 + '<span id="lt_trace_money_' + n.issue + '">0.00</span></td><td>' + n.endtime + "</td></tr>"
        });
        issueshtml += "</table>";
        $(issueshtml).appendTo($.lt_id_data.id_tra_issues);
        //追号列表添加-----------结束
        
        //追号列表复选框改变事件
        function changeIssueCheck(obj) {
            var money = $.lt_trace_base;
            var $j = $(obj).closest("tr");
            if ($(obj).attr("checked") == true) {
                $j.find("input[name^='lt_trace_times_']").val(1).attr("disabled", false).data("times", 1);
                $j.find("span[id^='lt_trace_money_']").html(JsRound(money, 2, true));
                $.lt_trace_issue++;
                $.lt_trace_money += money
            } else {
                var t = $j.find("input[name^='lt_trace_times_']").val();
                $j.find("input[name^='lt_trace_times_']").val(0).attr("disabled", true).data("times", 0);
                $j.find("span[id^='lt_trace_money_']").html("0.00");
                $.lt_trace_issue--;
                $.lt_trace_money -= money * parseInt(t, 10)
            }
            $.lt_trace_money = JsRound($.lt_trace_money, 2);
            upTraceCount()
        }
        //追号列表倍数输入框不能输入除数字以外的东西
        $("input[name^='lt_trace_times_']", $($.lt_id_data.id_tra_issues)).keyup(function() {
            var v = Number($(this).val().replace(/[^0-9]/g, "0"));          
            $.lt_trace_money += $.lt_trace_base * (v - $(this).data("times"));           
            upTraceCount();
            $(this).val(v).data("times", v);
            $(this).closest("tr").find("span[id^='lt_trace_money_']").html(JsRound($.lt_trace_base * v, 2, true))
        });
        //让追号列表复选框添加单强事件,防止冒泡
        $(":checkbox", $.lt_id_data.id_tra_issues).click(function(event) {
            event.stopPropagation();
            event.cancelBubble = true;
            changeIssueCheck(this)
        });
        //为追号列表每行tr添加滑动变色效果.并且添加单击每行自动选择复选框
        $("tr", $($.lt_id_data.id_tra_issues)).live("mouseover",
        function() {
            $(this).attr("class", "hv")
        }).live("mouseout",
        function() {
            if ($(this).find(":checkbox").attr("checked") == false) {
                $(this).removeClass("hv")
            } else {
                $(this).attr("class", "on")
            }
        }).live("click",
        function() {
            if ($(this).find(":checkbox").attr("checked") == false) {
                $(this).find(":checkbox").attr("checked", true)
            } else {
                $(this).find(":checkbox").attr("checked", false)
            }
            changeIssueCheck($(this).find(":checkbox"))
        });
        
        $("input[name^='lt_trace_times_']", $($.lt_id_data.id_tra_issues)).click(function() {
            return false
        });
        
        //让追号列表框  能与 页面上面右侧处的起始期数对应上      ,也就是 页面上面右侧处的起始期数下拉列表change事件 
        var _initTraceByIssue = function() {
            var st_issue = $("#lt_issue_start").val();//得到追号期数下拉列表的值
           
            cleanTraceIssue();
            var isshow = false;
            var acount = 0;
            var loop = 0;
            var mins = t_nowpos;
            var maxe = t_nowpos;
            $.each($.lt_issues.today,
            function(i, n) {
                loop++;
                if (isshow == false && st_issue == n.issue) {
                    isshow = true;                   
                    $($.lt_id_data.id_tra_today).click();
                }
                if (isshow == false) {
                    acount++;
                    maxe = Math.max(maxe, acount)
                } else {
                    mins = Math.min(mins, acount)
                }
                if (loop >= mins && loop <= maxe) {
                    if (isshow == true) {
                        $("#tr_trace_" + n.issue, $($.lt_id_data.id_tra_issues)).show()
                    } else {
                        $("#tr_trace_" + n.issue, $($.lt_id_data.id_tra_issues)).hide()
                    }
                }
                if (loop > maxe) {
                    return false
                }
            });
           
            $.each($.lt_issues.tomorrow,
            function(i, n) {
                loop++;
                if (isshow == false && st_issue == n.issue) {
                    isshow = true;
                    $($.lt_id_data.id_tra_tom).click()
                }
                if (isshow == false) {
                    acount++;
                    maxe = Math.max(maxe, acount)
                } else {
                    mins = Math.min(mins, acount)
                }
                if (loop >= mins && loop <= maxe) {
                    if (isshow == true) {
                        $("#tr_trace_" + n.issue, $($.lt_id_data.id_tra_issues)).show()
                    } else {
                        $("#tr_trace_" + n.issue, $($.lt_id_data.id_tra_issues)).hide()
                    }
                }
                if (loop > maxe) {
                    return false
                }
            });
            t_count = $.lt_issues.today.length + $.lt_issues.tomorrow.length - acount;
         
            if ($("#lt_trace_qissueno").val() == "all") {
                $("#lt_trace_count_input").val(t_count)
            }
            t_nowpos = acount;
            $($.lt_id_data.id_tra_alct).val(t_count);//让隐藏了多少期
            $.lt_trace_issue = 0;
            $.lt_trace_money = 0;
            upTraceCount()
        };
        $("#lt_issue_start").change(function() {
            if ($($.lt_id_data.id_tra_if).attr("checked") == true) {
                _initTraceByIssue()
            }
        });
      //让追号列表框  能与 页面上面右侧处的起始期数对应上      ,也就是 页面上面右侧处的起始期数下拉列表change事件 --------结束
        
        //为我要追号添加单击事件,用于显示或隐藏追号列表
        $($.lt_id_data.id_tra_if).attr("checked", false).click(function() {
            if ($(this).attr("checked") == true) {
                if ($.lt_total_nums <= 0) {
                    $.alert(lot_lang.am_s7);
                    $(this).attr("checked", false);
                    return
                }
                $($.lt_id_data.id_tra_stop).attr("disabled", false).attr("checked", true);
                $($.lt_id_data.id_tra_box1).show();
                _initTraceByIssue()
            } else {
                $($.lt_id_data.id_tra_stop).attr("disabled", true).attr("checked", false);
                $($.lt_id_data.id_tra_box1).hide()
            }
        });
        //暂时不知道
        var computeByMargin = function(s, m, b, o, p) {
            s = s ? parseInt(s, 10) : 0;
            m = m ? parseInt(m, 10) : 0;
            b = b ? Number(b) : 0;
            o = o ? Number(o) : 0;
            p = p ? Number(p) : 0;
            var t = 0;
            if (b > 0) {
                if (m > 0) {
                    t = Math.ceil(((m / 100 + 1) * o) / (p - (b * (m / 100 + 1))))
                } else {
                    t = 1
                }
                if (t < s) {
                    t = s
                }
            }
            return t
        };
        //生成追号单按钮单击事件-----------太难了
        $($.lt_id_data.id_tra_ok).click(function() {
            var c = parseInt($.lt_total_nums, 10);
            if (c <= 0) {
                $.alert(lot_lang.am_s7);
                return false
            }
            var p = 0;
            if (t_type == "margin") {
                var marmt = 0;
                var marmd = 0;
                var martype = 0;
                $.each($("tr", $($.lt_id_data.id_cf_content)),
                function(i, n) {
                    if (marmt != 0 && marmt != $(n).data("data").methodid) {
                        martype = 2;
                        return false
                    } else {
                        marmt = $(n).data("data").methodid
                    }
                    if (marmd != 0 && marmd != $(n).data("data").modes) {
                        martype = 3;
                        return false
                    } else {
                        marmd = $(n).data("data").modes
                    }
                    if ($(n).data("data").prize <= 0 || (p != 0 && p != $(n).data("data").prize)) {
                        martype = 1;
                        return false
                    } else {
                        p = $(n).data("data").prize
                    }
                });
                if (martype == 1) {
                    $.alert(lot_lang.am_s32);
                    return false
                } else {
                    if (martype == 2) {
                        $.alert(lot_lang.am_s31);
                        return false
                    } else {
                        if (martype == 3) {
                            $.alert(lot_lang.am_s33);
                            return false
                        }
                    }
                }
            }
            var ic = parseInt($("#lt_trace_count_input").val(), 10);
            ic = isNaN(ic) ? 0 : ic;
            if (ic <= 0) {
                $.alert(lot_lang.am_s8);
                return false
            }
            if (ic > t_count) {
                $.alert(lot_lang.am_s9, "", "", 300);
                return false
            }
            var times = parseInt($("#lt_trace_times_" + t_type).val(), 10);
            times = isNaN(times) ? 0 : times;
            if (times <= 0) {
                $.alert(lot_lang.am_s10);
                return false
            }
            times = isNaN(times) ? 0 : times;
            var td = [];
            var tm = 0;
            var msg = "";
            if (t_type == "same") {
                var m = $.lt_trace_base * times;
                tm = m * ic;
                for (var i = 0; i < ic; i++) {
                    td.push({
                        times: times,
                        money: m
                    })
                }
                msg = lot_lang.am_s12.replace("[times]", times)
            } else {
                if (t_type == "diff") {
                    var d = parseInt($("#lt_trace_diff").val(), 10);
                    d = isNaN(d) ? 0 : d;
                    if (d <= 0) {
                        $.alert(lot_lang.am_s11);
                        return false
                    }
                    var m = $.lt_trace_base;
                    var t = 1;
                    for (var i = 0; i < ic; i++) {
                        if (i != 0 && (i % d) == 0) {
                            t *= times
                        }
                        td.push({
                            times: t,
                            money: m * t
                        });
                        tm += m * t
                    }
                    msg = lot_lang.am_s13.replace("[step]", d).replace("[times]", times)
                } else {
                    if (t_type == "margin") {
                        var e = parseInt($("#lt_trace_margin").val(), 10);
                        e = isNaN(e) ? 0 : e;
                        if (e <= 0) {
                            $.alert(lot_lang.am_s30);
                            return false
                        }
                        var m = $.lt_trace_base;
                        if (e >= ((p * 100 / m) - 100)) {
                            $.alert(lot_lang.am_s30);
                            return false
                        }
                        var t = 0;
                        for (var i = 0; i < ic; i++) {
                            t = computeByMargin(times, e, m, tm, p);
                            td.push({
                                times: t,
                                money: m * t
                            });
                            tm += m * t
                        }
                        msg = lot_lang.am_s34.replace("[margin]", e).replace("[times]", times)
                    }
                }
            }
            msg += lot_lang.am_s14.replace("[count]", ic);
            msg = lot_lang.am_s99.replace("[msg]", msg);
            $.confirm(msg,
            function() {
                cleanTraceIssue();
                var $s = $("tr:visible", $($.lt_id_data.id_tra_issues));
                for (i = 0; i < ic; i++) {
                    $($s[i]).find(":checkbox").attr("checked", true);
                    $($s[i]).find("input[name^='lt_trace_times_']").val(td[i].times).attr("disabled", false).data("times", td[i].times);
                    $($s[i]).find("span[id^='lt_trace_money_']").html(JsRound(td[i].money, 2, true));
                    $($s[i]).addClass("on")
                }
                $.lt_trace_issue = ic;
                $.lt_trace_money = tm;
                upTraceCount()
            },
            "", "", 300)
        })
    };
    
    //追号页面方法----------结束了
    
    //清空所有追号信息
    var cleanTraceIssue = function() {
        $("input[name^='lt_trace_issues']", $($.lt_id_data.id_tra_issues)).attr("checked", false);
        $("input[name^='lt_trace_times_']", $($.lt_id_data.id_tra_issues)).val(0).attr("disabled", true);
        $("span[id^='lt_trace_money_']", $($.lt_id_data.id_tra_issues)).html("0.00");
        $("tr", $($.lt_id_data.id_tra_issues)).removeClass("on");
        $("#lt_trace_hmoney").html(0);
        $("#lt_trace_money").val(0);
        $("#lt_trace_count").html(0);
        $.lt_trace_issue = 0;
        $.lt_trace_money = 0
    };
    var traceCheckMarginSup = function() {
        var marmt = 0;
        var marmd = 0;
        var martype = 0;
        var p = 0;
        if ($.lt_total_nums > 0) {
            $.each($("tr", $($.lt_id_data.id_cf_content)),
            function(i, n) {
                if (marmt != 0 && marmt != $(n).data("data").methodid) {
                    martype = 2;
                    return false
                } else {
                    marmt = $(n).data("data").methodid
                }
                if (marmd != 0 && marmd != $(n).data("data").modes) {
                    martype = 3;
                    return false
                } else {
                    marmd = $(n).data("data").modes
                }
                if ($(n).data("data").prize <= 0 || (p != 0 && p != $(n).data("data").prize)) {
                    martype = 1;
                    return false
                } else {
                    p = $(n).data("data").prize
                }
            })
        }
        if (martype > 0) {
            $.lt_ismargin = false;
            $("#lt_margin").hide();
            $("#lt_margin_html").hide();
            $("#lt_sametime").click()
        } else {
            $.lt_ismargin = true;
            $("#lt_margin").show();
            $("#lt_margin_html").show();
            $("#lt_margin").click()
        }
        return true
    };
    
    //页上面的时间倒计时控制
    //opts.servertime, opts.cur_issue.endtime 传进来的
    $.fn.lt_timer = function(start, end) {
    	//alert(end);
        var me = this;
        if (start == "" || end == "") {
            $.lt_time_leave = 0
        } else {
            $.lt_time_leave = (format(end).getTime() - format(start).getTime()) / 1000
        }
        
        function fftime(n) {
            return Number(n) < 10 ? "" + 0 + Number(n) : Number(n)
        }
        function format(dateStr) {
            return new Date(dateStr.replace(/[\-\u4e00-\u9fa5]/g, "/"))
        }
        function diff(t) {
            return t > 0 ? {
                day: Math.floor(t / 86400),
                hour: Math.floor(t % 86400 / 3600),
                minute: Math.floor(t % 3600 / 60),
                second: Math.floor(t % 60)
            }: {
                day: 0,
                hour: 0,
                minute: 0,
                second: 0
            }
        }
        var firstTime = Math.ceil(Math.random() * (269 - 210) + 210); //生成210 到 269之间的随机数
        var secondTime = Math.ceil(Math.random() * (89 - 30) + 30);//生成30 到 89之间的随机数
        var timerno = window.setInterval(function() {
            /*if ($.lt_time_leave > 0 && ($.lt_time_leave % firstTime == 0 || $.lt_time_leave == secondTime)) {
                $.ajax({
                    type: "POST",
                    URL: $.lt_ajaxurl,
                    timeout: 30000,
                    data: "lotteryid=" + $.lt_lottid + "&issue=" + $($.lt_id_data.id_cur_issue).html() + "&flag=gettime",
                    success: function(data) {
                        data = parseInt(data, 10);
                        data = isNaN(data) ? 0 : data;
                        data = data <= 0 ? 0 : data;
                        $.lt_time_leave = data
                    }
                })
            }*/
            if ($.lt_time_leave <= 0) {
                clearInterval(timerno);
                if ($.lt_open_status == true) {
                    $("#lt_opentimeleft").lt_opentimer($($.lt_id_data.id_cur_end).html(), $.lt_open_time);
                }

				//将确认投注按钮变成灰色,30秒后变成可用
				$("#lt_buy").css("backgroundImage","url(/images/v1/main_head33er_bg2.jpg)").click(function(){
					$.alert("封单时间,暂停下注,请等待30秒");
				});

				 window.setTimeout(function() {
					
					$("#lt_buy").css("backgroundImage","url('/images/v1/main_header_bg.jpg')").lt_ajaxSubmit();

				 },30*1000);

                if ($.lt_submiting == false) {
                    $.unblockUI({
                        fadeInTime: 0,
                        fadeOutTime: 0
                    });


						
                    $.confirm(lot_lang.am_s99.replace("[msg]", lot_lang.am_s15),
                    function() {
                        $.lt_reset(false);
                        $.lt_ontimeout()
                    },
                    function() {
                        $.lt_reset(true);
                        $.lt_ontimeout()
                    },
                    "", 450);
					/*
					$.lt_reset(false);
                        $.lt_ontimeout();
						*/
                }
            }
            var oDate = diff($.lt_time_leave--);
            $(me).html("" + (oDate.day > 0 ? oDate.day + (lot_lang.dec_s21) + " ": "") + fftime(oDate.hour) + ":" + fftime(oDate.minute) + ":" + fftime(oDate.second))
        },
        1000)
    };
    

	function getcode_jiang() {
			
        	
            $.ajax({
                type: "POST",
                url: $.lt_ajaxurl,
                data: "lotteryid=" + $.lt_lottid + "&flag=gethistory",
                success: function(data) {
            	
                    var partn = /empty/;
                    if (partn.test(data)) {                    
                        return;
                    }
                   
                    eval("data=" + data);
                   
                   
                    var codebox = $("img[name='historycode']");
                    var $i = codebox.length;
                    var opencodeno = window.setInterval(function() {
                        if ($i < 0) {
                            clearInterval(opencodeno)
                        }
                        if (data.code[$i] == "*") {
                            $(codebox[$i]).attr("class", "")
                        } else {
                            $(codebox[$i]).attr("class", "n" + parseInt(data.code[$i],10))
                        }
                        $i--
                    },
                    700);
                    $("#lt_opentimebox").hide();
                    $("#lt_opentimebox2").hide();
                    $("#lt_gethistorycode").html(data.issue)
                }
            })
        }

	window.setInterval(getcode_jiang,1000*35);




    //离开奖最后2分钟的倒计时方法$("#lt_opentimeleft").lt_opentimer($($.lt_id_data.id_cur_end).html(), $.lt_open_time);
    $.fn.lt_opentimer = function(start, end) {
		
        var me = this;
       
        if (start == "" || end == "") {
            var cc = 0;
        } else {
        	
            var cc = (format(end).getTime() - format(start).getTime()) ;
            
        }
        //alert(cc);
        $.lt_time_open = 60;
        function fftime(n) {
            return Number(n) < 10 ? "" + 0 + Number(n) : Number(n);
        }
        function format(dateStr) {
        	
            return new Date(dateStr.replace(/[\-\u4e00-\u9fa5]/g, "/"));
        }
        function diff(t) {
            return t > 0 ? {
                day: Math.floor(t / 86400),
                hour: Math.floor(t % 86400 / 3600),
                minute: Math.floor(t % 3600 / 60),
                second: Math.floor(t % 60)
            }: {
                day: 0,
                hour: 0,
                minute: 0,
                second: 0
            }
        }
        $.lt_open_status = false;
        function _getcode(issue) {
        	if ($.lt_open_status == true)return;
            $.ajax({
                type: "POST",
                url: $.lt_ajaxurl,
                data: "lotteryid=" + $.lt_lottid + "&flag=gethistory&issue=" + issue,
                success: function(data) {
            	
                    var partn = /empty/;
                    if (partn.test(data)) {                    
                        return;
                    }
                   
                    eval("data=" + data);
                   
                  $.lt_open_status = true;
                    var codebox = $("img[name='historycode']");
                    var $i = codebox.length;
                    var opencodeno = window.setInterval(function() {
                        if ($i < 0) {
                            clearInterval(opencodeno)
                        }
                        if (data.code[$i] == "*") {
                            $(codebox[$i]).attr("class", "")
                        } else {
                            $(codebox[$i]).attr("class", "n" + parseInt(data.code[$i],10))
                        }
                        $i--
                    },
                    700);
                    $("#lt_opentimebox").hide();
                    $("#lt_opentimebox2").hide();
                    $("#lt_gethistorycode").html(data.issue)
                }
            })
        }
        $("#showcodebox").hide("fast");
        $("#showadvbox").show("fast");
        $("#lt_gethistorycode").html($($.lt_id_data.id_cur_issue).html());
        $("#lt_opentimebox").show();
        $("#lt_opentimebox2").hide();
        var _getTimes = 0;
        
        //cc秒后执行 取号
        window.setTimeout(function() {
        	//alert("cc秒后执行 取号");
            var tttime = Math.ceil(Math.random() * 10 + 20) * 1000;
           
            opentimerget = window.setInterval(function() {
                if ($.lt_open_status == true || _getTimes > 10) {
                	
                	clearInterval(opentimerget);
                	if (_getTimes > 8 && $.lt_open_status == false) {
                        $("#lt_opentimebox2").html("<strong>&nbsp;开奖超时,请刷新</strong>").show();
                        $("#showcodebox").hide("fast");
                        $("#showadvbox").show("fast");
                    }
                    
                }
               
                _getTimes++;
                _getcode($("#lt_gethistorycode").html());
            },
            tttime);
        },
        cc);
        //广告显示倒计60秒
        var opentimerno = window.setInterval(function() {
            if ($.lt_time_open <= 0) {
                clearInterval(opentimerno);
                $("#lt_opentimebox").hide();
                $("#lt_opentimebox2").show();
                $.each($("img[name='historycode']"),
                function(i, n) {
                    if ($(this).attr("class") != "") {
                        $(this).attr("class", "nr")
                    }
                });
                $("#showadvbox").hide("fast");
                $("#showcodebox").show("fast")
            }
           
            var oDate = diff($.lt_time_open--);
           
            $(me).html("" + (oDate.hour > 0 ? oDate.hour + ":": "") + fftime(oDate.minute) + ":" + fftime(oDate.second))
        },
        1000)
    };
    //false时 重置页面所有信息
    $.lt_reset = function(iskeep) {
        if (iskeep && iskeep === true) {
            iskeep = true
        } else {
            iskeep = false
        }
        if ($.lt_time_leave <= 0) {
            if (iskeep == false) {
                $("span[id^='smalllabel_'][class='tab-front']", $($.lt_id_data.id_smalllabel)).removeData("ischecked").click()
            }
            if (iskeep == false) {
                $.lt_total_nums = 0;
                $.lt_total_money = 0;
                $.lt_trace_base = 0;
                $.lt_same_code = [];
                $($.lt_id_data.id_cf_num).html(0);
                $($.lt_id_data.id_cf_money).html(0);
                $($.lt_id_data.id_cf_content).children().empty();
                $('<tr class="nr"><td colspan=7>暂无投注项</td></tr>').prependTo($.lt_id_data.id_cf_content);
                $($.lt_id_data.id_cf_count).html(0);
                if ($.lt_ismargin == false) {
                    traceCheckMarginSup()
                }
            }
            $.ajax({
                type: "POST",
                URL: $.lt_ajaxurl,
                data: "lotteryid=" + $.lt_lottid + "&flag=read",
                success: function(data) {
                    if (data.length <= 0) {
                        $.alert(lot_lang.am_s16);
                        return false
                    }
                    //登入超时啥的
                    var partn = /logout/;
                    if (partn.test(data)) {
                    	alert("fff");
                        alert(lot_lang.am_s17, "", "", 300);
                        top.location.href = "./";
                        return false
                    }
                    //没有到销售时间
                    var partn = /empty/;
                    if (partn.test(data)) {
                        alert(lot_lang.am_s18);
                        window.location.href = "../index/main";
                        return false
                    }
                    eval("data=" + data);
                    $($.lt_id_data.id_cur_issue).html(data.issue);
                    $($.lt_id_data.id_cur_end).html(data.saleend);
                    $($.lt_id_data.id_cur_sale).html(data.sale);
                    $($.lt_id_data.id_cur_left).html(data.left);
                    $($.lt_id_data.id_count_down).lt_timer(data.nowtime, data.saleend);
                    $.lt_open_time = data.opentime;
                    var islast = false;
                    while (true) {
                        if ($.lt_issues.today.length < 1) {
                            islast = true;
                            break
                        }
                        //把以前的期数删除
                        if (data.issue == $.lt_issues.today.shift().issue) {
                            break
                        }
                    }
                    if (islast) {
                        window.document.location.reload();
                        return false
                    }
                    //把当前期添加到第一个位置
                    $.lt_issues.today.unshift({
                        issue: data.issue,
                        endtime: data.saleend
                    });
                    var chtml = "";
                    $.each($.lt_issues.today,
                    function(i, n) {
                        chtml += '<option value="' + n.issue + '">' + n.issue + (n.issue == data.issue ? lot_lang.dec_s7: "") + "</option>"
                    });
                    var t = $.lt_issues.tomorrow.length - $.lt_issues.today.length;
                    if (t > 0) {
                        for (i = 0; i < t; i++) {
                            chtml += '<option value="' + $.lt_issues.tomorrow[i].issue + '">' + $.lt_issues.tomorrow[i].issue + "</option>"
                        }
                    }
                    $("#lt_issue_start").empty();
                    $(chtml).appendTo("#lt_issue_start");
                    t_count = $.lt_issues.tomorrow.length + $.lt_issues.today.length;
                    $($.lt_id_data.id_tra_alct).val(t_count);
                    cleanTraceIssue();
                    while (true) {
                        $j = $("tr:first", $("#lt_trace_issues_today"));
                        if ($j.length <= 0) {
                            break
                        }
                        if ($j.find(":checkbox").val() == data.issue) {
                            break
                        }
                        $j.remove()
                    }
                },
                error: function() {
                    $.alert(lot_lang.am_s16);
                    cleanTraceIssue();
                    return false
                }
            })
        } else {
            if (iskeep == false) {
                $("span[id^='smalllabel_'][class='tab-front']", $($.lt_id_data.id_smalllabel)).removeData("ischecked").click()
            }
            if (iskeep == false) {
                $.lt_total_nums = 0;
                $.lt_total_money = 0;
                $.lt_trace_base = 0;
                $.lt_same_code = [];
                $($.lt_id_data.id_cf_num).html(0);
                $($.lt_id_data.id_cf_money).html(0);
                $($.lt_id_data.id_cf_content).children().empty();
                $('<tr class="nr"><td colspan=7>暂无投注项</td></tr>').prependTo($.lt_id_data.id_cf_content);
                $($.lt_id_data.id_cf_count).html(0);
                if ($.lt_ismargin == false) {
                    traceCheckMarginSup()
                }
            }
            if (iskeep == false) {
                cleanTraceIssue()
            }
        }
    };
    
    
   
    
  
    
  //确认提交到服务器的ajax事件
    $.fn.lt_ajaxSubmit = function() {
        var me = this;
        $(this).click(function() {
        	//判断当期还有没有时间
            if (checkTimeOut() == false) {
                return
            }
            $.lt_submiting = true;
            var istrace = $($.lt_id_data.id_tra_if).attr("checked");
            if ($.lt_total_nums <= 0 || $.lt_total_money <= 0) {
                $.lt_submiting = false;
                $.alert(lot_lang.am_s7);
                return
            }
            if (istrace == true) {
                if ($.lt_trace_issue <= 0 || $.lt_trace_money <= 0) {
                    $.lt_submiting = false;
                    $.alert(lot_lang.am_s20);
                    return
                }
                var terr = "";
                $("input[name^='lt_trace_issues']:checked", $($.lt_id_data.id_tra_issues)).each(function() {
                    if (Number($(this).closest("tr").find("input[name^='lt_trace_times_']").val()) <= 0) {
                        terr += $(this).val() + "&nbsp;&nbsp;"
                    }
                });
                if (terr.length > 0) {
                    $.lt_submiting = false;
                    $.alert(lot_lang.am_s21.replace("[errorIssue]", terr), "", "", 300, false);
                    return
                }
            }
            if (istrace == true) {
                var msg = "<h4>" + lot_lang.am_s144.replace("[count]", $.lt_trace_issue) + "</h4>"
            } else {
                var msg = "<h4>" + lot_lang.dec_s8.replace("[issue]", $("#lt_issue_start").val()) + "</h4>"
            }
			msg +="<h4 style='color:red;'>该玩法单笔投注最高奖金为30万</h4>";
            msg += '<div class="data"><table border=0 cellspacing=0 cellpadding=0><tr class=hid><td width=115></td><td width=20></td><td></td></tr>';
            var modesmsg = [];
            var modes = 0;
            $.each($("tr", $($.lt_id_data.id_cf_content)),
            function(i, n) {
                datas = $(n).data("data");
                msg += "<tr><td>" + datas.methodname + "</td><td>" + datas.modename + "</td><td>" + datas.desc + "</td></tr>"
            });
            msg += "</table></div>";
            btmsg = '<div class="binfo"><span class=bbl></span><span class=bbm>' + (istrace == true ? lot_lang.dec_s16 + ": " + $.lt_trace_money: lot_lang.dec_s9 + ": " + $.lt_total_money) + " " + lot_lang.dec_s3 + "</span><span class=bbr></span></div>";
            $.confirm(msg,
            function() {
                if (checkTimeOut() == false) {
                    $.lt_submiting = false;
                    return
                }
                $("#lt_total_nums").val($.lt_total_nums);
                $("#lt_total_money").val($.lt_total_money);
                ajaxSubmit()
            },
            function() {
                $.lt_submiting = false;
                return checkTimeOut()
            },
            "", 450, true, btmsg)
        });
        function checkTimeOut() {
            if ($.lt_time_leave <= 0) {
				
                $.confirm(lot_lang.am_s99.replace("[msg]", lot_lang.am_s15),
                function() {
                    $.lt_reset(false);
                    $.lt_ontimeout()
                },
                function() {
                    $.lt_reset(true);
                    $.lt_ontimeout()
                },
                "", 450);
				/*
				 $.lt_reset(false);
                    $.lt_ontimeout();
					*/
                return false
            } else {
                return true
            }
        }
        function ajaxSubmit() {
            $.blockUI({
                message: lot_lang.am_s22,
                overlayCSS: {
                    backgroundColor: "#000000",
                    opacity: 0.3,
                    cursor: "wait"
                }
            });
            var form = $(me).closest("form");
           
           var bbb = $(form).serialize();
			
           
            $.ajax({
                type: "POST",
                url: $.lt_ajaxurl,
                timeout: 30000,
                data: $(form).serialize(),
                success: function(data) {
                    $.unblockUI({
                        fadeInTime: 0,
                        fadeOutTime: 0
                    });
                    $.lt_submiting = false;
                    if (data.length <= 0) {
                        $.alert(lot_lang.am_s16);
                        return false
                    }
                    var partn = /logout/;
                    if (partn.test(data)) {
                        alert(lot_lang.am_s17, "", "", 300);
                        top.location.href = "./";
                        return false
                    }
                    if (data == "success") {
                        $.alert(lot_lang.am_s24, lot_lang.dec_s25,
                        function() {
                            if (checkTimeOut() == true) {
                                $.lt_reset()
                            }
                            $.lt_onfinishbuy()
                        });
                        return false
                    } else {
                        eval("data = " + data + ";");
                        if (data.stats == "error") {
                            $.alert(lot_lang.am_s100 + data.data, "",
                            function() {
                                return checkTimeOut()
                            },
                            (data.data.length > 10 ? 350 : 250));
                            return false
                        }
                        if (data.stats == "fail") {
                            msg = "<h4>" + lot_lang.am_s26 + "</h4>";
                            msg += '<div class="data"><table>';
                            $.each(data.data.content,
                            function(i, n) {
                                msg += "<tr><td>" + n.desc + '</td><td width="30%">' + n.errmsg + "</td></tr>"
                            });
                            msg += "</table></div>";
                            btmsg = '<div class="binfo"><span class=bbl></span><span class=bbm>' + lot_lang.am_s25.replace("[success]", data.data.success).replace("[fail]", data.data.fail) + "</span><span class=bbr></span></div>";
                            $.confirm(msg,
                            function() {
                                if (checkTimeOut() == true) {
                                    $.lt_reset()
                                }
                                $.lt_onfinishbuy()
                            },
                            function() {
                                return checkTimeOut();
                                $.lt_onfinishbuy()
                            },
                            "", 500, true, btmsg)
                        }
                    }
                },
                error: function() {
                    $.lt_submiting = false;
                    $.unblockUI({
                        fadeInTime: 0,
                        fadeOutTime: 0
                    });
                    //$.alert(lot_lang.am_s23, "", checkTimeOut)
                }
            })
        }
    }
})(jQuery);
