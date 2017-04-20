/// <reference path="jquery-1.3.1-vsdoc.js" />

function GZfRulurControl(params) {
    /// <summary>
    ///	生成一个标尺控件 var gzrc = new GZfRulurControl();
    /// </summary>
    /// <param name="params" type="style">
    /// 标尺显示属性，默认值为 { min: 0, max: 100, splitcount: 4, slidercount: 2, sliderwidth: 12, width: "150px", border: "none", color: "#00ce00", sliderbgcolor: "#fff" ,sliderbordercolor: "#ccc" , showInfo: true, showRulur: true, showRulurKeDu: true, RulurStep: 1 };
    /// min 最小值，max 最大值，splitcount 分几段，slidercount 尺标数只能是1或2
    /// showRulur 表示是否显示刻度线，showRulurKeDu 表示是否显示刻度值
    /// showRulurKeDu 仅当 showRulur = true 的时候有效，RulurStep 是最小刻度；
    /// sliderwidth 只能是偶数，如果传入了基数，会自动加1
    /// </param>
    /// <returns type="GZfRulurControl" />

    //初始化系统变量
    {
        this.setParams(params);
    }

    //relative 位置说明
    {
        //控件原始加载顺序为 lineBack,lineFront,slider,info 
        //每一个控件的top 为上一兄弟控件的 top + 上一兄弟控件的 height
        //假设每个控件的高度均为 20 
        //则：lineBack.top = 0; 
        //    lineFront.top = lineBack.top + lineBack.height;
        //    slider[0].top = lineFront.top + lineFront.height;
    }
    this.isSuoding=false;
	
    var my = this;

    { /**/ }
    this.RulurPoint = function (width) {
        /// <summary>
        ///	生成一个尺标控件 var rp = new RulurPoint();
        /// </summary>
        this.width = (width % 2 == 0) ? width : width + 1;
        this.height = (width / 2) * 3;

        var color = my.params.sliderbordercolor;
        var border = "solid 1px " + my.params.sliderbordercolor;

        this.content = document.createElement("div");
        //this.content.style.backgroundColor = my.params.sliderbgcolor;
        this.content.style.height = (this.height + 1) + "px";
        this.content.style.width = this.width + "px";
        this.content.style.overflow = "hidden";
        //      this.content.style.border = "solid 1px";

        this.topline = document.createElement("div");
        this.topline.style.height = "1px";
        this.topline.style.width = (this.width - 4) + "px";
        this.topline.style.marginLeft = "1px";
        this.topline.style.marginRight = "1px";
        this.topline.style.borderLeft = border;
        this.topline.style.borderRight = border;
        this.topline.style.backgroundColor = color;
        this.topline.style.overflow = "hidden";
        this.content.appendChild(this.topline);

        this.sqr = document.createElement("div");
        this.sqr.style.height = (width / 2) * 2 + "px";
        this.sqr.style.width = (this.width - 2) + "px";
        this.sqr.style.borderLeft = border;
        this.sqr.style.borderRight = border;
        this.sqr.style.overflow = "hidden";
        this.sqr.style.backgroundColor = my.params.sliderbgcolor; 
        this.content.appendChild(this.sqr);

        for (var i = 1; i < this.width / 2; i++) {
            var oDiv = document.createElement("div");
            oDiv.style.height = "1px";
            oDiv.style.width = (this.width - i * 2 - 2) + "px";
            oDiv.style.marginLeft = i + "px";
            oDiv.style.marginRight = i + "px";
            oDiv.style.borderLeft = border;
            oDiv.style.borderRight = border;
            oDiv.style.overflow = "hidden";
            oDiv.style.backgroundColor = my.params.sliderbgcolor; 
            this.content.appendChild(oDiv);
        }

        return this.content;
    }
}

//GZfRulurControl 静态方法
{
    GZfRulurControl.GetObjPos = function (obj) {
        /// <summary>
        ///	获取控件绝对位置（静态方法）
        /// </summary>
        var t = obj.offsetTop;
        var l = obj.offsetLeft;
        while (obj = obj.offsetParent) {
            t += obj.offsetTop;
            l += obj.offsetLeft;
        }
        return { top: t, left: l };
    }

    GZfRulurControl.FormatFloat = function (num, rate) {
        /// <summary>
        ///	小数截位
        /// </summary>
        /// <param name="num" type="float">
        /// 原小数
        /// </param>
        /// <param name="rate" type="int">
        /// 小数位数
        /// </param>

        return (Math.round(num * Math.pow(10, rate)) / Math.pow(10, rate));
    }

    GZfRulurControl.px2Int = function (px) {
        return px.replace("px", "") * 1;
    }
}

//GZfRulurControl 事件
{
    GZfRulurControl.prototype.changing = function () {
        /// <summary>
        ///	控件的changing事件
        /// </summary>
    }

    GZfRulurControl.prototype.changed = function () {
        /// <summary>
        ///	控件的changed事件
        /// </summary>
    }
}

//GZfRulurControl 辅助方法
{
    GZfRulurControl.prototype.getStepValue = function (value) {
        //值只能是 RulurStep 的整数倍

        //求小数位数
        {
            var digitLen = 0;
            var vs = this.params.RulurStep.toString().split('.');
            if (vs.length == 2) digitLen = vs[1].length;
        }

        if (value < this.params.min) value = this.params.min;
        if (value > this.params.max) value = this.params.max;

        if (Math.abs(value - this.params.min) < this.params.RulurStep) {
            value = GZfRulurControl.FormatFloat(this.params.min, digitLen);
            return value;
        }

        if (Math.abs(value - this.params.max) < this.params.RulurStep) {
            value = GZfRulurControl.FormatFloat(this.params.max, digitLen);
            return value;
        }

        var stepYs = parseFloat(value) % this.params.RulurStep;
        if (stepYs < this.params.RulurStep / 2) {
            value -= stepYs;
        }
        else {
            value += (this.params.RulurStep - stepYs);
        }
       
        return GZfRulurControl.FormatFloat(value, digitLen);
    }

    GZfRulurControl.prototype.getPixelLeft = function (value) {
        //值范围
        var valueRange = parseFloat(this.params.max - this.params.min);
        //坐标范围
        var rulurRange = parseFloat(this.lineBack.offsetWidth - this.slider[0].offsetWidth);

        if (rulurRange == 0) return 0;      //防止除数为 0

        //返回相对坐标 
        var pixelLeft = GZfRulurControl.FormatFloat((value - this.params.min) * (parseFloat(rulurRange) / valueRange), 2);

        //返回真实坐标
        pixelLeft = GZfRulurControl.px2Int(this.lineBack.style.left) + this.slider[0].offsetWidth / 2 + pixelLeft;

        return pixelLeft;
    }

    GZfRulurControl.prototype.getSliderPixelLeft = function (value) {
        return this.getPixelLeft(value) - this.slider[0].offsetWidth / 2;
    }

    GZfRulurControl.prototype.getPixelValue = function (pixelLeft) {
        //值范围
        var valueRange = parseFloat(this.params.max - this.params.min);
        //坐标范围
        var rulurRange = parseFloat(this.lineBack.offsetWidth - this.slider[0].offsetWidth);

        if (rulurRange == 0) return 0;      //防止除数为 0

        //将传入的相对坐标转换为真实坐标
        pixelLeft = pixelLeft - GZfRulurControl.px2Int(this.lineBack.style.left) - this.slider[0].offsetWidth / 2;

        //返回相对值
        var value = GZfRulurControl.FormatFloat(this.params.min + pixelLeft * (parseFloat(valueRange) / rulurRange), 2);

        return value;
    }

    GZfRulurControl.prototype.getSliderValue = function (pixelLeft) {
        return this.getPixelValue(pixelLeft + this.slider[0].offsetWidth / 2);
    }
}

GZfRulurControl.prototype.show = function (_container) {
    /// <summary>
    ///	显示整个控件
    /// </summary>
    /// <param name="container" type="obj or string">
    /// 需要指定一个控件来包含本控件，
    /// container 可为该控件对像，也可为该控件的ID
    /// </param>

    //创建控件元素
    {
        var params = this.params;
        var container = document.createElement("div");     //1.创建控件最外的框
        var lineBack = document.createElement("div");      //2.创建控件背景条
        var lineFront = document.createElement("div");     //3.创建控件前景条
        var slider = [];                                   //4.保存 slider 尺标
        for (var i = 0; i < params.slidercount; i++)
            slider.push(new this.RulurPoint(params.sliderwidth));
        var info = document.createElement("div");          //5.创建信息标题栏
        var clearDiv = document.createElement("div");
        clearDiv.style.cssText = "clear:both;";
    }

    //设置类属性
    {
        this.container = container;                    //1.设置类属性container
        this.lineBack = lineBack;                      //2.设置类属性lineBack
        this.lineFront = lineFront;                    //3.设置类属性lineFront
        this.slider = slider;                          //4.设置类属性slider
        this.info = info;                              //5.设置类属性info
    }

    //设置一下各元素的一些不需要计算固定值
    {
        container.appendChild(lineBack);               //将背景条加入框中
        container.appendChild(lineFront);              //将前景条加入框中
        for (var i = 0; i < params.slidercount; i++)   //将尺标加入框中
            container.appendChild(slider[i]);
        container.appendChild(info);                   //将信息标题栏加入框中
        container.appendChild(clearDiv);

        container.style.overflow = "hidden";
        container.style.textAlign="left";//蒋哥加的
        lineBack.style.cssText = "position:relative; margin:0 0; border-top:solid 1px #cecece; background-color:#cecece; overflow:hidden";
        lineFront.style.cssText = "position:relative; margin:0 0; border-top:solid 1px #cecece; overflow:hidden";
        for (var i = 0; i < params.slidercount; i++) {
            slider[i].style.position = "relative"
            slider[i].style.margin = "0 0";
        }
        info.style.cssText = "position:absolute; margin:0 0; solid 1px #000000; overflow:hidden";

        container.style.border = params.border;
        lineFront.style.backgroundColor = params.color; //前景色
        info.style.backgroundColor = params.color;      //信息标题栏颜色

        container.style.height = this.params.height + "px"; //设置总体高度
        lineBack.style.height = "2px";                  //背景色高度
        lineFront.style.height = "2px";                 //前景色高度
        info.style.height = "15px";                     //设置标题栏高度

        container.style.width = params.width;           //外框宽度
        lineBack.style.width = (GZfRulurControl.px2Int(params.width) - 6) + "px"; //背景宽度
        lineFront.style.width = lineBack.style.width; //前景宽度等于背景宽度
        info.style.width = "30px";                 //标题栏宽度

        container.style.fontSize = '10px';         //外框字体
        container.style.lineHeight = '12px';       //外框行高
        info.style.textAlign = "center";           //标题栏文字水平居中
        info.style.filter = "alpha(opacity=80)";   //标题栏透明度
        info.style.cssText = info.style.cssText.replace(/;-moz-opacity:.*?;/gi, "") + ";-moz-opacity:" + (80 / 100) + ";";

        //设置各个控件元素的鼠标经过指针形状 begin
        lineBack.onmouseover = function () { this.style.cursor = "pointer"; }
        lineBack.onmouseout = function () { this.style.cursor = "auto"; }

        lineFront.onmouseover = function () { this.style.cursor = "pointer"; }
        lineFront.onmouseout = function () { this.style.cursor = "auto"; }

        for (var i = 0; i < params.slidercount; i++) {
            slider[i].onmouseover = function () { this.style.cursor = "pointer"; }
            slider[i].onmouseout = function () { this.style.cursor = "auto"; }
        }
        //设置各个控件元素的鼠标经过指针形状 end

        this.container.onselectstart = function () { return false; }
    }

    //加载控件到页面上
    {		
        _container = (typeof (_container) == 'string') ? document.getElementById(_container) : _container;
        _container.innerHTML = "";
		
        _container.appendChild(this.container);              //javascript 需加载外框后才能计算其它控件的相对位置

		//alert(_container.innerHTML);
    }

    //控件原始加载顺序为 lineBack,lineFront,slider,info 
    //初始化各元素的 top 属性 
    {
        //背景条原始高度为0,将背景条在container中垂直居中偏上，算法为 (外框高度 - 背景高度)/2 - 10
        this.lineBack.style.top = ((this.container.offsetHeight - this.lineFront.offsetHeight) / 2 - 5) + 'px';
        //前景条top 比背景条的 top - 1
        this.lineFront.style.top = (GZfRulurControl.px2Int(this.lineBack.style.top) - this.lineBack.offsetHeight) + 'px';

        //所有尺标的 top 一致，顺便计算 info.style.top
        var infoTop = 0;
        for (var i = 0; i < this.slider.length; i++) {
            if (i == 0)
                this.slider[i].style.top = (GZfRulurControl.px2Int(this.lineFront.style.top) - this.lineFront.offsetHeight / 2) - (this.slider[i].offsetHeight / 2 - 2) + 'px';
            else
                this.slider[i].style.top = (GZfRulurControl.px2Int(this.slider[i - 1].style.top) - this.slider[i - 1].offsetHeight) + 'px';
        }
    }

    //信息标题栏Top坐标
    {
        this.info.style.top = GZfRulurControl.GetObjPos(this.slider[this.slider.length - 1]).top - this.info.offsetHeight + "px";
        this.info.style.display = "none";
    }
    //初始化各元素的 left 属性
    {
        //将 lineBack 在container里水平居中
        this.lineBack.style.left = (this.container.offsetWidth - this.lineBack.offsetWidth) / 2 + "px";
        //将 lineFront 和 lineBack 左对齐
        this.lineFront.style.left = this.lineBack.style.left;
        //将所有 slider 平均排列
        for (var i = 0; i < this.slider.length; i++) {
            if (i == 0)
                this.slider[i].style.left = this.getSliderPixelLeft(this.params.min);
            else
                this.slider[i].style.left = this.getSliderPixelLeft(((this.params.max - this.params.min) / (this.params.slidercount - 1)) * i + this.params.min);
        }
    }

    if (this.params.showRulur == true) {
		/*
        var rulurRange = parseFloat(this.params.max) - parseFloat(this.params.min);
        var rulurKedu = GZfRulurControl.FormatFloat(rulurRange / this.params.splitcount, 2);   //每刻度代表的增量

        var kedu = [];
        for (var i = 0; i <= this.params.splitcount; i++) {
            kedu[i] = document.createElement("div");
            this.container.appendChild(kedu[i]);
            kedu[i].style.cssText = "margin:0 0; font-size:10px; line-height:12px; height:10px; width:25px; overflow:hidden; position:relative";
            kedu[i].style.height = (this.params.sliderwidth / 2) * 2;

            //调整刻度的Top，使之与lineFront一致
            {
                if (0 == i) {
                    //先将第一个刻度的高度设置为最后一个 slider 的高度
                    kedu[i].style.top = (GZfRulurControl.px2Int(this.slider[this.slider.length - 1].style.top) - this.slider[this.slider.length - 1].offsetHeight - 1) + 'px';
                    //向下微调，使之与 lineFront 一致
                    kedu[i].style.top = GZfRulurControl.px2Int(kedu[i].style.top) + kedu[i].offsetHeight - (this.params.sliderwidth / 2) * 0.5 + 'px';
                }
                else {
                    kedu[i].style.top = (GZfRulurControl.px2Int(kedu[i - 1].style.top) - kedu[i - 1].offsetHeight) + 'px';
                }
                this.slider[0].style.zIndex = 1;
            }

            //调整刻度的Left坐标
            {
                //第一个刻度放在第一个尺标的水平中间位置
                kedu[i].style.left = this.getPixelLeft(rulurKedu * i + this.params.min) + "px";

                if (i !== this.params.splitcount) {
                    kedu[i].style.borderLeft = "solid 1px #bfbfbf";
                    kedu[i].style.textAlign = "left";
                }
                else {
                    //最后一个刻度放在最后一个尺标的水平中间位置，并显示右边线
                    kedu[i].style.left = GZfRulurControl.px2Int(kedu[i].style.left) - kedu[i].offsetWidth + 'px';
                    kedu[i].style.borderRight = "solid 1px #bfbfbf";
                    kedu[i].style.textAlign = "right";
                }
            }

            if (this.params.showRulurKeDu) {
                //kedu[i].innerHTML = parseInt(i * rulurKedu);
                if (i !== this.params.splitcount) {
                    kedu[i].innerHTML = this.getStepValue(this.getPixelValue(GZfRulurControl.px2Int(kedu[i].style.left)));
                } else {
                    kedu[i].innerHTML = this.getStepValue(this.getPixelValue(GZfRulurControl.px2Int(kedu[i].style.left) + kedu[i].offsetWidth));
                }
            }
        }
		*/
    }

    var my = this;
    for (var i = 0; i < this.slider.length; i++) {
        this.slider[i].idx = i;

        this.slider[i].onmousedown = function (event) {
            //设置当前 slider 的左边界和右边界
            if (1 == my.slider.length) {
                this.minLeft = my.getSliderPixelLeft(my.params.min);
                this.maxLeft = my.getSliderPixelLeft(my.params.max);
                this.checkPile = '';
            }
            else {
                if (0 == this.idx) {
                    this.minLeft = my.getSliderPixelLeft(my.params.min);
                    this.maxLeft = GZfRulurControl.px2Int(my.slider[this.idx + 1].style.left);
                    if (GZfRulurControl.px2Int(this.style.left) == this.maxLeft) {
                        this.checkPile = 'right';
                    }
                    else {
                        this.checkPile = '';
                    }
                }
                else if (my.slider.length - 1 == this.idx) {
                    this.minLeft = GZfRulurControl.px2Int(my.slider[this.idx - 1].style.left);
                    this.maxLeft = my.getSliderPixelLeft(my.params.max);
                    if (GZfRulurControl.px2Int(this.style.left) == this.minLeft) {
                        this.checkPile = "left";
                    }
                    else {
                        this.checkPile = '';
                    }
                }
                else {
                    this.minLeft = GZfRulurControl.px2Int(my.slider[this.idx - 1].style.left);
                    this.maxLeft = GZfRulurControl.px2Int(my.slider[this.idx + 1].style.left);
                    if (GZfRulurControl.px2Int(this.style.left) == this.maxLeft) {
                        this.checkPile = 'right';
                    }
                    else if (GZfRulurControl.px2Int(this.style.left) == this.maxLeft) {
                        this.checkPile = "left";
                    }
                    else {
                        this.checkPile = '';
                    }
                }
            }
            my.drag(this);
        }
    }
}

GZfRulurControl.prototype.drag = function (slider) {
    var funBak1 = document.body.onmousemove;        //备份 document.body.onmousemove
    var funBak2 = document.body.onmouseup;          //备份 document.body.onmouseup
    var my = this;

    slider.onmouseup = function () {
        document.body.onmouseup();
    }

    //重新定义 document.body.onmouseup 
    //鼠标在slider上按下后，在整个页面的任意一个位置弹起时
    document.body.onmouseup = function () {
		
        document.body.onmousemove = null;           //取消 document.body.onmousemove 响应 
        document.body.onmouseup = null;             //取消 document.body.onmouseup 响应
        document.body.onmousemove = funBak1;        //恢复 document.body.onmousemove
        document.body.onmouseup = funBak2;          //恢复 document.body.onmouseup
        my.info.style.display = 'none';           //隐藏信息窗口
        my.changed();                             //激发 changed 事件
    }

    //重新定义 document.body.onmousemove
    //鼠标在slider上按下后，在整个面页任意位置移动时
    document.body.onmousemove = function (event) {
		
        event = event || window.event;              //获取 event 事件

        //获取鼠标的 offsetLeft 坐标
        var newLeft = (event.clientX + (document.body.scrollLeft || document.documentElement.scrollLeft) - my.slider[0].offsetWidth / 2) - document.body.scrollLeft;
        //将offsetLeft 转化为 style.left
        newLeft = my.offsetLeft2StyleLeft(newLeft);

        //处理slider叠加的情况
        if (slider.checkPile == 'left' && newLeft < GZfRulurControl.px2Int(slider.style.left)) {
            //            var curValue = my.getSliderValue(GZfRulurControl.px2Int(slider.style.left));
            //            var newValue = curValue - my.params.RulurStep;
            //            my.slider[slider.idx - 1].style.left = my.getSliderPixelLeft(newValue);
            slider.onmouseup();
            my.slider[slider.idx - 1].onmousedown();

            slider.checkPile = '';
            my.slider[slider.idx - 1].checkPile = '';
            return;
        } else if (slider.checkPile == 'right' && newLeft > GZfRulurControl.px2Int(slider.style.left)) {
            slider.onmouseup();
            my.slider[slider.idx + 1].onmousedown();

            slider.checkPile = '';
            my.slider[slider.idx + 1].checkPile = '';
            return;
        }

        my.moveSlider(slider, newLeft);
    };
}

GZfRulurControl.prototype.moveSlider = function (_slider, newLeft) {
    /// <summary>
    ///	移动尺标位置（prototype对象方法，必须实例对象后使用）
    /// </summary>
    newLeft = (newLeft < _slider.minLeft) ? _slider.minLeft : newLeft;
    newLeft = (newLeft > _slider.maxLeft) ? _slider.maxLeft : newLeft;

    //    newLeft = this.getSliderPixelLeft(this.getStepValue(this.getSliderValue(newLeft)));

    _slider.style.left = newLeft + "px";

    //设置色带
    {
        this.lineFront.style.left = this.slider[0].style.left;
        if (this.slider.length > 1) {
            this.lineFront.style.width = (GZfRulurControl.px2Int(this.slider[this.slider.length - 1].style.left)
                                                - GZfRulurControl.px2Int(this.slider[0].style.left)
                                                + this.slider[0].offsetWidth
                                                ) + 'px';
        } else {
            this.lineFront.style.width = this.lineBack.offsetWidth - GZfRulurControl.px2Int(this.slider[0].style.left) + 2;
        }
    }

    if (this.params.showInfo) {
        var value = this.getStepValue(this.getSliderValue(GZfRulurControl.px2Int(_slider.style.left)));
        this.info.innerHTML = this.getStepValue(value);
        this.info.style.cssText = this.info.style.cssText.replace(/display:.*?;/gi, "");
        this.info.style.width = this.info.scrollWidth + "px";
        this.info.style.left = (_slider.offsetLeft - (this.info.offsetWidth - _slider.offsetWidth) / 2) + "px";
    }

    this.changing();
}

GZfRulurControl.prototype.offsetLeft2StyleLeft = function (offsetLeft) {
    /// <summary>
    ///	将 offsetLeft 转换为 style.left
    /// </summary>
    var minOffsetLeft = (this.lineBack.offsetLeft + this.slider[0].offsetWidth / 2);
    var minPixel = GZfRulurControl.px2Int(this.lineBack.style.left) + this.slider[0].offsetWidth / 2;

    return (minPixel - minOffsetLeft) + offsetLeft;
}

GZfRulurControl.prototype.remove = function () {
    for (var c in this.container.ChildNodes) {
        this.container.removeChild(c);
    }

    this.container.parentNode.removeChild(this.container);
}



//获取设置控件值
{
	
	
    GZfRulurControl.prototype.setValue = function (value) {
        /// <summary>
        ///	设置控件值
        /// </summary>
        /// <param name="style" type="style">
        /// value 为一个数组，长度必须和 slidercount 一致，并从左到右，从小到大 eg:
        /// value = [0,50,100]
        /// </param>
        if (this.slider.length !== value.length) {
            alert("参数错误，value.length <> slidercount");
            return;
        }

        if (value[0] < this.params.min) {
            alert('最小值超出范围'); return;
        }
        if (value[value.length - 1] < this.params.min) {
            alert('最大值超出范围'); return;
        }

        for (var i = 0; i < this.slider.length; i++) {
            this.moveSlider(this.slider[i], this.getSliderPixelLeft(value[i]));
        }
    }

    GZfRulurControl.prototype.getValue = function () {
        /// <summary>
        ///	获取控件值
        /// </summary>
        /// <param name="style" type="style">
        /// value 为一个数组，长度和 slidercount 一致，并从左到右，从小到大 eg:
        /// value = [0,50,100]
        /// </param>
        var value = [];
		
		if(this.slider==null ){
			value.push(this.params.baseBouns);
			return value;
		}
	
        for (var i = 0; i < this.slider.length; i++) {
            var val = this.getStepValue(this.getSliderValue(GZfRulurControl.px2Int(this.slider[i].style.left)));
            if (parseFloat(val) < this.params.min) val = this.params.min;
            if (parseFloat(val) > this.params.max) val = this.params.max;
            
            value.push(val);
        }
        if(this.isSuoding){
        	value.pop();
        	value.push(this.params.baseBouns);
        }
        return value;
    }

    GZfRulurControl.prototype.setParams = function (_params) {
        //如果设置了相应属性，则取设置值，否则取默认值
        if (!this.params)
            this.params = { min: 0, max: 100, splitcount: 4, slidercount: 2, sliderwidth: 12, sliderbgcolor: "#fff", sliderbordercolor: "#ccc", width: "150px", border: "none", color: "#00ce00", showInfo: true, showRulur: true, showRulurKeDu: true, RulurStep: 1 ,baseBouns:1800};

        if (!_params) _params = this.params;
        this.params.min = (_params.min !== undefined) ? _params.min : this.params.min;
        this.params.max = (_params.max !== undefined) ? _params.max : this.params.max;
        this.params.splitcount = (_params.splitcount !== undefined) ? _params.splitcount : this.params.splitcount;
        this.params.slidercount = (_params.slidercount !== undefined) ? _params.slidercount : this.params.slidercount;
        this.params.sliderwidth = (_params.sliderwidth !== undefined) ? _params.sliderwidth : this.params.sliderwidth;
        this.params.width = (_params.width !== undefined) ? _params.width : this.params.width;
        this.params.border = (_params.border !== undefined) ? _params.border : this.params.border;
        this.params.color = (_params.color !== undefined) ? _params.color : this.params.color;
        this.params.showInfo = (_params.showInfo !== undefined) ? _params.showInfo : this.params.showInfo;
        this.params.showRulur = (_params.showRulur !== undefined) ? _params.showRulur : this.params.showRulur;
        this.params.showRulurKeDu = (_params.showRulurKeDu !== undefined) ? _params.showRulurKeDu : this.params.showRulurKeDu;
        this.params.RulurStep = (_params.RulurStep !== undefined) ? _params.RulurStep : this.params.RulurStep;
        this.params.sliderbgcolor = (_params.sliderbgcolor !== undefined) ? _params.sliderbgcolor : this.params.sliderbgcolor;
        this.params.sliderbordercolor = (_params.sliderbordercolor !== undefined) ? _params.sliderbordercolor : this.params.sliderbordercolor;
        this.params.height = (this.params.sliderwidth / 2) * 5;
		this.params.baseBouns = (_params.baseBouns !== undefined) ? _params.baseBouns : this.params.baseBouns;
        //this.params
        if (this.container && this.container.parentNode) {
            var container = this.container.parentNode;

            this.remove();
            this.show(container);
        }
    }
}


