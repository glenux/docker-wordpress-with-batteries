
NAME=dt-service-dt-site
all: build run

# --build-arg "BUNDLE_BITBUCKET__ORG=$(BUNDLE_BITBUCKET__ORG)" \

build:
	docker build -t $(NAME) .

run:
	docker stop $(NAME) || true
	docker run --rm \
		--name $(NAME) \
		-p 80:80 \
		-t $(NAME)



