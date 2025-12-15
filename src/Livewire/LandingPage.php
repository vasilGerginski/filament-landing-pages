<?php

namespace VasilGerginski\FilamentLandingPages\Livewire;

use Livewire\Component;
use VasilGerginski\FilamentLandingPages\Models\LandingPage as LandingPageModel;

class LandingPage extends Component
{
    public $slug;

    public $landingPage;

    public $preview = false;

    public $sections = [];

    /**
     * Get the current landing page for SEO purposes
     */
    public function getPage(): ?LandingPageModel
    {
        return $this->landingPage;
    }

    public function mount($slug = null, $id = null, $preview = false)
    {
        $this->preview = $preview;

        $landingPageModel = config('filament-landing-pages.models.landing_page', LandingPageModel::class);
        $query = $landingPageModel::query();

        // For preview, include inactive landing pages
        if (! $this->preview) {
            $query->where('is_active', true);
        }

        // Handle loading by ID (primarily for preview)
        if ($id) {
            $this->landingPage = $query->find($id);
            if ($this->landingPage) {
                $this->slug = $this->landingPage->slug;
                $this->loadSections();
            }
        }
        // Handle loading by slug
        elseif ($slug) {
            $this->slug = $slug;
            $this->landingPage = $query->where('slug', $slug)->first();

            if ($this->landingPage) {
                $this->loadSections();
            }
        }

        // If no sections are loaded, use default structure
        if (empty($this->sections)) {
            $this->loadDefaultSections();
        }
    }

    protected function loadSections()
    {
        if ($this->landingPage && isset($this->landingPage->sections)) {
            $this->sections = $this->landingPage->sections;

            // Map section types to component names
            foreach ($this->sections as &$section) {
                if (isset($section['type'])) {
                    $type = str_replace('_', '-', $section['type']);
                    $section['type'] = 'landing-page-components.'.$type;

                    // Normalize benefits format in solution section if needed
                    if ($section['type'] === 'landing-page-components.solution-section' && isset($section['data']['benefits'])) {
                        $section['data']['benefits'] = $this->normalizeArrayField($section['data']['benefits'], ['text', 'benefit']);
                    }

                    // Normalize features format in CTA section if needed
                    if ($section['type'] === 'landing-page-components.cta-section' && isset($section['data']['features'])) {
                        $section['data']['features'] = $this->normalizeArrayField($section['data']['features'], ['feature']);
                    }
                }
            }
        }
    }

    protected function normalizeArrayField(array $items, array $keys): array
    {
        $normalized = [];

        foreach ($items as $item) {
            if (is_string($item)) {
                $normalized[] = $item;
            } elseif (is_array($item)) {
                foreach ($keys as $key) {
                    if (isset($item[$key])) {
                        $normalized[] = $item[$key];
                        break;
                    }
                }
            }
        }

        return $normalized;
    }

    protected function loadDefaultSections()
    {
        // Set up default sections with generic placeholder content
        $this->sections = [
            [
                'type' => 'landing-page-components.hero-section',
                'data' => [
                    'badge' => 'WELCOME',
                    'title' => 'Your <span class="text-[#1CE088]">Landing Page</span> Title',
                    'subtitle' => 'Add a compelling subtitle that explains what you offer.',
                ],
            ],
        ];
    }

    public function render()
    {
        return view('filament-landing-pages::livewire.landing-page', [
            'page' => $this->landingPage,
        ]);
    }
}
