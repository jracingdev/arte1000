# ARTE1000 — Tema WordPress

Tema comercial para a **ARTE1000 Móveis Artesanais**: cestarias, móveis, luminárias e objetos em **junco natural** feitos à mão na Serra Fluminense, com preço de fábrica e loja física em Itaipava, Petrópolis/RJ. Assinatura da marca: **ARTE 1000**.

## Desenvolvimento

Tema desenvolvido por **J RACING DEVELOPMENT** — CNPJ 20.274.800/0001-08 — contato (21) 98233-6975.
O crédito no rodapé pode ser ocultado em *Personalizar → ARTE1000 → Rodapé*.

## Identidade visual

| Token | Cor | Uso |
|---|---|---|
| Creme | `#F6F1E7` | Fundo principal |
| Linho | `#EAE0CC` | Seções alternadas |
| Junco | `#C9A46A` / `#9A7338` | Destaques, textura de trama |
| Serra | `#2E3A2B` / `#1F281D` | Faixas, rodapé, botões secundários |
| Terracota | `#B5623A` | Chamadas para ação (comprar, orçamento) |
| Carvão | `#1E1A15` | Texto |

Tipografia: **Fraunces** (títulos, serifada com personalidade artesanal) + **Manrope** (textos e interface).

Assinaturas visuais: imagens em formato de **arco** (remetendo ao encosto de uma poltrona de junco), **borda ondulada** entre seções (inspirada no acabamento recortado das mesas e cestarias), textura de **trama** em SVG usada enquanto não há fotos, selo giratório "peça única · feita à mão" e faixa rolante com os valores da marca.

## Instalação

1. Compacte a pasta `arte1000` em `.zip` (ou baixe o zip do GitHub e renomeie a pasta para `arte1000`).
2. WordPress → **Aparência → Temas → Adicionar novo → Enviar tema**.
3. Ative o tema e instale o **WooCommerce**.
4. Em **Configurações → Leitura**, defina uma página estática como página inicial (a home usa `front-page.php` automaticamente).

## Configuração (Aparência → Personalizar → ARTE1000 — Opções do tema)

- **Contato e WhatsApp**: número (padrão `5521981683570`), mensagem inicial, Instagram, endereço, horário, e-mail e barra superior.
- **Home — Destaque principal**: textos, botões e duas imagens (vertical + detalhe circular).
- **Home — Nossa essência**: texto institucional e imagem.
- **Home — Sob medida**: chamada para orçamento personalizado.
- **Home — Números**: 4 destaques (ex.: +19 mil seguidores, preço de fábrica).
- **Home — Entrega**: Correios, transportadora e retirada na loja (textos editáveis).
- **Rodapé**: texto da marca, mapa e botão flutuante de WhatsApp.

## Logo e marca (Personalizar → Identidade do site)

- **Logo**: envie em PNG transparente ou SVG (ideal: mín. 600 px de largura).
- **Exibição da marca no cabeçalho**:
  - *Automático* (padrão): mostra a logo, se enviada; sem logo, mostra a marca em texto **ARTE*1000***.
  - *Logo + texto*: logo e nome lado a lado (no celular, só a logo, para caber).
  - *Somente texto*: ignora a logo e mostra o nome.
- **Frase abaixo do nome**: padrão "Móveis Artesanais".
- **Altura da logo**: 24 a 140 px (no celular é limitada a 42 px).
- **Logo para o rodapé (versão clara)**: opcional; o rodapé é verde-escuro. Sem ela, o rodapé mostra a marca em texto.

Menus: **Aparência → Menus** — locais "Menu principal" e "Menu do rodapé".

## WooCommerce

- Categorias de produto com imagem aparecem automaticamente na home (até 6, as com mais produtos).
- Produtos marcados como **destaque** (estrela) aparecem na vitrine da home; sem destaques, entram os mais recentes.
- Página do produto com botão **"Comprar ou personalizar pelo WhatsApp"** (mensagem já inclui nome e link do produto) e selos de confiança.
- Selo "Feito à mão" nas miniaturas, contador do carrinho com atualização via AJAX.

## Frete (configurar no WooCommerce)

O tema exibe as formas de entrega; o cálculo do frete é feito pelo WooCommerce:

1. **WooCommerce → Configurações → Entrega**: crie a zona "Brasil".
2. **Retirada na loja**: adicione o método nativo *Retirada no local* (custo zero), com o endereço de Itaipava.
3. **Correios + transportadoras**: instale o plugin **Melhor Envio** (Correios, Jadlog, Loggi etc.) ou o **Correios para WooCommerce**. Cadastre peso e dimensões em todos os produtos — cestarias volumosas pesam pouco mas ocupam muito espaço, então as dimensões são essenciais para a cotação.
4. Para móveis grandes, uma alternativa é a classe de entrega "Sob consulta", direcionando o cliente ao botão de WhatsApp.

## Fotos recomendadas

- Hero principal: vertical, mín. 1200×1500 px.
- Hero detalhe: quadrada, mín. 600×600 px (close da trama).
- Categorias: 800×1000 px.
- Produtos: 1000×1250 px (proporção 4:5), fundo claro/neutro.
