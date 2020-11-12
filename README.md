<h1>Code Monkeys Test</h1>

<h3>How to run application</h3>
<span>php main.php _args[]_</span>

<h3>Example</h3>
<h5>With one journey argument</h5>
<h6>JSON must be surrounded by double quotes, with escaped double quotes inside the JSON</h6>
<span>php main.php "[{\\"from\\": \\"Adolfo Suárez Madrid–Barajas Airport, Spain\\",\\"to\\": \\"London Heathrow, UK\\"},{\\"from\\": \\"Fazenda São Francisco Citros, Brazil\\",\\"to\\": \\"São Paulo–Guarulhos International Airport, Brazil\\"},{\\"from\\": \\"London Heathrow, UK\\",\\"to\\": \\"Loft Digital, London, UK\\"},{\\"from\\": \\"Porto International Airport, Portugal\\",\\"to\\": \\"Adolfo Suárez Madrid–Barajas Airport, Spain\\"},{\\"from\\": \\"São Paulo–Guarulhos International Airport, Brazil\\",\\"to\\":\\"Porto International Airport, Portugal\\"}]"</span>

<h5>With multiple journey arguments</h5>
<h6>Just add a space between arguments</h6>
<span>php main.php "[{\\"from\\": \\"Adolfo Suárez Madrid–Barajas Airport, Spain\\",\\"to\\": \\"London Heathrow, UK\\"},{\\"from\\": \\"Fazenda São Francisco Citros, Brazil\\",\\"to\\": \\"São Paulo–Guarulhos International Airport, Brazil\\"},{\\"from\\": \\"London Heathrow, UK\\",\\"to\\": \\"Loft Digital, London, UK\\"},{\\"from\\": \\"Porto International Airport, Portugal\\",\\"to\\": \\"Adolfo Suárez Madrid–Barajas Airport, Spain\\"},{\\"from\\": \\"São Paulo–Guarulhos International Airport, Brazil\\",\\"to\\":\\"Porto International Airport, Portugal\\"}]" "[{\\"from\\": \\"Adolfo Suárez Madrid–Barajas Airport, Spain\\",\\"to\\": \\"London Heathrow, UK\\"},{\\"from\\": \\"Fazenda São Francisco Citros, Brazil\\",\\"to\\": \\"São Paulo–Guarulhos International Airport, Brazil\\"},{\\"from\\": \\"London Heathrow, UK\\",\\"to\\": \\"Loft Digital, London, UK\\"},{\\"from\\": \\"Porto International Airport, Portugal\\",\\"to\\": \\"Adolfo Suárez Madrid–Barajas Airport, Spain\\"},{\\"from\\": \\"São Paulo–Guarulhos International Airport, Brazil\\",\\"to\\":\\"Porto International Airport, Portugal\\"}]"</span>

<h3>How to run tests</h3>
<span>.\vendor\bin\phpunit</span>