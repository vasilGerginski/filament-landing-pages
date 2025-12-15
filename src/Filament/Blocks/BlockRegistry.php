<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;

class BlockRegistry
{
    protected array $blocks = [];

    public function __construct()
    {
        $this->registerDefaultBlocks();
    }

    protected function registerDefaultBlocks(): void
    {
        $coreBlocks = config('filament-landing-pages.blocks.core', []);
        $goalBlocks = config('filament-landing-pages.blocks.goal_specific', []);

        // Core blocks
        if ($coreBlocks['hero_section'] ?? true) {
            $this->blocks['hero_section'] = HeroSectionBlock::class;
        }
        if ($coreBlocks['challenges_section'] ?? true) {
            $this->blocks['challenges_section'] = ChallengesSectionBlock::class;
        }
        if ($coreBlocks['solution_section'] ?? true) {
            $this->blocks['solution_section'] = SolutionSectionBlock::class;
        }
        if ($coreBlocks['icon_list_section'] ?? true) {
            $this->blocks['icon_list_section'] = IconListSectionBlock::class;
        }
        if ($coreBlocks['testimonials_section'] ?? true) {
            $this->blocks['testimonials_section'] = TestimonialsSectionBlock::class;
        }
        if ($coreBlocks['faq_section'] ?? true) {
            $this->blocks['faq_section'] = FaqSectionBlock::class;
        }
        if ($coreBlocks['cta_section'] ?? true) {
            $this->blocks['cta_section'] = CtaSectionBlock::class;
        }
        if ($coreBlocks['trust_indicators_section'] ?? true) {
            $this->blocks['trust_indicators_section'] = TrustIndicatorsSectionBlock::class;
        }

        // Goal-specific blocks
        if ($goalBlocks['lead_form'] ?? true) {
            $this->blocks['lead_form'] = LeadFormBlock::class;
        }
        if ($goalBlocks['newsletter_signup'] ?? true) {
            $this->blocks['newsletter_signup'] = NewsletterSignupBlock::class;
        }
        if ($goalBlocks['event_registration'] ?? true) {
            $this->blocks['event_registration'] = EventRegistrationBlock::class;
        }
        if ($goalBlocks['product_showcase'] ?? true) {
            $this->blocks['product_showcase'] = ProductShowcaseBlock::class;
        }
        if ($goalBlocks['pricing_table'] ?? true) {
            $this->blocks['pricing_table'] = PricingTableBlock::class;
        }
        if ($goalBlocks['countdown_timer'] ?? true) {
            $this->blocks['countdown_timer'] = CountdownTimerBlock::class;
        }

        // Register custom blocks from config
        $customBlocks = config('filament-landing-pages.blocks.custom_blocks', []);
        foreach ($customBlocks as $key => $class) {
            if (class_exists($class)) {
                $this->blocks[$key] = $class;
            }
        }
    }

    public function register(string $key, string $blockClass): void
    {
        $this->blocks[$key] = $blockClass;
    }

    public function get(string $key): ?string
    {
        return $this->blocks[$key] ?? null;
    }

    public function getForBuilder(): array
    {
        $blocks = [];

        foreach ($this->blocks as $key => $class) {
            if (class_exists($class) && method_exists($class, 'make')) {
                $block = $class::make();
                if ($block instanceof Block) {
                    $blocks[] = $block;
                }
            }
        }

        return $blocks;
    }

    public function all(): array
    {
        return $this->blocks;
    }

    /**
     * Create a rich text editor field using Filament 4's built-in RichEditor
     */
    public static function richTextEditor(string $name): \Filament\Forms\Components\RichEditor
    {
        return \Filament\Forms\Components\RichEditor::make($name)
            ->toolbarButtons([
                ['bold', 'italic', 'underline', 'strike', 'link'],
                ['h2', 'h3'],
                ['bulletList', 'orderedList'],
                ['undo', 'redo'],
            ]);
    }
}
