<?php

namespace VasilGerginski\FilamentLandingPages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $meta_description
 * @property array|null $sections
 * @property string $goal_type
 * @property string $template
 * @property bool $is_active
 * @property bool $enable_analytics
 * @property string|null $tracking_code
 * @property string|null $utm_source
 * @property string|null $utm_medium
 * @property string|null $utm_campaign
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $url
 * @property-read string $preview_url
 * @property-read string $tracking_url
 * @property-read string $localized_meta_title
 * @property-read string $localized_meta_description
 * @property-read string|null $meta_title
 * @property-read string|null $meta_keywords
 * @property-read string|null $og_title
 * @property-read string|null $og_description
 * @property-read string|null $og_image
 * @property-read string $localized_og_title
 * @property-read string $localized_og_description
 * @property-read string $localized_meta_keywords
 */
class LandingPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'meta_description',
        'sections',
        'goal_type',
        'template',
        'is_active',
        'enable_analytics',
        'tracking_code',
        'utm_source',
        'utm_medium',
        'utm_campaign',
    ];

    protected $casts = [
        'sections' => 'array',
        'is_active' => 'boolean',
        'enable_analytics' => 'boolean',
    ];

    /**
     * Generate the full URL for this landing page
     */
    public function getUrlAttribute(): string
    {
        $prefix = config('filament-landing-pages.routes.prefix', 'landing');

        return url("/{$prefix}/{$this->slug}");
    }

    /**
     * Generate the preview URL for this landing page
     */
    public function getPreviewUrlAttribute(): string
    {
        $prefix = config('filament-landing-pages.routes.prefix', 'landing');

        return url("/{$prefix}-preview/{$this->slug}");
    }

    /**
     * Add UTM parameters to the URL if they exist
     */
    public function getTrackingUrlAttribute(): string
    {
        $url = $this->url;
        $params = array_filter([
            'utm_source' => $this->utm_source,
            'utm_medium' => $this->utm_medium,
            'utm_campaign' => $this->utm_campaign,
        ]);

        if (! empty($params)) {
            $url .= '?'.http_build_query($params);
        }

        return $url;
    }

    /**
     * Get the localized meta title for SEO
     */
    public function getLocalizedMetaTitleAttribute(): string
    {
        return $this->title ?? '';
    }

    /**
     * Get the localized meta description for SEO
     */
    public function getLocalizedMetaDescriptionAttribute(): string
    {
        return $this->meta_description ?? '';
    }

    /**
     * Create compatibility with common SEO interfaces
     */
    public function getMetaTitleAttribute(): ?string
    {
        return $this->title;
    }

    public function getMetaKeywordsAttribute(): ?string
    {
        return null;
    }

    public function getOgTitleAttribute(): ?string
    {
        return $this->title;
    }

    public function getOgDescriptionAttribute(): ?string
    {
        return $this->meta_description;
    }

    public function getOgImageAttribute(): ?string
    {
        return null;
    }

    public function getLocalizedOgTitleAttribute(): string
    {
        return $this->title ?? '';
    }

    public function getLocalizedOgDescriptionAttribute(): string
    {
        return $this->meta_description ?? '';
    }

    public function getLocalizedMetaKeywordsAttribute(): string
    {
        return '';
    }

    /**
     * Set up SEO metadata for the landing page
     * Only works if SEO tools are configured
     */
    public function setSEO(): void
    {
        if (! config('filament-landing-pages.seo.enabled', true)) {
            return;
        }

        $seoToolsFacade = config('filament-landing-pages.seo.seo_tools_facade');

        if (! $seoToolsFacade || ! class_exists('Artesaos\SEOTools\Facades\SEOMeta')) {
            return;
        }

        $title = $this->title;
        $description = $this->meta_description;
        $locale = app()->getLocale();
        $prefix = config('filament-landing-pages.routes.prefix', 'landing');

        $baseUrl = config('app.url');
        $seoUrl = $baseUrl.'/'.$locale.'/'.$prefix.'/'.$this->slug;

        // Set the main SEO tags
        \Artesaos\SEOTools\Facades\SEOMeta::setTitle($title);
        \Artesaos\SEOTools\Facades\SEOMeta::setDescription($description);
        \Artesaos\SEOTools\Facades\SEOMeta::setCanonical($seoUrl);

        // Set Open Graph tags
        \Artesaos\SEOTools\Facades\OpenGraph::setTitle($title);
        \Artesaos\SEOTools\Facades\OpenGraph::setDescription($description);
        \Artesaos\SEOTools\Facades\OpenGraph::setUrl($seoUrl);
        \Artesaos\SEOTools\Facades\OpenGraph::setType('website');

        // Set Twitter Card tags
        \Artesaos\SEOTools\Facades\TwitterCard::setTitle($title);
        \Artesaos\SEOTools\Facades\TwitterCard::setDescription($description);
        \Artesaos\SEOTools\Facades\TwitterCard::setType('summary_large_image');

        // Set JSON-LD structured data
        \Artesaos\SEOTools\Facades\JsonLd::setTitle($title);
        \Artesaos\SEOTools\Facades\JsonLd::setDescription($description);
        \Artesaos\SEOTools\Facades\JsonLd::setType('WebPage');
        \Artesaos\SEOTools\Facades\JsonLd::setUrl($seoUrl);

        // Add breadcrumbs
        \Artesaos\SEOTools\Facades\JsonLdMulti::newJsonLd();
        \Artesaos\SEOTools\Facades\JsonLdMulti::setType('BreadcrumbList');
        \Artesaos\SEOTools\Facades\JsonLdMulti::addValue('itemListElement', [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Home',
                'item' => $baseUrl.'/'.$locale,
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => $this->title,
                'item' => $seoUrl,
            ],
        ]);
    }
}
