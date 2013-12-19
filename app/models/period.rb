class Period < ActiveRecord::Base
  belongs_to :school
  belongs_to :year
end
