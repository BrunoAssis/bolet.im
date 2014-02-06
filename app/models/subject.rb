class Subject < ActiveRecord::Base
	belongs_to :school

  validates :name, presence: true

  def to_s
    "#{self.name}"
  end
end
