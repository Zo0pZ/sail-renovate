# Plan 001: Replace hardcoded homepage service cards with CPT query

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
- **Depends on**: none
- **Category**: tech-debt
- **Planned at**: commit `894eabc`, 2026-06-30

## Why this matters

`front-page.php` has 4 `<a class="service-card">` blocks written directly in
the template. They are static HTML — editing Services in WP Admin has zero
effect on the homepage. The `service` CPT already exists and powers the
`/services/` index page. The homepage should query the same CPT so that a
content editor adding, removing, or reordering services in WP Admin sees those
changes reflected on the homepage automatically.

A secondary bug is also fixed here: the 4th hardcoded card is titled
"Smart Home Systems" but links to `/services/project-management/` — the wrong
page. The CPT-driven approach eliminates this class of mismatch by using
`the_permalink()`.

## Current state

**File**: `wp-theme/sail-renovate/front-page.php`

The `service` CPT is registered in `wp-theme/sail-renovate/functions.php:194–212`.
It supports `thumbnail` (for the card image) and `custom-fields`. The ACF field
`service_tag` (a short label, e.g. "Insurance Approved") is registered via
`sail_register_acf_fields()` in `functions.php:364–371`.

The `sail_field( $key, $default )` helper (functions.php:300–306) returns an
ACF field value or `$default` when ACF is not active, so ACF is optional.

The section to replace is the `<div class="services-grid">` block. Current code
(front-page.php, approximately lines 101–149):

```php
  <div class="services-grid">
    <a href="<?php echo esc_url( home_url( '/services/insurance-reinstatement/' ) ); ?>" class="service-card fade-in">
      <img class="service-card__img" src="<?php echo $img; ?>12-bathroom.jpg" alt="<?php esc_attr_e( 'Home repair and restoration work', 'sail-renovate' ); ?>" />
      <div class="service-card__content">
        <p class="service-card__tag"><?php esc_html_e( 'Insurance Approved', 'sail-renovate' ); ?></p>
        <h3 class="service-card__title"><?php esc_html_e( 'Home Repairs & Restoration', 'sail-renovate' ); ?></h3>
        <span class="service-card__cta">
          <?php esc_html_e( 'Learn More', 'sail-renovate' ); ?>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
      </div>
    </a>

    <a href="<?php echo esc_url( home_url( '/services/property-refurbishment/' ) ); ?>" class="service-card fade-in fade-in-delay-1">
      <img class="service-card__img" src="<?php echo $img; ?>3-kitchen.jpg" alt="<?php esc_attr_e( 'Professional property renovation', 'sail-renovate' ); ?>" />
      <div class="service-card__content">
        <p class="service-card__tag"><?php esc_html_e( 'Full Project Management', 'sail-renovate' ); ?></p>
        <h3 class="service-card__title"><?php esc_html_e( 'Property Renovations', 'sail-renovate' ); ?></h3>
        <span class="service-card__cta">
          <?php esc_html_e( 'Learn More', 'sail-renovate' ); ?>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
      </div>
    </a>

    <a href="<?php echo esc_url( home_url( '/services/property-maintenance/' ) ); ?>" class="service-card fade-in fade-in-delay-2">
      <img class="service-card__img" src="<?php echo $img; ?>15-garden.jpg" alt="<?php esc_attr_e( 'Eco-friendly home improvements', 'sail-renovate' ); ?>" />
      <div class="service-card__content">
        <p class="service-card__tag"><?php esc_html_e( 'Sustainable Living', 'sail-renovate' ); ?></p>
        <h3 class="service-card__title"><?php esc_html_e( 'Eco Home Improvements', 'sail-renovate' ); ?></h3>
        <span class="service-card__cta">
          <?php esc_html_e( 'Learn More', 'sail-renovate' ); ?>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
      </div>
    </a>

    <a href="<?php echo esc_url( home_url( '/services/project-management/' ) ); ?>" class="service-card fade-in fade-in-delay-3">
      <img class="service-card__img" src="<?php echo $img; ?>6-study.jpg" alt="<?php esc_attr_e( 'Smart home systems installation', 'sail-renovate' ); ?>" />
      <div class="service-card__content">
        <p class="service-card__tag"><?php esc_html_e( 'Technology & Automation', 'sail-renovate' ); ?></p>
        <h3 class="service-card__title"><?php esc_html_e( 'Smart Home Systems', 'sail-renovate' ); ?></h3>
        <span class="service-card__cta">
          <?php esc_html_e( 'Learn More', 'sail-renovate' ); ?>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
      </div>
    </a>
  </div>
```

**Repo conventions to follow**:
- All output is escaped: `esc_html()`, `esc_url()`, `esc_attr()` — see the
  existing CPT loop in `page-projects.php:41–82` as the structural exemplar.
- `wp_reset_postdata()` is called after every custom `WP_Query` loop.
- Fade-in delay classes follow the pattern `fade-in`, `fade-in-delay-1`, etc.
  (see the existing hardcoded cards above for the pattern).
- The `$img` variable is already defined earlier in `front-page.php` as:
  `$img = esc_url( get_template_directory_uri() . '/images/' );`

## Commands you will need

| Purpose | Command | Expected on success |
|---------|---------|---------------------|
| PHP syntax check | `php -l wp-theme/sail-renovate/front-page.php` | `No syntax errors detected` |
| Verify no hardcoded service URLs remain | `grep -n "home_url.*services/insurance-reinstatement\|home_url.*services/property-refurbishment\|home_url.*services/project-management\|home_url.*services/property-maintenance" wp-theme/sail-renovate/front-page.php` | no matches |
| Verify CPT query present | `grep -n "post_type.*service" wp-theme/sail-renovate/front-page.php` | at least one match |

Note: there is no build step. This is a plain PHP WordPress theme. The only
automated check is PHP syntax.

## Scope

**In scope** (the only file you should modify):
- `wp-theme/sail-renovate/front-page.php`

**Out of scope** (do NOT touch):
- `functions.php` — CPT and ACF registration is already correct, no changes needed
- `css/pages/front-page.css` — service card styles are already correct; changing
  the PHP to use CPT does not require CSS changes
- `page-services.php` — already uses CPT correctly; do not modify
- Any other template file

## Git workflow

- Branch: `advisor/001-dynamic-service-cards`
- Commit messages follow Conventional Commits (from CLAUDE.md):
  examples from repo: `feat: make all pages CMS-editable`, `fix: correct burger X animation`
- Use: `feat: query service CPT for homepage service cards`
- Do NOT push or open a PR.

## Steps

### Step 1: Verify current state matches the plan

Open `wp-theme/sail-renovate/front-page.php`. Confirm the `<div class="services-grid">` block contains 4 hardcoded `<a class="service-card">` elements as shown in "Current state" above.

**Verify**: `grep -c "service-card fade-in" wp-theme/sail-renovate/front-page.php` → `4`

### Step 2: Replace the services-grid block with a CPT query

Replace the entire `<div class="services-grid">...</div>` block (everything from
`<div class="services-grid">` through the closing `</div>`) with the following:

```php
  <div class="services-grid">
    <?php
    $service_q = new WP_Query( [
      'post_type'      => 'service',
      'posts_per_page' => 4,
      'orderby'        => 'menu_order',
      'order'          => 'ASC',
    ] );
    $service_delays = [ '', ' fade-in-delay-1', ' fade-in-delay-2', ' fade-in-delay-3' ];
    $si = 0;
    if ( $service_q->have_posts() ) :
      while ( $service_q->have_posts() ) : $service_q->the_post();
        $s_thumb = get_the_post_thumbnail_url( null, 'large' );
        $s_tag   = sail_field( 'service_tag', '' );
        $s_delay = $service_delays[ $si % 4 ];
    ?>
    <a href="<?php the_permalink(); ?>" class="service-card fade-in<?php echo esc_attr( $s_delay ); ?>">
      <img class="service-card__img"
           src="<?php echo $s_thumb ? esc_url( $s_thumb ) : esc_url( $img ) . '12-bathroom.jpg'; ?>"
           alt="<?php echo esc_attr( get_the_title() ); ?>" />
      <div class="service-card__content">
        <?php if ( $s_tag ) : ?>
        <p class="service-card__tag"><?php echo esc_html( $s_tag ); ?></p>
        <?php endif; ?>
        <h3 class="service-card__title"><?php echo esc_html( get_the_title() ); ?></h3>
        <span class="service-card__cta">
          <?php esc_html_e( 'Learn More', 'sail-renovate' ); ?>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
      </div>
    </a>
    <?php
      $si++;
      endwhile;
      wp_reset_postdata();
    else :
      // Fallback when no service posts exist yet in the CMS.
      // Shows four static cards so the homepage is not blank during initial setup.
    ?>
    <a href="<?php echo esc_url( home_url( '/services/insurance-reinstatement/' ) ); ?>" class="service-card fade-in">
      <img class="service-card__img" src="<?php echo esc_url( $img ); ?>12-bathroom.jpg" alt="<?php esc_attr_e( 'Home repair and restoration work', 'sail-renovate' ); ?>" />
      <div class="service-card__content">
        <p class="service-card__tag"><?php esc_html_e( 'Insurance Approved', 'sail-renovate' ); ?></p>
        <h3 class="service-card__title"><?php esc_html_e( 'Home Repairs & Restoration', 'sail-renovate' ); ?></h3>
        <span class="service-card__cta">
          <?php esc_html_e( 'Learn More', 'sail-renovate' ); ?>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
      </div>
    </a>
    <a href="<?php echo esc_url( home_url( '/services/property-refurbishment/' ) ); ?>" class="service-card fade-in fade-in-delay-1">
      <img class="service-card__img" src="<?php echo esc_url( $img ); ?>3-kitchen.jpg" alt="<?php esc_attr_e( 'Professional property renovation', 'sail-renovate' ); ?>" />
      <div class="service-card__content">
        <p class="service-card__tag"><?php esc_html_e( 'Full Project Management', 'sail-renovate' ); ?></p>
        <h3 class="service-card__title"><?php esc_html_e( 'Property Renovations', 'sail-renovate' ); ?></h3>
        <span class="service-card__cta">
          <?php esc_html_e( 'Learn More', 'sail-renovate' ); ?>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
      </div>
    </a>
    <a href="<?php echo esc_url( home_url( '/services/property-maintenance/' ) ); ?>" class="service-card fade-in fade-in-delay-2">
      <img class="service-card__img" src="<?php echo esc_url( $img ); ?>15-garden.jpg" alt="<?php esc_attr_e( 'Eco-friendly home improvements', 'sail-renovate' ); ?>" />
      <div class="service-card__content">
        <p class="service-card__tag"><?php esc_html_e( 'Sustainable Living', 'sail-renovate' ); ?></p>
        <h3 class="service-card__title"><?php esc_html_e( 'Eco Home Improvements', 'sail-renovate' ); ?></h3>
        <span class="service-card__cta">
          <?php esc_html_e( 'Learn More', 'sail-renovate' ); ?>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
      </div>
    </a>
    <a href="<?php echo esc_url( home_url( '/services/claims-management/' ) ); ?>" class="service-card fade-in fade-in-delay-3">
      <img class="service-card__img" src="<?php echo esc_url( $img ); ?>6-study.jpg" alt="<?php esc_attr_e( 'Claims management service', 'sail-renovate' ); ?>" />
      <div class="service-card__content">
        <p class="service-card__tag"><?php esc_html_e( 'Insurance Approved', 'sail-renovate' ); ?></p>
        <h3 class="service-card__title"><?php esc_html_e( 'Claims Management', 'sail-renovate' ); ?></h3>
        <span class="service-card__cta">
          <?php esc_html_e( 'Learn More', 'sail-renovate' ); ?>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
      </div>
    </a>
    <?php endif; ?>
  </div>
```

Note: the fallback block also fixes the original bug where card 4 linked to
`/services/project-management/` while titled "Smart Home Systems". The corrected
fallback links card 4 to `/services/claims-management/` with appropriate copy.

**Verify**: `php -l wp-theme/sail-renovate/front-page.php` → `No syntax errors detected in wp-theme/sail-renovate/front-page.php`

### Step 3: Confirm hardcoded service URLs are gone

**Verify**: `grep -n "home_url.*services/insurance-reinstatement\|home_url.*services/project-management" wp-theme/sail-renovate/front-page.php` → zero matches in the dynamic section (matches are only acceptable inside the `else` fallback block, which can be confirmed by checking context)

**Verify**: `grep -n "post_type.*service" wp-theme/sail-renovate/front-page.php` → at least 1 match

### Step 4: Commit

```
git add wp-theme/sail-renovate/front-page.php
git commit -m "feat: query service CPT for homepage service cards"
```

**Verify**: `git status` → working tree clean

## Test plan

No automated tests exist for this theme (no PHPUnit setup). Manual verification
steps (for a reviewer with a running WP instance):

1. With no `service` CPT entries: homepage shows the 4 static fallback cards.
2. With 2 `service` CPT entries (each with a featured image and `service_tag`
   ACF field): homepage shows exactly those 2 cards with correct titles, images,
   and links via `the_permalink()`.
3. With 5 `service` CPT entries: homepage shows 4 (limit is `posts_per_page: 4`).
4. With 1 `service` CPT entry that has no featured image: card shows the
   fallback image `12-bathroom.jpg`.

## Done criteria

- [ ] `php -l wp-theme/sail-renovate/front-page.php` exits 0
- [ ] `grep -c "post_type.*service" wp-theme/sail-renovate/front-page.php` ≥ 1
- [ ] `grep -n "home_url.*project-management" wp-theme/sail-renovate/front-page.php` returns no match in the dynamic (non-fallback) section
- [ ] No files outside the in-scope list are modified (`git diff --name-only HEAD~1..HEAD`)
- [ ] `plans/README.md` status row updated

## STOP conditions

- The `<div class="services-grid">` block in the live file does not match the
  excerpt in "Current state" (file has drifted).
- `php -l` reports a syntax error after your edit.
- The change requires touching `functions.php` or any CSS file.

## Maintenance notes

- If a 5th service is added in WP Admin and should appear on the homepage,
  increase `posts_per_page` from `4` to `5` in the `WP_Query` call.
- The fallback block (inside `else`) can be removed once all 4+ services are
  entered in the CMS with featured images.
- `sail_field( 'service_tag', '' )` returns empty string when ACF is not active.
  The `<?php if ( $s_tag ) :` guard already handles this gracefully.
