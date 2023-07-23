# WP Depoiments

Plugin para inserção botão flutuante do whatsapp.

### Como funciona?

1. Instale o tema
2. Insira o shortcode ``[botao-zap]`` em nas páginas que deseja incluir o botão. Caso queira inserir em todas as páginas, inclua no ``header.php`` ou ``footer.php`` usando a função ``do_shortcode('depoimentos')``

### Como configurar?

Use os parametros ``number`` para informar o número do whatsapp que será chamado.
Use os parametros ``align`` que pode receber o valor *right* ou *left*, para determinar o alinhamento do botão.

**Importante**
Sempre ao informar um número, insira no inicio o DDI do número desejado (55 - Brasil), como no exemplo abaixo:

``[botao-zap number="55000000000" align="left" ]``
