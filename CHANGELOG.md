# Changelog

All notable changes to `filament-landing-pages` will be documented in this file.

## [Unreleased]

## [0.2.1] - 2025-12-17

### Added
- LeadResource for viewing/managing captured leads in admin
- VerifyLeadEmail Livewire component and route
- Email verification success/error views
- Composer scripts: test, test-coverage, analyse, format
- Facade alias for auto-discovery

### Fixed
- LeadForm token generation before sending verification email
- LeadEmailVerification notification to accept custom subject
- Forced locale prefix issue

### Changed
- Added spatie/laravel-package-tools dependency
- Broadened version constraints for Filament (^3.2 || ^4.0)

## [0.2.0] - 2024-12-XX

## [1.0.0] - 2024-01-01

- Initial release