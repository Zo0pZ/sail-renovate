# Plan 002: Replace hardcoded homepage portfolio cards with project CPT query

> **Executor instructions**: Follow this plan step by step. Run every
> verification command and confirm the expected result before moving to the
> next step. If anything in the "STOP conditions" section occurs, stop and
> report — do not improvise. When done, update the status row for this plan
> in `plans/README.md`.
>
> **Drift check (run first)**: confirm the excerpt in "Current state" matches
> the live file before making any changes. If it doesn't match, STOP.

## Status

- **Priority**: P2
- **Effort**: M
- **Risk**: LOW
- **Depends on**: none (can run independently or after 001)
- **Category**: tech-debt
- **Planned at**: commit `894eabc`, 2026-06-30

## Why this matters

The homepage portfolio section (`<div class="portfolio-grid">`) contains 5
hardcoded `<a class="proj-card">` elements. Only the first links to a real
project page (`/projects/period-property-transformation/`). The remaining 4
all link to `/projects/` (the index) with invented placeholder titles
("Luxury Bathroom Suite", "Fire Damage Restoration", etc.) that have no
corresponding CPT entry.

A `project` CPT is already registered and used on `page-projects.php`. Querying
it on the homepage means real projects added in WP Admin appear automatically,
and placeholder content can no longer embarrass the business on a live site.

## Current state

**File**: `wp-theme/sail-renovate/front-page.php`

The `project` CPT is registered in `functions.php:214–233`. The `project_type`
and `project_location` custom fields are plain post meta (not ACF) — readable
via `get_post_meta( get_the_ID(), 'project_type', true )`. The `page-projects.php`
template (lines 41–82) is the structural exemplar for the loop.

The section to replace is `<div class="portfolio-grid">`. Current code
(front-page.php, approximately lines 209–250):

```php
  <div class="portfolio-grid">
    <a href="<?php echo esc_url( home_url( '/projects/period-property-transformation/' ) ); ?>" class="proj-card fade-in">
      <img src="<?php echo $img; ?>1-front.jpg" alt="<?php esc_attr_e( 'Full renovation, Bristol', 'sail-renovate' ); ?>" />
      <div class="proj-card__overlay"></div>
      <div class="proj-card__info">
        <p class="proj-card__type"><?php esc_html_e( 'Full Renovation · Clifton', 'sail-renovate' ); ?></p>
        <p class="proj-card__title"><?php esc_html_e( 'Period Property Transformation', 'sail-renovate' ); ?></p>
      </div>
    </a>
    <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="proj-card fade-in fade-in-delay-1">
      <img src="<?php echo $img; ?>11-bathroom.jpg" alt="<?php esc_attr_e( 'Bathroom renovation Bristol', 'sail-renovate' ); ?>" />
      <div class="proj-card__overlay"></div>
      <div class="proj-card__info">
        <p class="proj-card__type"><?php esc_html_e( 'Bathroom · Redland', 'sail-renovate' ); ?></p>
        <p class="proj-card__title"><?php esc_html_e( 'Luxury Bathroom Suite', 'sail-renovate' ); ?></p>
      </div>
    </a>
    <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="proj-card fade-in fade-in-delay-2">
      <img src="<?php echo $img; ?>4-diner.jpg" alt="<?php esc_attr_e( 'Kitchen-diner extension Bristol', 'sail-renovate' ); ?>" />
      <div class="proj-card__overlay"></div>
      <div class="proj-card__info">
        <p class="proj-card__type"><?php esc_html_e( 'Extension · Westbury Park', 'sail-renovate' ); ?></p>
        <p class="proj-card__title"><?php esc_html_e( 'Kitchen-Diner Extension', 'sail-renovate' ); ?></p>
      </div>
    </a>
    <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="proj-card fade-in">
      <img src="<?php echo $img; ?>15-garden.jpg" alt="<?php esc_attr_e( 'Eco garden and outdoor upgrade', 'sail-renovate' ); ?>" />
      <div class="proj-card__overlay"></div>
      <div class="proj-card__info">
        <p class="proj-card__type"><?php esc_html_e( 'Eco Upgrade · Bishopston', 'sail-renovate' ); ?></p>
        <p class="proj-card__title"><?php esc_html_e( 'Solar & Smart Heating', 'sail-renovate' ); ?></p>
      </div>
    </a>
    <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="proj-card fade-in fade-in-delay-1">
      <img src="<?php echo $img; ?>16-hallway.jpg" alt="<?php esc_attr_e( 'Insurance restoration project', 'sail-renovate' ); ?>" />
      <div class="proj-card__overlay"></div>
      <div class="proj-card__info">
        <p class="proj-card__type"><?php esc_html_e( 'Insurance Repair · Horfield', 'sail-renovate' ); ?></p>
        <p class="proj-card__title"><?php esc_html_e( 'Fire Damage Restoration', 'sail-renovate' ); ?></p>
      </div>
    </a>
  </div>
```

**Repo conventions**:
- All output escaped: `esc_html()`, `esc_url()`, `esc_attr()`, `wp_kses_post()`
- `wp_reset_postdata()` after every custom `WP_Query` — see `page-projects.php:81`
- Fade-in delays cycle: `''`, `' fade-in-delay-1'`, `' fade-in-delay-2'`,
  then back to `''` — match the pattern from `page-projects.php:47`
- `$img` is set earlier in the file: `$img = esc_url( get_template_directory_uri() . '/images/' );`
- `$disp_type` in `page-projects.php:55` shows how to combine `project_type`
  and `project_location` with `&middot;`: use `wp_kses_post()` on the result
  since `&middot;` is an HTML entity

## Commands you will need

| Purpose | Command | Expected on success |
|---------|---------|---------------------|
| PHP syntax check | `php -l wp-theme/sail-renovate/front-page.php` | `No syntax errors detected` |
| Verify placeholder links gone | `grep -c "home_url.*projects.*class=\"proj-card" wp-theme/sail-renovate/front-page.php` | `0` |
| Verify CPT query present | `grep -n "post_type.*project" wp-theme/sail-renovate/front-page.php` | at least 1 match |

## Scope

**In scope** (the only file you should modify):
- `wp-theme/sail-renovate/front-page.php`

**Out of scope** (do NOT touch):
- `functions.php` — CPT registration is already correct
- `page-projects.php` — the full project index; do not modify
- `css/pages/front-page.css` — `.proj-card` styles are already correct
- Any other file

## Git workflow

- Branch: `advisor/002-dynamic-portfolio` (or continue on the branch from 001
  if that work is being done in the same session)
- Commit: `feat: query project CPT for homepage portfolio section`
- Do NOT push or open a PR.

## Steps

### Step 1: Verify current state matches the plan

Confirm the `<div class="portfolio-grid">` block contains exactly 5 hardcoded
`<a class="proj-card">` elements as shown in "Current state" above.

**Verify**: `grep -c "class=\"proj-card fade-in" wp-theme/sail-renovate/front-page.php` → `5`

### Step 2: Replace the portfolio-grid block with a CPT query

Replace the entire `<div class="portfolio-grid">...</div>` block with:

```php
  <div class="portfolio-grid">
    <?php
    $port_q = new WP_Query( [
      'post_type'      => 'project',
      'posts_per_page' => 5,
      'orderby'        => 'menu_order',
      'order'          => 'ASC',
    ] );
    $port_delays = [ '', ' fade-in-delay-1', ' fade-in-delay-2', '', ' fade-in-delay-1' ];
    $pi2 = 0;
    if ( $port_q->have_posts() ) :
      while ( $port_q->have_posts() ) : $port_q->the_post();
        $p_thumb  = get_the_post_thumbnail_url( null, 'large' );
        $p_type   = get_post_meta( get_the_ID(), 'project_type', true );
        $p_loc    = get_post_meta( get_the_ID(), 'project_location', true );
        $p_disp   = trim( implode( ' &middot; ', array_filter( [ $p_type, $p_loc ] ) ) );
        $p_delay  = $port_delays[ $pi2 % 5 ];
    ?>
    <a href="<?php the_permalink(); ?>" class="proj-card fade-in<?php echo esc_attr( $p_delay ); ?>">
      <img src="<?php echo $p_thumb ? esc_url( $p_thumb ) : esc_url( $img ) . '1-front.jpg'; ?>"
           alt="<?php echo esc_attr( get_the_title() ); ?>" />
      <div class="proj-card__overlay"></div>
      <div class="proj-card__info">
        <?php if ( $p_disp ) : ?>
        <p class="proj-card__type"><?php echo wp_kses_post( $p_disp ); ?></p>
        <?php endif; ?>
        <p class="proj-card__title"><?php echo esc_html( get_the_title() ); ?></p>
      </div>
    </a>
    <?php
      $pi2++;
      endwhile;
      wp_reset_postdata();
    else :
      // Fallback: show the one real project card when CPT is empty.
    ?>
    <a href="<?php echo esc_url( home_url( '/projects/period-property-transformation/' ) ); ?>" class="proj-card fade-in">
      <img src="<?php echo esc_url( $img ); ?>1-front.jpg" alt="<?php esc_attr_e( 'Full renovation, Bristol', 'sail-renovate' ); ?>" />
      <div class="proj-card__overlay"></div>
      <div class="proj-card__info">
        <p class="proj-card__type"><?php esc_html_e( 'Full Renovation · Clifton', 'sail-renovate' ); ?></p>
        <p class="proj-card__title"><?php esc_html_e( 'Period Property Transformation', 'sail-renovate' ); ?></p>
      </div>
    </a>
    <?php endif; ?>
  </div>
```

**Verify**: `php -l wp-theme/sail-renovate/front-page.php` → `No syntax errors detected in wp-theme/sail-renovate/front-page.php`

### Step 3: Confirm placeholder links are gone

**Verify**: run this grep and expect zero results that are NOT inside the `else` fallback block:
```
grep -n "home_url.*\/projects\/" wp-theme/sail-renovate/front-page.php
```
The only remaining `/projects/` link in the portfolio section should be inside
the `else` fallback (for the one real project, not the placeholder cards).
The `<a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="section-link">` 
from the section header is unrelated and should remain.

**Verify**: `grep -n "post_type.*project" wp-theme/sail-renovate/front-page.php` → at least 1 match

### Step 4: Commit

```
git add wp-theme/sail-renovate/front-page.php
git commit -m "feat: query project CPT for homepage portfolio section"
```

**Verify**: `git status` → working tree clean

## Test plan

No automated tests for this theme. Manual verification on a running WP instance:

1. With no `project` CPT entries: homepage portfolio shows the one fallback
   card ("Period Property Transformation").
2. With 3 `project` CPT entries (each with a featured image, `project_type`,
   and `project_location` meta): portfolio shows exactly those 3 cards with
   correct titles, links, and type/location metadata.
3. With 6 `project` CPT entries: portfolio shows 5 (limit is `posts_per_page: 5`).
4. With 1 `project` CPT entry that has no featured image: card shows fallback
   image `1-front.jpg`.
5. Confirm the "View all projects →" section-link above the grid is unchanged.

## Done criteria

- [ ] `php -l wp-theme/sail-renovate/front-page.php` exits 0
- [ ] `grep -c "post_type.*project" wp-theme/sail-renovate/front-page.php` ≥ 1
- [ ] `grep -c "Luxury Bathroom Suite\|Fire Damage Restoration\|Kitchen-Diner Extension\|Solar & Smart Heating" wp-theme/sail-renovate/front-page.php` = 0
- [ ] No files outside the in-scope list are modified (`git diff --name-only HEAD~1..HEAD`)
- [ ] `plans/README.md` status row updated

## STOP conditions

- The live `<div class="portfolio-grid">` block doesn't match the excerpt in
  "Current state" (file has drifted since plan was written).
- `php -l` reports a syntax error after your edit.
- The change requires touching `functions.php`, CSS, or any file other than
  `front-page.php`.

## Maintenance notes

- If more than 5 recent projects should appear on the homepage, increase
  `posts_per_page` from `5` to the desired count.
- Project order on the homepage is controlled by the "Order" field in WP Admin
  (menu_order). Drag-and-drop ordering requires a plugin like Simple Page Orderer
  for CPTs — document this if ordering matters to the client.
- The fallback single card can be removed once at least one `project` CPT entry
  has a featured image in the CMS.
