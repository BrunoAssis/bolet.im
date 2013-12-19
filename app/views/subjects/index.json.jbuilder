json.array!(@subjects) do |subject|
  json.extract! subject, :school_id, :name, :short_description
  json.url subject_url(subject, format: :json)
end
