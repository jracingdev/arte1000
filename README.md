# ARTE1000 — Tema WordPress

Tema comercial para a **ARTE1000 Móveis Artesanais**: móveis e objetos em fibra natural feitos à mão na Serra Fluminense (loja em Itaipava, Petrópolis/RJ).

## Identidade visual

| Token | Cor | Uso |
|---|---|---|
| Creme | `#F6F1E7` | Fundo principal |
| Linho | `#EAE0CC` | Seções alternadas |
| Fibra | `#C9A46A` / `#9A7338` | Destaques, textura de trama |
| Serra | `#2E3A2B` / `#1F281D` | Faixas, rodapé, botões secundários |
| Terracota | `#B5623A` | Chamadas para ação (comprar, orçamento) |
| Carvão | `#1E1A15` | Texto |

Tipografia: **Fraunces** (títulos, serifada com personalidade artesanal) + **Manrope** (textos e interface).

Assinaturas visuais: imagens em formato de **arco** (remetendo ao encosto de uma poltrona de vime), textura de **trama** em SVG usada enquanto não há fotos, selo giratório "peça única · feita à mão" e faixa rolante com os valores da marca.

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
- **Home — Números**: 4 destaques (ex.: +20 mil seguidores).
- **Rodapé**: texto da marca, mapa e botão flutuante de WhatsApp.

Logo: **Personalizar → Identidade do site → Logo**. Sem logo, o tema exibe a marca tipográfica **ARTE*1000***.

Menus: **Aparência → Menus** — locais "Menu principal" e "Menu do rodapé".

## WooCommerce

- Categorias de produto com imagem aparecem automaticamente na home (até 6, as com mais produtos).
- Produtos marcados como **destaque** (estrela) aparecem na vitrine da home; sem destaques, entram os mais recentes.
- Página do produto com botão **"Comprar ou personalizar pelo WhatsApp"** (mensagem já inclui nome e link do produto) e selos de confiança.
- Selo "Feito à mão" nas miniaturas, contador do carrinho com atualização via AJAX.

## Fotos recomendadas

- Hero principal: vertical, mín. 1200×1500 px.
- Hero detalhe: quadrada, mín. 600×600 px (close da trama).
- Categorias: 800×1000 px.
- Produtos: 1000×1250 px (proporção 4:5), fundo claro/neutro.
