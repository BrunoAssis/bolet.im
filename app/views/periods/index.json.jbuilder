json.array!(@periods) do |period|
  json.extract! period, :school_id, :year_id, :order, :name, :short_description
  json.url period_url(period, format: :json)
end
