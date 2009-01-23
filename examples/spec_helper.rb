require 'curb'
require 'json'

class InvalidResponse < StandardError; end

def execute_command(name, params, debug = false)
  curl = Curl::Easy.new("http://haldigitalcollections.cdmhost.com/cdm_ajax/cdm_server.php")
  curl.http_post(
    Curl::PostField.content('command', name),
    Curl::PostField.content('params', params.to_json))
    
  puts HTMLEntities.new.encode(curl.body_str) if debug
  raise InvalidResponse, curl.body_str if curl.body_str !~ /^[\[\{]/
  
  JSON.parse(curl.body_str)
end