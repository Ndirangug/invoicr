<?php
// (A) HTML HEADER & STYLES
$this->data = "<!DOCTYPE html><html><head><style>".
"html,body{font-family:sans-serif}#invoice{max-width:800px;margin:0 auto}#bigi{margin-bottom:20px;font-size:28px;font-weight:bold;color:#ad132f;padding:10px}#company,#billship{margin-bottom:30px}#company img{max-width:180px;height:auto}#billship,#company,#items{width:100%;border-collapse:collapse}#billship td{width:33%}#billship td,#items td,#items th{padding:10px}#items th{text-align:left;border-top:2px solid #000;border-bottom:2px solid #000}#items td{border-bottom:1px solid #ccc}.idesc{color:#999}.ttl{background:#fafafa;font-weight:700}.right{text-align:right}#notes{background:#efefef;padding:10px;margin-top:30px}.float{
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
$this->data .= "<table id='company'><tr><td><img src='".$this->company[0]."'/></td><td class='right'>";
for ($i=2;$i<count($this->company);$i++) {
	$this->data .= "<div>".$this->company[$i]."</div>";
}
$this->data .= "</td></tr></table>";
$this->data .= "<div id='bigi'>SALES INVOICE</div>";

// (C) BILL TO
$this->data .= "<table id='billship'><tr><td><strong>BILL TO</strong><br>";
foreach ($this->billto as $b) { $this->data .= $b."<br>"; }

// (D) SHIP TO
$this->data .= "</td><td><strong>SHIP TO</strong><br>";
foreach ($this->shipto as $s) { $this->data .= $s."<br>"; }

// (E) INVOICE INFO
$this->data .= "</td><td>";
foreach ($this->head as $i) {
	$this->data .= "<strong>$i[0]:</strong> $i[1]<br>";
}
$this->data .= "</td></tr></table>";

// (F) ITEMS
$this->data .= "<table id='items'><tr><th>Item</th><th>Quantity</th><th>Unit Price</th><th>Amount</th></tr>";
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