.DEFAULT_GOAL := help
##
## —— ✨ Code Quality ——
.PHONY: qa
qa: ## Run all code quality checks
qa: php-cs-fixer phpstan

.PHONY: qa-fix
qa-fix: ## Run all code quality fixers
qa-fix: php-cs-fixer-apply

.PHONY: phpstan
phpstan: ## Execute phpstan
	$(APP) vendor/bin/phpstan --memory-limit=-1 analyse src

.PHONY: php-cs-fixer
php-cs-fixer: ## Execute php-cs-fixer in dry-run mode
	$(APP) vendor/bin/php-cs-fixer fix --using-cache=no --verbose --diff --dry-run

.PHONY: php-cs-fixer-apply
php-cs-fixer-apply: ## Execute php-cs-fixer and apply changes
	$(APP) vendor/bin/php-cs-fixer fix --using-cache=no --verbose

##
## —— ✨ Tests ——
.PHONY: tests
tests: ## Execute tests
	$(APP) ./phpunit  --colors=always --testdox

##
## —— ✨ Others ——
.PHONY: help
help: ## List of commands
	@grep -E '(^[a-z0-9A-Z_-]+:.*?##.*$$)|(^##)' Makefile | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
