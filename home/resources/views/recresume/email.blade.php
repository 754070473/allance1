<html>
<meta charset="utf-8">
    <body>
        <center>
            <h3>{{$subject}}</h3>
        <p>{{$name}}，您好！您的简历已通过我们的筛选，很高兴通知您参加我们的面试。</p>
            <br/>
            <table>
                <tr>
                    <td>面试时间：</td>
                    <td>{{$date}}</td>
                </tr>
                <tr>
                    <td>面试地点：</td>
                    <td>{{$place}}</td>
                </tr>
                <tr>
                    <td>联系人：</td>
                    <td>{{$man}}</td>
                </tr>
                <tr>
                    <td>联系电话：</td>
                    <td>{{$phone}}</td>
                </tr>
                <tr>
                    <td>补充内容：</td>
                    <td>{{$content}}</td>
                </tr>
            </table>
        </center>
        <a href="http://localhost/php_9/allance1/home/public/"><img src="{{$message->embed($imgPath)}}" alt=""/></a>
        <span style="color: #00694e;font-size: small">强强联合招聘网站www.rbc.com</span>
    </body>
</html>