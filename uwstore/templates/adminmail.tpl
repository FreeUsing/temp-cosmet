<h2>Новый заказ №{{order_num}} с сайта {{site_url}}</h2>
<small style="color:#666666">Дата заказа: {{order_date}}</small><br><br>
<table width="100%" cellpadding="3" cellspacing="0">
	{{order_list}}
	<tr>
		<td colspan="3" style="padding:10px 0px">&nbsp;</td>
		<td style="padding:10px 0px"><b>{{order_total}}</b></td>
	</tr>
</table>
<h3 style="margin-top:15px;">Контакты клиента</h3>
<table cellpadding="3" cellspacing="2">
	<tr>
		<td width="30%">Имя клиента</td>
		<td width="70%"><b>{{order_person}}</b></td>
	</tr>
	<tr>
		<td width="30%">Номер телефона</td>
		<td width="70%"><b>{{order_phone}}</b></td>
	</tr>
	<tr>
		<td width="30%">Электронная почта</td>
		<td width="70%"><b>{{order_mail}}</b></td>
	</tr>
	<tr>
		<td colspan="2"><b>Комментарий к заказу</b></td>
	</tr>
	<tr>
		<td colspan="2">{{order_comment}}</td>
	</tr>
</table>
<small style="color:#666666">Отправлено со страницы: <a href="{{order_url}}">{{order_url}}</a></small>