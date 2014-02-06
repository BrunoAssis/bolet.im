class SchoolYear < ActiveRecord::Base
  validates :year, presence: true
end
