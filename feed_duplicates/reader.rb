
require 'nokogiri'

downloaded_from_url = File.open('feed.rss', "r")
parsed_xml_document = Nokogiri::XML(downloaded_from_url)


list_of_item_ids    = parsed_xml_document.xpath("//item/g:id").map { |x| x.text }

def find_duplicate_items( in_collection=[] )
  in_collection.select do |item|
    in_collection.count(item) > 1
  end.uniq
end

print duplicate_item_ids  = find_duplicate_items( list_of_item_ids )