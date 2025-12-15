<?php

namespace VasilGerginski\FilamentLandingPages\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class PreviewLandingPage extends Component
{
    public $state = [];

    public $sections = [];

    public $title = 'Preview';

    public $meta_description = '';

    public $preview = true;

    public function mount(Request $request)
    {
        // Ensure app knows we're using the default locale if it's not already set
        if (! app()->bound('locale') || ! app()->getLocale()) {
            app()->setLocale(config('app.locale', 'en'));
        }

        // Get the form state from the request
        if ($request->has('state')) {
            $this->state = json_decode($request->input('state'), true) ?? [];

            if (isset($this->state['title'])) {
                $this->title = $this->state['title'];
            }

            if (isset($this->state['meta_description'])) {
                $this->meta_description = $this->state['meta_description'];
            }

            if (isset($this->state['sections'])) {
                $this->sections = $this->state['sections'];
                $this->processSections();
            }
        }
    }

    protected function processSections()
    {
        if (! is_array($this->sections)) {
            $this->sections = [];

            return;
        }

        foreach ($this->sections as &$section) {
            if (! isset($section['type'])) {
                continue;
            }

            $type = str_replace('_', '-', $section['type']);
            $section['type'] = 'landing-page-components.'.$type;

            if (! isset($section['data']) || ! is_array($section['data'])) {
                $section['data'] = [];
            }

            // Normalize benefits format in solution section if needed
            if ($section['type'] === 'landing-page-components.solution-section' && isset($section['data']['benefits'])) {
                if (is_array($section['data']['benefits'])) {
                    $section['data']['benefits'] = $this->normalizeArrayField($section['data']['benefits'], ['text', 'benefit']);
                }
            }

            // Normalize features format in CTA section if needed
            if ($section['type'] === 'landing-page-components.cta-section' && isset($section['data']['features'])) {
                if (is_array($section['data']['features'])) {
                    $section['data']['features'] = $this->normalizeArrayField($section['data']['features'], ['feature']);
                }
            }
        }

        // If no valid sections are found, add a default hero section
        if (empty($this->sections)) {
            $this->sections = [
                [
                    'type' => 'landing-page-components.hero-section',
                    'data' => [
                        'badge' => 'PREVIEW MODE',
                        'title' => 'Landing Page Preview',
                        'subtitle' => 'This is a preview of your landing page with default content.',
                    ],
                ],
            ];
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

    public function render()
    {
        return view('filament-landing-pages::livewire.preview-landing-page')
            ->layout('filament-landing-pages::layouts.preview', [
                'title' => $this->title,
                'description' => $this->meta_description,
            ]);
    }
}
