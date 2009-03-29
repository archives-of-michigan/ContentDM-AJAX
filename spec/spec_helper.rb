require 'curb-fu'
require 'uri'
require 'json'

INTEGRATION_PATH = 'http://haldigitalcollections.cdmhost.com/cdm_ajax/'

def post_method(method, params = {})
  params['command'] = method
  CurbFu.post(URI.join(INTEGRATION_PATH,'cdm_server.php').to_s, params)
end