<?php
// (A) HTML HEADER & STYLES
$this->data = "<!DOCTYPE html><html><head><style>".
"html,body{font-family:sans-serif}#invoice{max-width:800px;margin:0 auto}#billship,#company{margin-bottom:30px}#company img{max-width:180px;height:auto}#co-left{padding:10px;font-size:.95em;color:#888}#co-right{vertical-align:top}#co-right div{float:right;text-align:center;font-size:28px;padding:10px;color:#fff;width:240px;background:#264d00}#items td,#items th{font-weight:400;border-bottom:3px solid #fff}#billship td,#items td,#items th,#notes{padding:10px}.pink{color:#47d147}#billship,#company,#items{width:100%;border-collapse:collapse}#billship td{width:33%}#items th{color:#fff;background:#264d00;text-align:left}#items td{background:#d9ffb3}.idesc{color:#47d147}.ttl{color:#47d147}.right{text-align:right}#notes{background:#fbe3ef;margin-top:30px}.float{
	position:fixed;
	width:40px;
	height:40px;
	padding:8px;
	top:40px;
	right:40px;
	background-color:black;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
}".
"</style></head><body><div id='invoice'>";

// (B) COMPANY
$this->data .= "<table id='company'><tr><td><img src='".$this->company[0]."'/><div id='co-left'>";
for ($i=2;$i<count($this->company);$i++) {
	$this->data .= $this->company[$i]."<br>";
}
$this->data .= "</div></td><td id='co-right'><div>FUEL DISBURSEMENT</div></td></tr></table>";

// (C) BILL TO
$this->data .= "<table id='billship'><tr><td><strong class='pink'>DISBUBRSED TO</strong><br>";
foreach ($this->billto as $b) { $this->data .= $b."<br>"; }

// (D) SHIP TO
$this->data .= "</td><td><strong class='pink'></strong><br>";
foreach ($this->shipto as $s) { $this->data .= $s."<br>"; }

// (E) INVOICE INFO
$this->data .= "</td><td>";
foreach ($this->head as $i) {
	$this->data .= "<strong class='pink'>$i[0]:</strong> $i[1]<br>";
}
$this->data .= "</td></tr></table>";

// (F) ITEMS
$this->data .= "<table id='items'><tr><th>VEHICLE</th><th>LITRES</th><th>UNIT PRICE</th><th>AMOUNT</th></tr>";
foreach ($this->items as $i) {
	$this->data .= "<tr><td><div>".$i[0]."</div>".($i[1]==""?"":"<small class='idesc'>$i[1]</small>")."</td><td>".$i[2]."</td><td>".$i[3]."</td><td>".$i[4]."</td></tr>";
}

// (G) TOTALS
if (count($this->totals)>0) { foreach ($this->totals as $t) {
	$this->data .= "<tr class='ttl'><td class='right' colspan='3'>$t[0]</td><td>$t[1]</td></tr>";
}}
$this->data .= "</table>";

// (H) NOTES
if (count($this->notes)>0) {
	$this->data .= "<div id='notes'>";
	foreach ($this->notes as $n) {
		$this->data .= $n."<br>";
	}
	$this->data .= "</div>";
}

// (I) CLOSE
$this->data .= "</div><img src='../../../logos/print.png' onClick='window.print()' class='float'/></body></html>";