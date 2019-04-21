# Base image from RUBY 2.5.0 because this project not compatible with 2.5.5+
FROM ruby:2.5.0

# Install nodejs (required in order to run) and do the clean up
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        nodejs \
    && rm -rf /var/lib/apt/lists/*

# Change the working directory
WORKDIR /usr/src/app

# Only copy Gemfile (to install the required dependency) for the saving time of building docker image
COPY Gemfile* ./

# Install required dependency
RUN gem install bundle && bundle install

# Expose the port
EXPOSE 3000

# Command to run on container start
CMD ["rails", "server", "-b", "0.0.0.0"]
